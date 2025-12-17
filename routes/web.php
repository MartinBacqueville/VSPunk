<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleShowController;


Route::get('/', [HomeController::class, 'index'])->name('accueil');


Route::get('/articles/{article}', [ArticleShowController::class, 'show'])
    ->name('articles.show');

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('/home', function () {
    return redirect()->route('accueil');
})->name("home");

Route::get('/articles/{id}', [ArticleShowController::class, 'show'])
    ->name('articles.show');

Route::get('/user/{id}', [UserController::class, 'show'])
    ->name('user.show');

Route::post('/user/{id}/follow', [UserController::class, 'follow'])
    ->name('user.follow');

