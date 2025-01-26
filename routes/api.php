<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\UserAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('locales', LocaleController::class)->middleware('auth:sanctum');
Route::get('translations/export', [TranslationController::class, 'jsonExport'])->middleware('auth:sanctum');
Route::get('translations', [TranslationController::class, 'index'])->middleware('auth:sanctum');
Route::post('translations', [TranslationController::class, 'store'])->middleware('auth:sanctum');
Route::get('translations/{id}', [TranslationController::class, 'show'])->middleware('auth:sanctum');
Route::put('translations/{id}', [TranslationController::class, 'update'])->middleware('auth:sanctum');
Route::delete('translations/{id}', [TranslationController::class, 'destroy'])->middleware('auth:sanctum');


Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])->middleware('auth:sanctum');

