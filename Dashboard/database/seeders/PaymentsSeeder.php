<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("payments")->insert([
            'rental_id'=>1,
            'amount'=>1234.3,
            'payment_method'=>"card",
            'transaction_id'=>1,
            'status'=>'pending',
            'payment_date'=>now(),
            'created_at'=>date('Y-m-d h:m:s'),
        ]);

        $data = new Payment();
        $data -> rental_id = 1;
        $data -> amount = 394.2;
        $data -> payment_method = "card";
        $data -> transaction_id = 1;
        $data -> status = 'pending';
        $data -> payment_date = now();
        $data -> save();
    }
}
