<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = \App\Models\Answer::class;

    public function definition()
    {
        return [
            'label' => $this->faker->optional()->randomElement(['A', 'B', 'C', 'D']),
            'content' => $this->faker->optional()->sentence(),
            'image_src' => $this->faker->optional()->imageUrl(),
            'image_alt' => $this->faker->optional()->words(3, true),
            'is_correct' => $this->faker->boolean(25), // 25% chance of being correct
        ];
    }
}
