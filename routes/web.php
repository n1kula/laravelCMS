<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articles', [App\Http\Controllers\Api\ArticleController::class, 'index']);
