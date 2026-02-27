<?php

use App\Http\Controllers\PresidentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// endpoints de /president
Route::get('/presidents', [PresidentController::class, 'index']);

Route::post('/presidents', [PresidentController::class, 'store']);


// Route::post('/register', [AuthenticationController::class, 'register']);
// Route::post('/login', [AuthenticationController::class, 'login']);