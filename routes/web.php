<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('accueil');


Route::get('/articles/{article}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/auteurs/{user}', [AuteurController::class, 'show'])
    ->name('auteurs.show');

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('/home', function () {
    return view('home');
})->name("home");


