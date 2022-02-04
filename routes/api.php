<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AirlinesController;
use App\Http\Controllers\AirportsController;
use App\Http\Controllers\FlightsController;
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

// Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->resource('airlines', AirlinesController::class);
Route::middleware(['auth:sanctum'])->resource('airports', AirportsController::class);
Route::middleware(['auth:sanctum'])->get('fligths/catalogue', [FlightsController::class, 'catalogue']);
Route::middleware(['auth:sanctum'])->resource('fligths', FlightsController::class);



