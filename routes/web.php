<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentResolverController;

Route::get('/', function () {
    return view('home');
});

Route::get('/contributors', function () {
    return view('contributors');
});

Route::get('/{any}', [ContentResolverController::class, 'resolve'])
    ->where('any', '.*');
