<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login-submit', [AuthController::class, 'loginSubmit']);

Route::middleware([CheckIsLogged::class])->group(function () {
  Route::get('/', [MainController::class, 'index']);
  Route::get('/new-note', [MainController::class, 'newNote']);
  Route::get('/logout', [AuthController::class, 'logout']);
});
