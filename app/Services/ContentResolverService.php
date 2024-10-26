<?php

namespace App\Services;

use App\Models\ExamSet;
use App\Models\Question;

class ContentResolverService
{
    /**
     * Resolve the content based on the given URL segments.
     *
     * @param  array  $segments
     * @return array
     */
    public function resolve(array $segments)
    {
        $breadcrumbs = [];
        $currentParentId = null;
        $examSet = null;
        $question = null;

        foreach ($segments as $index => $slug) {
            $examSet = ExamSet::where('slug', $slug)
                ->where('parent_id', $currentParentId)
                ->first();

            if ($examSet) {
                $breadcrumbs[] = ['name' => $examSet->name, 'url' => $this->buildUrl($segments, $index + 1)];
                $currentParentId = $examSet->id;
                continue;
            }

            $question = Question::where('slug', $slug)
                ->where('exam_set_id', $currentParentId)
                ->first();

            if ($question) {
                $breadcrumbs[] = ['name' => $question->name, 'url' => null];
                break;
            }

            // If neither ExamSet nor Question is found, stop processing
            break;
        }

        return [
            'examSet' => $examSet,
            'question' => $question,
            'breadcrumbs' => $breadcrumbs,
        ];
    }

    /**
     * Build the URL up to the specified segment index.
     *
     * @param  array  $segments
     * @param  int    $length
     * @return string
     */
    private function buildUrl(array $segments, int $length)
    {
        return '/' . implode('/', array_slice($segments, 0, $length));
    }
}
