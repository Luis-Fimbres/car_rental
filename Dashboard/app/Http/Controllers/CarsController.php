<?php

namespace App\Http\Controllers;

use App\http\controllers\controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Hash;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        return response()->json([
            "data"=>$cars,
            "status"=>"success"
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|string|max:50',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|string|max:30',
            'license_plate' => 'required|string|unique:cars,license_plate',
            'mileage' => 'required|integer|min:0',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'is_premium' => 'boolean',
            'rental_count' => 'integer|min:0',
            'daily_rate' => 'required|numeric|min:0',
            'status' => 'required|string|in:available,rented,maintenance'
        ]);

        $car = Car::create([
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'license_plate' => Hash::make($request->license_plate), 
            'mileage' => $request->mileage,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'is_premium' => $request->is_premium ?? false,
            'rental_count' => $request->rental_count ?? 0,
            'daily_rate' => $request->daily_rate,
            'status' => $request->status ?? 'available'
        ]);

        return response()->json([
            "data" => $car,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        if($car == null){
            return response()->json(["message"=>"Car not Found","status"=>"error"],404);
        }
        return response()->json(["data"=>$car,"status"=>"success"],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json([
                "message" => "Car not found",
                "status" => "error"
            ], 404);
        }

        $validated = $request->validate([
            'status' => 'required|string|in:available,rented,maintenance',
        ]);

        $car->update($validated);

        return response()->json([
            "data" => $car,
            "message" => "Car status updated successfully",
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        if($car == null){
            return response()->json(["error"=>"Car not Found", "status"=>"error"],404);
        }
        $car->delete();
        return response()->json(["status"=>"success","message"=>"Car eliminated correctly"],204);
    }
}
