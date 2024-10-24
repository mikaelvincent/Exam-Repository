<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExamSet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamSet>
 */
class ExamSetFactory extends Factory
{
    protected $model = \App\Models\ExamSet::class;

    public function definition()
    {
        return [
            'parent_id' => $this->faker->optional()->for(ExamSet::factory()->state(['is_exam' => false])),
            'name' => $this->faker->words(3, true),
            'slug' => $this->faker->unique()->slug(),
            'is_exam' => $this->faker->boolean(50),
            'children_sort_by' => 'id',
            'children_sort_order' => 'ASC',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
