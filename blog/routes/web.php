<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return redirect('/articles');
});

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/new', [ArticleController::class, 'create']);

Route::post('/articles', [ArticleController::class, 'store']);

Route::get('/articles/{id}/{slug}', [ArticleController::class, 'getArticle']);


Route::get('/authors', [AuthorController::class, 'index']);

Route::get('/authors/new', [AuthorController::class, 'create']);

Route::post('/authors', [AuthorController::class, 'store']);


// Route::get('/articles/{id}/{slug}', [CommentController::class, 'getComments']);

// Route::post('/articles/{id}/{slug}', [CommentController::class, 'store']);  