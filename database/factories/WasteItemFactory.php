<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WasteItem>
 */
class WasteItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'category' => $this->faker->randomElement([
                'anorganik', 'organik','b3'
            ]),
            'description' => $this->faker->sentence(8),
            'composition' => $this->faker->sentence(8),
            'impact' => $this->faker->sentence(8),
            'handling' => $this->faker->sentence(8),
            'recycling' => $this->faker->sentence(8),
        ];
    }
}
