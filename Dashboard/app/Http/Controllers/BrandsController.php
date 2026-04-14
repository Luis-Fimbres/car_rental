<?php

namespace App\Http\Controllers;

use App\http\controllers\controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get();

        return response()->json([
            "data"=>$brands,
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
            'name' => 'required|string|unique:brands,name|max:50',
            'img' => 'nullable|string'
        ]);

        $brand = Brand::create([
            'name' => $request->name,
            'img' => $request->img ?? 'default.png'
        ]);

        return response()->json([
            "data" => $brand,
            "status" => "success"
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if($brand == null){
            return response()->json(["message"=>"Brand not Found","status"=>"error"],404);
        }
        return response()->json(["data"=>$brand,"status"=>"success"],200);
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
        $brand = Brand::find($id);
        if($brand == null){
            return response()->json(["error"=>"Brand not Found", "status"=>"error"],404);
        }
        $brand->delete();
        return response()->json(["status"=>"success","message"=>"Brand eliminated correctly"],204);
    }
}
