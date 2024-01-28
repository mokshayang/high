<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Testing\Fluent\Concerns\Has;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
        ];
    }
}
