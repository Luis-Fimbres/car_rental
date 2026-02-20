<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            'name'=>"Luis Fimbres",
            'email'=>Hash::make('23cg0472@itsncg.edu.mx'),
            'email_verified_at'=>now(),
            'password'=>"1234",
            'created_at'=>date('Y-m-d h:m:s'),
            'loyalty_points'=>1234,
            'loyalty_level_id'=>1
        ]);

        $data = new User();
        $data -> name = "Luis Bermudez";
        $data -> email = Hash::make('mail@mail.com');
        $data -> password = "1234";
        $data -> loyalty_points = 1;
        $data -> loyalty_level_id = 1;
        $data -> save();
    }
}
