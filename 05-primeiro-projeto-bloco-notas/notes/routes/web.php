<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

Route::middleware([CheckIsNotLogged::class])->group(function () {
  Route::get('/login', [AuthController::class, 'login']);
  Route::post('/login-submit', [AuthController::class, 'loginSubmit']);
});

Route::middleware([CheckIsLogged::class])->group(function () {
  Route::get('/', [MainController::class, 'index'])->name('home');
  Route::get('/new-note', [MainController::class, 'newNote'])->name('new');
  Route::get('/edit-note/{id}', [MainController::class, 'editNote'])->name('edit');
  Route::get('/delete-note/{id}', [MainController::class, 'deleteNote'])->name('delete');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
