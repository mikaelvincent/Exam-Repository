<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
use App\Models\ExamSet;
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

        // Determine exam set ID
        $examSetId = $this->faker->randomElement(ExamSet::pluck('id')->toArray());

        // Ensure the slug is unique among both exam sets and questions with the same parent
        $slug = $this->uniqueSlugForParent($slug, $examSetId);

        return [
            'exam_set_id' => $examSetId,
            'name' => $name,
            'slug' => $slug,
            'content' => $this->faker->paragraph(),
            'image_src' => $this->faker->optional()->imageUrl(),
            'image_alt' => $this->faker->optional()->words(3, true),
            'answers_sort_by' => $this->faker->randomElement(['id', 'label', 'content', 'created_at', 'updated_at']),
            'answers_sort_order' => $this->faker->randomElement(['ASC', 'DESC', 'RAND']),
        ];
    }

    /**
     * Generate a unique slug among both exam sets and questions for the specified parent ID.
     *
     * @param string $slug
     * @param int $parentId
     * @return string
     */
    protected function uniqueSlugForParent($slug, $parentId)
    {
        $originalSlug = $slug;
        $counter = 1;

        while (
            Question::where('slug', $slug)->where('exam_set_id', $parentId)->exists() ||
            ExamSet::where('slug', $slug)->where('parent_id', $parentId)->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
