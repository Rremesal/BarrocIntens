<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("roles")->insert([
            "role_name" => "inkoop",
            "created_at" => now(),
        ]);

        DB::table("roles")->insert([
            "role_name" => "sales",
            "created_at" => now(),
        ]);

        DB::table("roles")->insert([
            "role_name" => "klant",
            "created_at" => now(),
        ]);

        DB::table("roles")->insert([
            "role_name" => "maintenance",
            "created_at" => now(),
        ]);

        DB::table("roles")->insert([
            "role_name" => "finance",
            "created_at" => now(),
        ]);

        DB::table("roles")->insert([
            "role_name" => "finance_supervisor",
            "created_at" => now(),
        ]);



        DB::table("roles")->insert([
            "role_name" => "inkoop_supervisor",
            "created_at" => now(),
        ]);

        DB::table("roles")->insert([
            "role_name" => "maintenance_supervisor",
            "created_at" => now(),
        ]);

        DB::table("roles")->insert([
            "role_name" => "sales_supervisor",
            "created_at" => now(),
        ]);










    }
}
