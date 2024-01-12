<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MessageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'welcome'])->name('pages.welcome');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/messages/index/ajax', [MessageController::class, 'indexAjax'])->name('messages.index.ajax');
Route::resource('messages', MessageController::class);
