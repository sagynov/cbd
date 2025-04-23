<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'price' => fake()->numberBetween(100, 1000),
            'description' => fake()->sentence(),
            'images' => [fake()->imageUrl(), fake()->imageUrl()],
            'category_id' => fake()->numberBetween(1, 3),
        ];
    }
}
