
<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleShowController;
use App\Http\Controllers\ArticleLikeController;

Route::get('/home', function () {
    return redirect()->route('accueil');
})->name('home');
Route::get('/', [HomeController::class, 'index'])->name('accueil');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleShowController::class, 'show'])->name('articles.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
});

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::post('/user/{id}/follow', [UserController::class, 'follow'])->name('user.follow');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/password', [NewPasswordController::class, 'updateProfilePassword'])
            ->name('profile.password.update');
});
Route::post('/articles/{article}/like', [ArticleLikeController::class, 'toggle'])
    ->middleware('auth')
    ->name('articles.like');

Route::get('/articles/create', function () {
    return 'Page création article (à faire)';
})->name('articles.create');


