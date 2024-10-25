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
     * This seeder creates a random number (0-4) of answers for each question,
     * allowing duplicate labels and NULL values for labels by leveraging the factory's optional label.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all questions
        $questions = Question::all();

        foreach ($questions as $question) {
            // Create between 0 and 4 answers for each question
            $answerCount = random_int(0, 4);

            Answer::factory()
                ->count($answerCount)
                ->for($question)
                ->create();
        }
    }
}
