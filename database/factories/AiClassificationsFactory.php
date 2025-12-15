<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\AiClassifications;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AiClassifications>
 */
class AiClassificationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AiClassifications::class;

    public function definition(): array
    {
        return [
            'user_id' =>  User::inRandomOrder()->first()->id, // otomatis bikin user kalau belum ada
            'input_text' => $this->faker->words(2, true),
            'category' => $this->faker->randomElement(['organik', 'anorganik', 'b3']),
            'result_description' => $this->faker->optional()->paragraph(2),
        ];
    }
}
