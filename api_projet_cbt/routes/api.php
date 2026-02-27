<?php

use App\Http\Controllers\PresidentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/presidents', [PresidentController::class, 'index']);

// Route::post('/pictures', [PictureController::class, 'store'])->middleware('App\Http\Middleware\React');


// Route::post('/register', [AuthenticationController::class, 'register']);
// Route::post('/login', [AuthenticationController::class, 'login']);