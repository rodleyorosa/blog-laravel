<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// Guest routes
Route::get('/', function() {
    return redirect('/posts');
});

Route::get('/posts', [PostController::class, 'allPosts'])->name('posts');
Route::resource('authors', UserController::class)->only('index', 'show');
Route::resource('authors.posts', PostController::class)->except('show');

Route::get('/login', [LoginController::class, 'login'])->name("login");
Route::post('/login', [LoginController::class, 'doLogin']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'doRegister']);

Route::group(["middleware" => ["auth"]], function() {
    Route::resource('authors.posts', PostController::class)->except('index', 'show');    
});