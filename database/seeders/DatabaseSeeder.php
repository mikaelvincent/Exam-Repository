<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * This method calls individual seeders in the correct order to maintain data integrity.
     *
     * @return void
     */
    public function run()
    {
        // Order is important to maintain foreign key constraints
        $this->call([
            UserSeeder::class,
            ExamSetSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            ExplanationSeeder::class,
            UserProgressSeeder::class,
            HttpRequestSeeder::class,
        ]);
    }
}
