<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\ExamSet;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates a random number of questions (0-10)
     * associated with ExamSets where 'is_exam' is true.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all ExamSets where is_exam is true
        $examSets = ExamSet::where('is_exam', true)->get();

        foreach ($examSets as $examSet) {
            // Create a random number of questions (0-10) for each ExamSet
            $questionCount = random_int(0, 10);
            
            Question::factory()
                ->count($questionCount)
                ->for($examSet)
                ->create();
        }
    }
}
