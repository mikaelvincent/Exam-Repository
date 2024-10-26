<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamSetController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('home');
});

Route::get('/contributors', function () {
    $breadcrumbs = [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Contributors', 'url' => null],
    ];

    return view('pages.contributors', compact('breadcrumbs'));
});

Route::middleware('content.resolution')->group(function () {
    Route::get('/{any?}', function () {
        $examSet = request()->get('examSet');
        $question = request()->get('question');
        $breadcrumbs = request()->get('breadcrumbs');

        if ($question) {
            return view('question', compact('question', 'breadcrumbs'));
        }

        if ($examSet) {
            return view('exam_set', compact('examSet', 'breadcrumbs'));
        }

        return response()->view('errors.404', [
            'breadcrumbs' => $breadcrumbs,
        ], 404);
    })->where('any', '.*');
});
