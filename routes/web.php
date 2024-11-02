<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/articles', [App\Http\Controllers\Api\ArticleController::class, 'index']);
