<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Trackables;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/trackables/createNew', [Trackables::class, 'createNew'])->middleware(['auth']);;
Route::get('/trackables/{uid}', [Trackables::class, 'showByUid'])->middleware(['auth']);;
Route::get('/trackables', [Trackables::class, 'directory'])->middleware(['auth']);;

require __DIR__.'/auth.php';
