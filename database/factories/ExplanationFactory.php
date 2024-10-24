<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Explanation>
 */
class ExplanationFactory extends Factory
{
    protected $model = \App\Models\Explanation::class;

    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
