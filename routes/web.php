<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('muvie.index');
});

// すべてのリクエストをVueアプリケーションにリダイレクトする
Route::get('/{any}', function () {
    return view('muvie.index');
})->where('any', '.*');