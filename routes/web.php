<?php

use App\Http\Controllers\Trackables;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trackables/createNew', [Trackables::class, 'createNew']);
Route::get('/trackables/{uid}', [Trackables::class, 'showByUid']);
Route::get('/trackables', [Trackables::class, 'directory']);
