<?php

use App\Http\Middleware\ApiAuthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanyeQuotesController;


// Route for getting random quotes (secured with ApiTokenAuth middleware)
Route::middleware([ApiAuthToken::class])->group(function () {
    Route::get('/quotes/random', [KanyeQuotesController::class, 'getRandomQuotes']);
    Route::post('/quotes/refresh', [KanyeQuotesController::class, 'refreshQuotes']);
});
