<?php

use App\Http\Controllers\HistoireSectionController;
use App\Http\Controllers\PresidentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// endpoints de /president
Route::get('/presidents', [PresidentController::class, 'index']);

Route::post('/presidents', [PresidentController::class, 'store']);

// endpoints de /notre-histoire
Route::get('/notre-histoire', [HistoireSectionController::class, 'index']);

Route::post('/notre-histoire', [HistoireSectionController::class, 'store']);


// Route::post('/register', [AuthenticationController::class, 'register']);
// Route::post('/login', [AuthenticationController::class, 'login']);