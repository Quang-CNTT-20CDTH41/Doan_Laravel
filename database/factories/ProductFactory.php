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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomDigit(),
            'sale_price' => $this->faker->randomDigit(),
            'image' => $this->faker->imageUrl(),
            'image_list' => $this->faker->imageUrl(),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'status' => $this->faker->boolean(),
            'category_id' => 1,
        ];
    }
}
