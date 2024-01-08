<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "name" => "Raul",
            "email" => "raul@gmail.com",
            "password" => Hash::make("admin123"),
            "created_at" => now(),
            "role_id" => 1
        ]);

        DB::table("users")->insert([
            "name" => "Koen",
            "email" => "koen@gmail.com",
            "password" => Hash::make("admin123"),
            "created_at" => now(),
            "role_id" => 1
        ]);

        DB::table("users")->insert([
            "name" => "Jens",
            "email" => "jens@gmail.com",
            "password" => Hash::make("admin123"),
            "created_at" => now(),
            "role_id" => 1
        ]);
    }
}
