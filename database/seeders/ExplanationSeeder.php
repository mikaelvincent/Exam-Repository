<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Explanation;
use App\Models\Question;

class ExplanationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates a random number (0-3) of explanations for each question.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all questions
        $questions = Question::all();

        foreach ($questions as $question) {
            // Generate a random number of explanations between 0 and 3
            $explanationCount = random_int(0, 3);

            // Create the explanations for the current question
            Explanation::factory()
                ->for($question)
                ->count($explanationCount)
                ->create();
        }
    }
}
