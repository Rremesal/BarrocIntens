<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("product_categories")->insert([
            "name" => "machines",
            "is_employee_only" => 0,
            "created_at" => now(),
        ]);
        DB::table("product_categories")->insert([
            "name" => "intern",
            "is_employee_only" => 1,
            "created_at" => now(),
        ]);


    }
}
