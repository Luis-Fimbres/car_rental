<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rental;

class RentalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("rentals")->insert([
            'user_id'=>1,
            'car_id'=>1,
            'driver_id'=>1,
            'pickup_date'=>now(),
            'return_date'=>now(),
            'total_amount'=>200,
            'status'=>'active',
            'created_at'=>date('Y-m-d h:m:s'),
        ]);

        $data = new Rental();
        $data -> user_id = 1;
        $data -> car_id = 1;
        $data -> driver_id = 1;
        $data -> pickup_date = now();
        $data -> return_date = now();
        $data -> total_amount = 200;
        $data -> status = 'active';
        $data -> save();
    }
}
