<?php

use App\Http\Controllers\ConfessionFoiController;
use App\Http\Controllers\HistoireSectionController;
use App\Http\Controllers\OrganisationCBTController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\EgliseController;
use App\Http\Controllers\DateUtileController;


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

// endpoints de /confession-foi
Route::get('/confession-foi', [ConfessionFoiController::class, 'index']);

Route::post('/confession-foi', [ConfessionFoiController::class, 'store']);


// endpoints de /zones
Route::prefix('zones')->group(function(){

    Route::get('/', [ZoneController::class,'index']);

    Route::get('/{id}', [ZoneController::class,'show']);

    Route::post('/', [ZoneController::class,'store']);

    Route::put('/{id}', [ZoneController::class,'update']);

    Route::delete('/{id}', [ZoneController::class,'destroy']);

});

// endpoints de /eglises
Route::prefix('eglises')->group(function(){

    Route::get('/', [EgliseController::class,'index']);

    Route::get('/{id}', [EgliseController::class,'show']);

    Route::post('/', [EgliseController::class,'store']);

    Route::put('/{id}', [EgliseController::class,'update']);

    Route::delete('/{id}', [EgliseController::class,'destroy']);

});


// endpoints de /dates-utiles
Route::prefix('dates-utiles')->group(function(){

    Route::get('/', [DateUtileController::class,'index']);

    Route::get('/{id}', [DateUtileController::class,'show']);

    Route::post('/', [DateUtileController::class,'store']);

    Route::put('/{id}', [DateUtileController::class,'update']);

    Route::delete('/{id}', [DateUtileController::class,'destroy']);

});
