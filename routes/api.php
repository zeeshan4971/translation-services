<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\LocaleController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('locales', LocaleController::class);

Route::get('translations', [TranslationController::class, 'index']);
Route::post('translations', [TranslationController::class, 'store']);
Route::get('translations/{id}', [TranslationController::class, 'show']);
Route::put('translations/{id}', [TranslationController::class, 'update']);
Route::delete('translations/{id}', [TranslationController::class, 'destroy']);
