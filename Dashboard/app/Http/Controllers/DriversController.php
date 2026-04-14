<?php

namespace App\Http\Controllers;

use App\http\controllers\controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();

        return response()->json([
            "data"=>$drivers,
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
            'user_id' => 'required|exists:users,id|unique:drivers,user_id',
            'license_number' => 'required|string|min:5',
            'license_img' => 'nullable|string'
        ]);

        $driver = Driver::create([
            'user_id' => $request->user_id,
            'license_number' => Hash::make($request->license_number), 
            'license_img' => $request->license_img ?? 'default.png'
        ]);

        return response()->json([
            "data" => $driver,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $driver = Driver::find($id);
        if($driver == null){
            return response()->json(["message"=>"Driver not Found","status"=>"error"],404);
        }
        return response()->json(["data"=>$driver,"status"=>"success"],200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = Driver::find($id);
        if($driver == null){
            return response()->json(["error"=>"Driver not Found", "status"=>"error"],404);
        }
        $driver->delete();
        return response()->json(["status"=>"success","message"=>"Driver eliminated correctly"],204);
    }
}
