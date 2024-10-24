<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = \App\Models\Question::class;

    public function definition()
    {
        $name = $this->faker->sentence();
        $slug = Str::slug($name);

        // Ensure the slug is unique for the same exam_set_id
        $examSetId = $this->faker->randomElement(\App\Models\ExamSet::pluck('id')->toArray());
        $slug = $this->uniqueSlugForExamSet($slug, $examSetId);

        return [
            'exam_set_id' => $examSetId,
            'name' => $name,
            'slug' => $slug,
            'content' => $this->faker->paragraph(),
            'image_src' => $this->faker->optional()->imageUrl(),
            'image_alt' => $this->faker->optional()->words(3, true),
        ];
    }

    /**
     * Generate a unique slug for the specified exam_set_id.
     *
     * @param string $slug
     * @param int $examSetId
     * @return string
     */
    protected function uniqueSlugForExamSet($slug, $examSetId)
    {
        $originalSlug = $slug;
        $counter = 1;

        while (Question::where('slug', $slug)->where('exam_set_id', $examSetId)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
