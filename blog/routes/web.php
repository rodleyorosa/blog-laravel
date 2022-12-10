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

Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);

Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::post('/articles/{id}', [ArticleController::class, 'update']);

Route::post('/articles/{id}/{name}', [ArticleController::class, 'storeComment']);

Route::get('/articles/{id}/{slug}', [ArticleController::class, 'show']);

Route::get('/authors/{id}/{name}/articles', [ArticleController::class, 'indexByAuthor']);




Route::get('/authors', [AuthorController::class, 'index']);

Route::get('/authors/new', [AuthorController::class, 'create']);

Route::post('/authors', [AuthorController::class, 'store']);

Route::get('/authors/edit/{id}', [AuthorController::class, 'edit']);

Route::get('/authors/delete/{id}', [AuthorController::class, 'delete']);

Route::post('/authors/{id}', [AuthorController::class, 'update']);

Route::get('/authors/{id}/{name}', [AuthorController::class, 'show']);
