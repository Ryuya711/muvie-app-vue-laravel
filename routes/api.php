<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuvieController;
use App\Http\Controllers\MuvieScoreController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('muvies', MuvieController::class);

Route::post('/muvies/{muvie}/scores', [MuvieScoreController::class, 'store']);

Route::get('/movies/{id}', [MovieController::class, 'show']);