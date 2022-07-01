<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\KendaraanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::controller(KendaraanController::class)->group(function () {
    Route::get('/kendaraans', 'index');
    Route::get('/kendaraans/count/', 'countKendaraans');
});
Route::controller(MobilController::class)->group(function () {
    Route::get('/mobils', 'index');
    Route::get('/mobils/{id}', 'show');
});
Route::controller(MotorController::class)->group(function () {
    Route::get('/motors', 'index');
    Route::get('/motors/{id}', 'show');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
