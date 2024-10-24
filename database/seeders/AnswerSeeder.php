<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates a random number (0-4) of unique answers for each question,
     * ensuring that each answer label ('A', 'B', 'C', 'D') is unique per question.
     *
     * @return void
     */
    public function run()
    {
        // Define possible labels
        $labels = ['A', 'B', 'C', 'D'];

        // Fetch all questions
        $questions = Question::all();

        foreach ($questions as $question) {
            // Create between 1 and 4 unique answers for each question
            $answerCount = random_int(1, count($labels));
            
            // Shuffle labels and take the required number
            $assignedLabels = collect($labels)->shuffle()->take($answerCount)->toArray();

            foreach ($assignedLabels as $label) {
                Answer::factory()
                    ->for($question)
                    ->create([
                        'label' => $label,
                    ]);
            }
        }
    }
}
