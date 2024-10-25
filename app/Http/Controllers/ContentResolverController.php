<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamSet;
use App\Models\Question;

class ContentResolverController extends Controller
{
    /**
     * Resolve dynamic content based on URL segments.
     *
     * @param  string  $any
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function resolve($any)
    {
        $segments = explode('/', $any);

        // Start from the end to determine if it's a question or exam set
        $slug = array_pop($segments);

        // Attempt to find a question with the given slug
        $question = Question::where('slug', $slug)->first();

        if ($question && $this->matchHierarchy($question->examSet, $segments)) {
            return view('question', ['question' => $question]);
        }

        // Attempt to find an exam set with the given slug
        $examSet = $this->findExamSetBySlugs(array_merge($segments, [$slug]));

        if ($examSet) {
            return view('exam_set', ['examSet' => $examSet]);
        }

        // Return 404 if no content is found
        abort(404);
    }

    /**
     * Verify if the exam set hierarchy matches the URL segments.
     *
     * @param  \App\Models\ExamSet  $examSet
     * @param  array  $segments
     * @return bool
     */
    private function matchHierarchy($examSet, $segments)
    {
        $hierarchy = [];

        // Build the exam set hierarchy
        while ($examSet) {
            $hierarchy[] = $examSet->slug;
            $examSet = $examSet->parent;
        }

        $hierarchy = array_reverse($hierarchy);

        // Check if the hierarchy matches the URL segments
        return $hierarchy === $segments;
    }

    /**
     * Find an exam set by traversing the slugs.
     *
     * @param  array  $slugs
     * @return \App\Models\ExamSet|null
     */
    private function findExamSetBySlugs($slugs)
    {
        $parentId = null;

        foreach ($slugs as $slug) {
            $examSet = ExamSet::where('slug', $slug)
                ->where('parent_id', $parentId)
                ->first();

            if (!$examSet) {
                return null;
            }

            $parentId = $examSet->id;
        }

        return $examSet;
    }
}
