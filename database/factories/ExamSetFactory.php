<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExamSet;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamSet>
 */
class ExamSetFactory extends Factory
{
    protected $model = \App\Models\ExamSet::class;

    /**
     * Available options for sorting.
     *
     * @var array
     */
    protected $sortByOptions = ['id', 'name', 'slug', 'created_at', 'updated_at'];
    protected $sortOrderOptions = ['ASC', 'DESC'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(3, true);
        $slug = Str::slug($name);

        // Ensure the slug is unique for the same parent_id
        $parentId = $this->faker->optional()->randomElement(ExamSet::pluck('id')->toArray());
        $slug = $this->uniqueSlugForParent($slug, $parentId);

        return [
            'parent_id' => $parentId,
            'name' => $name,
            'slug' => $slug,
            'is_exam' => $this->faker->boolean(50),
            'children_sort_by' => $this->faker->randomElement($this->sortByOptions),
            'children_sort_order' => $this->faker->randomElement($this->sortOrderOptions),
        ];
    }

    /**
     * Generate a unique slug for the specified parent_id.
     *
     * @param string $slug
     * @param int|null $parentId
     * @return string
     */
    protected function uniqueSlugForParent($slug, $parentId)
    {
        $originalSlug = $slug;
        $counter = 1;

        while (ExamSet::where('slug', $slug)->where('parent_id', $parentId)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
