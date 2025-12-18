<?php

use App\Http\Controllers\ArticleCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleShowController;
use App\Http\Controllers\ArticleLikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\NewPasswordController;


Route::get('/', [HomeController::class, 'index'])->name('accueil');

Route::get('/home', function () {
    return redirect()->route('accueil');
})->name('home');


Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles.index');


Route::middleware(['auth'])->group(function () {

    Route::get('/articles/create', [ArticleController::class, 'create'])
        ->name('articles.create');

    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])
        ->name('articles.edit');

    Route::put('/articles/{article}', [ArticleController::class, 'update'])
        ->name('articles.update');

    Route::post('/articles', [ArticleController::class, 'store'])
        ->name('articles.store');

    Route::post('/articles/{article}/like', [ArticleLikeController::class, 'toggle'])
        ->name('articles.like');

    Route::post('/articles/{article}/publish', [ArticleController::class, 'publish'])
        ->middleware('auth')
        ->name('articles.publish');

});
Route::get('/articles/{article}', [ArticleShowController::class, 'show'])
    ->name('articles.show');

Route::get('/user/{id}', [UserController::class, 'show'])
    ->name('user.show');

Route::post('/user/{id}/follow', [UserController::class, 'follow'])
    ->name('user.follow');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::post('/profile/password', [NewPasswordController::class, 'updateProfilePassword'])
        ->name('profile.password.update');
});


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/test-vite', function () {
    return view('test-vite');
})->name('test-vite');

Route::post('/articles/{article}/comment', [ArticleCommentController::class, 'store'])
    ->middleware('auth')
    ->name('articles.comment');

Route::delete('/avis/{avis}', [ArticleCommentController::class, 'destroy'])
    ->middleware('auth')
    ->name('avis.destroy');


