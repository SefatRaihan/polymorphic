<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;


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


Route::get('/', [PostController::class, 'index'])->name('post-index');
Route::get('create', [PostController::class, 'create']);
Route::post('store', [PostController::class, 'store']);
Route::get('show/{id}', [PostController::class, 'show']);
Route::get('edit/{id}', [PostController::class, 'edit']);
Route::put('update/{id}', [PostController::class, 'update'])->name('post-update');
Route::get('delete/{id}', [PostController::class, 'destroy']);




Route::post('comment/post/{id}', [CommentsController::class, 'store'])->name('post.comment');
Route::resource('comment', 'CommentController');
