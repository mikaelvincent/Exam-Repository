<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExamSet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = \App\Models\Question::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'content' => $this->faker->paragraph(),
            'image_src' => $this->faker->optional()->imageUrl(),
            'image_alt' => $this->faker->optional()->words(3, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
