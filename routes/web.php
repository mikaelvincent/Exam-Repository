<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentResolverController;

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

Route::get('/{any}', [ContentResolverController::class, 'resolve'])
    ->where('any', '.*');
