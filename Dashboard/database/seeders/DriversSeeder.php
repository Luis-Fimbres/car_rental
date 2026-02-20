<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Driver;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("drivers")->insert([
            'user_id'=>1,
            'license_number'=>Hash::make('12345678'),
            'license_img'=>"default.png",
            'created_at'=>date('Y-m-d h:m:s'),
        ]);

        $data = new Driver();
        $data -> user_id = 1;
        $data -> license_number = Hash::make('12345678');
        $data -> license_img = "default.png";
        $data -> save();
    }
}
