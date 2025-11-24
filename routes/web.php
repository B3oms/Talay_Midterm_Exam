<?php

use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;


// Home / Tweet feed
Route::middleware('auth')->group(function () {
    Route::get('/', [TweetController::class, 'index'])->name('home');

    // Tweet actions
    Route::post('/tweet', [TweetController::class, 'store'])->name('tweet.store');
    Route::post('/tweet/{tweet}/like', [TweetController::class, 'like'])->name('tweet.like');
    Route::post('/tweet/{tweet}/retweet', [TweetController::class, 'retweet'])->name('tweet.retweet');

    // Profile editing
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Show user profile
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

require __DIR__.'/auth.php';
