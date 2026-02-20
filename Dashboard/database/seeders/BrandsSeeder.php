<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("brands")->insert([
            'name'=>"ACME",
            'img'=>"default.png",
            'created_at'=>date('Y-m-d h:m:s')
        ]);

        $data = new Brand();
        $data -> name = "Sony";
        $data -> img = "default.png";
        $data -> save();
    }
}
