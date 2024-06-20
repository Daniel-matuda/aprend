<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TagController;

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');





Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::put('/password/{user}', [PasswordController::class, 'update'])->name('password.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');





Route::get('/tag/{tag}', [TagController::class, 'show'])->name('tag.show');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('throttle:3');
Route::get('logout', [LoginController::class, 'destroy'])->name('login.destroy');


Route::get('admin', [AdminController::class, 'index'])->middleware('auth');


Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');



Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post');






