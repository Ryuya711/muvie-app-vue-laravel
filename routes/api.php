<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\movieController;
use App\Http\Controllers\movieScoreController;
use App\Http\Controllers\movieReviewController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('movies', movieController::class);

Route::post('/movies/{movie}/scores', [movieScoreController::class, 'store']);
Route::post('/movies/{movie}/reviews', [movieReviewController::class, 'store']);
// Route::get('/movies/{id}', [movieController::class, 'show']);