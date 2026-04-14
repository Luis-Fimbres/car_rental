<?php

namespace App\Http\Controllers;

use App\http\controllers\controller;
use Illuminate\Http\Request;
use App\Models\Rental;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::all();

        return response()->json([
            "data"=>$rentals,
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
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:active,pending,completed,cancelled'
        ]);

    
        $rental = Rental::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'driver_id' => $request->driver_id,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status ?? 'active'
        ]);

        return response()->json([
            "data" => $rental,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rental = Rental::find($id);
        if($rental == null){
            return response()->json(["message"=>"Rental not Found","status"=>"error"],404);
        }
        return response()->json(["data"=>$rental,"status"=>"success"],200);
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
        $rental = Rental::find($id);

        if (!$rental) {
            return response()->json([
                "message" => "Rental not found",
                "status" => "error"
            ], 404);
        }

        $validated = $request->validate([
            'status' => 'required|string|in:active,pending,completed,cancelled',
        ]);

        $rental->update($validated);

        return response()->json([
            "data" => $rental,
            "message" => "Rental status updated successfully",
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rental = Rental::find($id);
        if($rental == null){
            return response()->json(["error"=>"Rental not Found", "status"=>"error"],404);
        }
        $rental->delete();
        return response()->json(["status"=>"success","message"=>"Rental eliminated correctly"],204);
    }
}
