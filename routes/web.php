<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/index', [ArticleController::class, 'show'])->name('article.index');

Route::get('categories/index', function () {
    return view('categories.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
