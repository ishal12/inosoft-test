<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PenjualanController;
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
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::group(["middleware" => ["jwt.verify"]], function () {
    Route::get("/logout", [AuthController::class, "logout"]);
    Route::get("/username", [AuthController::class, "profile"]);

    Route::controller(PenjualanController::class)->group(function () {
        Route::get("/penjualans/", "index")->middleware("api");
        Route::get("/penjualans/{id}", "show");
        Route::get("/penjualans/kendaraan/{tipe_kendaraan}", "showKendaraans");
        Route::post("/penjualans", "store");
    });

    Route::controller(KendaraanController::class)->group(function () {
        Route::get("/kendaraans", "index");
        Route::get("/kendaraans/count/", "countKendaraans");
    });

    Route::controller(MobilController::class)->group(function () {
        Route::get("/mobils", "index");
        Route::get("/mobils/trashed", "trashed");
        Route::get("/mobils/{id}", "show");
        Route::put("/mobils/{id}", "update");
        Route::delete("/mobils/{id}", "destroy");
    });

    Route::controller(MotorController::class)->group(function () {
        Route::get("/motors", "index");
        Route::get("/motors/trashed", "trashed");
        Route::get("/motors/{id}", "show");
        Route::put("/motors/{id}", "update");
        Route::delete("/motors/{id}", "destroy");
    });
});
