<?php

namespace App\Http\Controllers;

use App\http\controllers\controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            "data"=>$users,
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
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'loyalty_points' => 'numeric'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'loyalty_points' => $request->loyalty_points ?? 0,
            'loyalty_level_id' => $request->loyalty_level_id ?? 1
        ]);

        return response()->json([
            "data" => $user,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return response()->json(["message"=>"User not Found","status"=>"error"],404);
        }
        return response()->json(["data"=>$user,"status"=>"success"],200);
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
        $user = User::find($id);
        if($user == null){
            return response()->json(["error"=>"User not Found", "status"=>"error"],404);
        }
        $user->delete();
        return response()->json(["status"=>"success","message"=>"User eliminated correctly"],204);
    }
}
