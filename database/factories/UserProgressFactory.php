<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Answer;
use App\Models\UserProgress;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProgress>
 */
class UserProgressFactory extends Factory
{
    protected $model = \App\Models\UserProgress::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'answer_id' => Answer::factory(),
            'is_active' => $this->faker->boolean(80), // 80% chance to be active
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Configure the factory with additional constraints.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (UserProgress $userProgress) {
            if ($userProgress->is_active) {
                // Ensure no duplicate answer_id for the same user when is_active == true
                $existing = UserProgress::where('user_id', $userProgress->user_id)
                    ->where('answer_id', $userProgress->answer_id)
                    ->where('is_active', true)
                    ->exists();

                if ($existing) {
                    // Generate a new answer_id to avoid duplication
                    $userProgress->answer_id = Answer::factory()->create()->id;
                }
            }
        });
    }
}
