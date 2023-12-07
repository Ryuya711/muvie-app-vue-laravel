<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('movie.index');
});

すべてのリクエストをVueアプリケーションにリダイレクトする
Route::get('/{any}', function () {
    return view('movie.index');
})->where('any', '.*');