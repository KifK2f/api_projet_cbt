<?php

use App\Http\Controllers\HistoireSectionController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\OrganisationCBTController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// endpoints de /president
Route::get('/presidents', [PresidentController::class, 'index']);

Route::post('/presidents', [PresidentController::class, 'store']);

// endpoints de /notre-histoire
Route::get('/notre-histoire', [HistoireSectionController::class, 'index']);

Route::post('/notre-histoire', [HistoireSectionController::class, 'store']);

// endpoints de OrganisationCBT
Route::get('/organisation-gouvernance', [OrganisationCBTController::class, 'index']);

Route::post('/organisation-gouvernance', [OrganisationCBTController::class, 'store']);