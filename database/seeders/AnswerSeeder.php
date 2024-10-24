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
     * This seeder creates a random number of answers (0-4) for each question.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all questions
        $questions = Question::all();

        foreach ($questions as $question) {
            // Create between 0 and 4 answers randomly for each question
            $answerCount = random_int(0, 4);
            
            if ($answerCount > 0) {
                Answer::factory()
                    ->count($answerCount)
                    ->for($question)
                    ->create();
            }
        }
    }
}
