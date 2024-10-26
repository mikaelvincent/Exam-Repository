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
                $breadcrumbs[] = [
                    'name' => $examSet->name,
                    'url' => $this->buildUrl($segments, $index + 1)
                ];
                $currentParentId = $examSet->id;
                continue;
            }

            $question = Question::where('slug', $slug)
                ->where('exam_set_id', $currentParentId)
                ->first();

            if ($question) {
                $breadcrumbs[] = [
                    'name' => $question->name,
                    'url' => $this->buildUrl($segments, $index + 1)
                ];
                
                // Exit early if it's the last segment, or continue if no other segments
                if ($index === count($segments) - 1) {
                    break;
                }
                
                // If not the last segment, reset question and continue processing
                $question = null;
                continue;
            }
            
            // If no match is found, specify error and exit loop
            $breadcrumbs[] = ['name' => 'Error', 'url' => null];
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
