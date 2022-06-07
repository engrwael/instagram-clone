<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/** Profile Routes */
Route::put('/profile/update/{profile:title}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.home');
Route::get('/profile/{profile:title}/edit', [ProfileController::class, 'edit'])->name('profile.edit');

/** Post Routes */
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/p/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/p/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/p/{post:caption}/show', [PostController::class, 'show'])->name('posts.show');

/** Follow Routes */
Route::post('/follow/{user}', [FollowsController::class, 'store'])->name('follow');