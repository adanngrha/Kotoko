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
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => random_int(1,5),
            'price' => random_int(10000, 1000000),
            'stock' => random_int(1,100),
            'description' => $this->faker->sentence(),
            'location' =>$this->faker->city(),
        ];
    }
}
