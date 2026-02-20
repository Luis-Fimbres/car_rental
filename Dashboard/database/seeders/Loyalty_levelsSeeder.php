<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Loyalty_level;

class Loyalty_levelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("loyalty_levels")->insert([
            'name'=>"loyalty",
            'min_points'=>1,
            'discount_percentage'=>5,
            'free_extra_hours'=>1,
            'created_at'=>date('Y-m-d h:m:s')
        ]);

        $data = new Loyalty_level();
        $data -> name = "loyalty";
        $data -> min_points = 1;
        $data -> discount_percentage = 5;
        $data -> free_extra_hours = 1;
        $data -> save();
    }
}
