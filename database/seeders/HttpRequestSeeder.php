<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HttpRequest;
use App\Models\User;
use App\Models\ExamSet;
use App\Models\Question;
use Faker\Factory as Faker;

class HttpRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates HTTP request records for each user with realistic paths.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker
        $faker = Faker::create();

        // Fetch all users
        $users = User::all();

        foreach ($users as $user) {
            // Each user has between 10 to 30 HTTP requests
            $requestCount = random_int(10, 30);

            for ($i = 0; $i < $requestCount; $i++) {
                // Determine the type of path
                $pathType = $faker->randomElement(['home', 'exam_set', 'question']);

                switch ($pathType) {
                    case 'home':
                        $path = '/';
                        break;
                    case 'exam_set':
                        $path = $this->generateExamSetPath();
                        break;
                    case 'question':
                        $path = $this->generateQuestionPath();
                        break;
                    default:
                        $path = '/';
                        break;
                }

                HttpRequest::factory()
                    ->for($user)
                    ->state(['path' => $path])
                    ->create();
            }
        }
    }

    /**
     * Generate a realistic path for an exam set, traversing its parent hierarchy.
     *
     * @return string
     */
    protected function generateExamSetPath()
    {
        $examSet = ExamSet::inRandomOrder()->first();

        if (!$examSet) {
            return '/';
        }

        $slugs = [];
        while ($examSet) {
            array_unshift($slugs, $examSet->slug);
            $examSet = $examSet->parent;
        }

        return implode('/', $slugs);
    }

    /**
     * Generate a realistic path for a question within an exam set hierarchy.
     *
     * @return string
     */
    protected function generateQuestionPath()
    {
        $question = Question::inRandomOrder()->first();

        if (!$question) {
            return '/';
        }

        $examSet = $question->examSet;
        $slugs = [];

        while ($examSet) {
            array_unshift($slugs, $examSet->slug);
            $examSet = $examSet->parent;
        }

        $slugs[] = $question->slug;

        return implode('/', $slugs);
    }
}
