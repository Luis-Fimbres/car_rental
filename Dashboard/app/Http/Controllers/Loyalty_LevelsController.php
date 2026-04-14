<?php

namespace App\Http\Controllers;

use App\http\controllers\controller;
use Illuminate\Http\Request;
use App\Models\Loyalty_level;

class Loyalty_LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loyalty_level = Loyalty_level::get();

        return response()->json([
            "data"=>$loyalty_level,
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
            'name' => 'required|string|unique:loyalty_levels,name|max:50',
            'min_points' => 'required|integer|min:0',
            'discount_percentage' => 'required|numeric|between:0,100',
            'free_extra_hours' => 'required|integer|min:0'
        ]);

        $loyaltyLevel = Loyalty_level::create([
            'name' => $request->name,
            'min_points' => $request->min_points,
            'discount_percentage' => $request->discount_percentage,
            'free_extra_hours' => $request->free_extra_hours
        ]);

        return response()->json([
            "data" => $loyaltyLevel,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loyalty_level = Loyalty_level::find($id);
        if($loyalty_level == null){
            return response()->json(["message"=>"Loyalty Level not Found","status"=>"error"],404);
        }
        return response()->json(["data"=>$loyalty_level,"status"=>"success"],200);
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
        $loyalty_level = Loyalty_level::find($id);
        if($loyalty_level == null){
            return response()->json(["error"=>"Loyalty Level not Found", "status"=>"error"],404);
        }
        $loyalty_level->delete();
        return response()->json(["status"=>"success","message"=>"Loyalty Level eliminated correctly"],204);
    }
}
