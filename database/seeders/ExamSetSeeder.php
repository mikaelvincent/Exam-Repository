<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExamSet;

class ExamSetSeeder extends Seeder
{
    /**
     * Maximum depth of the ExamSet hierarchy.
     *
     * @var int
     */
    protected $maxDepth = 4;

    /**
     * Maximum number of children per ExamSet.
     *
     * @var int
     */
    protected $maxChildren = 5;

    /**
     * Run the database seeds.
     *
     * Creates multiple root ExamSets and their hierarchical structures.
     *
     * @return void
     */
    public function run()
    {
        // Determine number of top-level ExamSets
        $rootExamSetCount = random_int(2, 5);

        for ($i = 0; $i < $rootExamSetCount; $i++) {
            // Create a top-level ExamSet
            $examSet = ExamSet::factory()->create([
                'parent_id' => null,
                // 'is_exam' is set by the factory
            ]);

            // Recursively create child ExamSets
            $this->createExamSets($examSet->id, 2);
        }
    }

    /**
     * Recursively create ExamSets and their children.
     *
     * @param int|null $parentId Parent ExamSet ID or null for top-level
     * @param int $currentDepth Current depth level
     * @return void
     */
    protected function createExamSets($parentId, $currentDepth)
    {
        if ($currentDepth > $this->maxDepth) {
            return;
        }

        // Determine number of children for current ExamSet
        $childrenCount = random_int(1, $this->maxChildren);

        for ($i = 0; $i < $childrenCount; $i++) {
            // Create an ExamSet
            $examSet = ExamSet::factory()->create([
                'parent_id' => $parentId,
                // 'is_exam' is set by the factory
            ]);

            // Recursively create child ExamSets
            $this->createExamSets($examSet->id, $currentDepth + 1);
        }
    }
}
