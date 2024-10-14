<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Furniture>
 */
class FurnitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $minPrice = 100.00; // минимальная цена
        $maxPrice = 10_000.00; // максимальная цена

        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'cost' => mt_rand($minPrice * 100, $maxPrice * 100) / 100,
            'stock' => fake()->boolean()
        ];
    }
}
