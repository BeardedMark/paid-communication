<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/email/verify', [AuthController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}', [AuthController::class, 'verify'])->name('verification.verify');
    Route::get('/email/resend', [AuthController::class, 'resend'])->name('verification.resend');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::resource('users', UserController::class);

    Route::get('/chats/ajax', [ChatController::class, 'getChatsAjax'])->name('chats.ajax');
    Route::resource('chats', ChatController::class);
    Route::get('/chats/{chat}/messages/preview', [MessageController::class, 'getPreviewMessages'])->name('chats.messages.preview');
    Route::get('/chats/{chat}/messages/new', [MessageController::class, 'getNewMessages'])->name('chats.messages.new');

    // Route::resource('chats.messages', MessageController::class);
    Route::resource('messages', MessageController::class);
});

Route::get('/password/reset',  [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email',  [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}',  [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'reset']);

// Route::middleware(['admin'])->group(function () {
//     Route::resource('/users', UserController::class)->except(['show']);
// });

// Статичные страницы
Route::get('/', [PageController::class, 'welcome'])->name('pages.welcome');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');




//  Динамичные страницы
// Route::get('/messages/index/ajax', [MessageController::class, 'indexAjax'])->name('messages.index.ajax');
// Route::resource('messages', MessageController::class);

// Route::get('/chats/index/ajax', [ChatController::class, 'ajaxIndex'])->name('chats.index.ajax');
// Route::resource('chats', ChatController::class);
