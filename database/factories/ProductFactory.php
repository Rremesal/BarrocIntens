<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->text(140),
            "file" => UploadedFile::fake()->image('thumbnail.jpg', 100, 100)->store('thumbnails', 'public'),
            "price" => fake()->randomFloat(2, 20, 30),
            "product_category_id" => fake()->numberBetween(1,2),
            "created_at" => now(),
            // "updated_at" => null
        ];
    }
}
