<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

//Route::get('/create', [PostsController::class, 'create']);
//Route::get('post/{post}', [PostsController::class, 'show']);

Route::controller(PostsController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::post('/posts/create', 'create');
    Route::get('/posts/{post}', 'show');
    Route::post('/posts/update/{post}', 'update');
    Route::get('/posts/delete/{post}', 'destroy');
});

Route::get('/', function () {
    return view('welcome');
});
