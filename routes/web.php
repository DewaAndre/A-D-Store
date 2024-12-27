<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ImageController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/collection', [CollectionController::class, 'index']);

Route::get('/detail/{id}', [ImageController::class, 'show'])->name('image.detail');



