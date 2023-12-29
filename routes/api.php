<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\I18nController;
use App\Http\Controllers\I18nTranslationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(I18nTranslationsController::class)->group(function () {
    Route::get('/i18n/{lang}','index');
});

Route::controller(AssetController::class)->group(function () {
   Route::get('/files', 'index') ;
});