<?php

namespace App\Http\Controllers;

use App\http\controllers\controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();

        return response()->json([
            "data"=>$payments,
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
            'rental_id' => 'required|exists:rentals,id',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|string|in:card,cash,transfer,paypal',
            'transaction_id' => 'required|string|unique:payments,transaction_id',
            'status' => 'required|string|in:pending,completed,failed,refunded',
            'payment_date' => 'required|date'
        ]);

        $payment = Payment::create([
            'rental_id' => $request->rental_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'status' => $request->status,
            'payment_date' => $request->payment_date
        ]);

        return response()->json([
            "data" => $payment,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::find($id);
        if($payment == null){
            return response()->json(["message"=>"Payment not Found","status"=>"error"],404);
        }
        return response()->json(["data"=>$payment,"status"=>"success"],200);
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
        $payment = Payment::find($id);
        if($payment == null){
            return response()->json(["error"=>"Payment not Found", "status"=>"error"],404);
        }
        $payment->delete();
        return response()->json(["status"=>"success","message"=>"Payment eliminated correctly"],204);
    }
}
