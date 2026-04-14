<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("cars")->insert([
            'brand_id'=>1,
            'model'=>"Kia",
            'year'=>2012,
            'color'=>"white",
            'license_plate'=>Hash::make('12345678'),
            'mileage'=>138284,
            'lat'=>123.2,
            'lng'=>302.1,
            'is_premium'=>false,
            'rental_count'=>5,
            'daily_rate'=>1,
            'status'=>'rented',
            'created_at'=>date('Y-m-d h:m:s')
        ]);

        $data = new Car();
        $data -> brand_id = 1;
        $data -> model = "Toyota";
        $data -> year = 2004;
        $data -> color = "green";
        $data -> license_plate = Hash::make(12345678);
        $data -> mileage = 1234;
        $data -> lat = 483.4;
        $data -> lng = 934.1;
        $data -> is_premium = false;
        $data -> rental_count = 3;
        $data -> daily_rate = 2;
        $data -> status = 'rented';
        $data -> save();
    }
}
