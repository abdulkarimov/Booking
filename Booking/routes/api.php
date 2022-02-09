<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/city',[CityController::class, 'get']);
Route::get('/city/{id}',[CityController::class, 'getById']);
Route::post('/city',[CityController::class, 'add']);
Route::put('/city/{id}',[CityController::class, 'edit']);
Route::delete('/city/{id}',[CityController::class, 'delete']);

Route::get('/country',[CountryController::class, 'get']);
Route::get('/country/{id}',[CityController::class, 'getById']);
Route::post('/country',[CountryController::class, 'add']);
Route::put('/country/{id}',[CountryController::class, 'edit']);
Route::delete('/country/{id}',[CountryController::class, 'delete']);

Route::get('/cabinet',[CabinetController::class, 'get']);
Route::get('/cabinet/{id}',[CityController::class, 'getById']);

Route::post('/cabinet',[CabinetController::class, 'add']);
Route::put('/cabinet/{id}',[CabinetController::class, 'edit']);
Route::delete('/cabinet/{id}',[CabinetController::class, 'delete']);

Route::get('/booking',[BookingController::class, 'get']);
Route::get('/booking/{id}',[CityController::class, 'getById']);
Route::post('/booking',[BookingController::class, 'add']);
Route::put('/booking/{id}',[BookingController::class, 'edit']);
Route::delete('/booking/{id}',[BookingController::class, 'delete']);

Route::get('/building',[BuildingController::class, 'get']);
Route::get('/building/{id}',[CityController::class, 'getById']);
Route::post('/building',[BuildingController::class, 'add']);
Route::put('/building/{id}',[BuildingController::class, 'edit']);
Route::delete('/building/{id}',[BuildingController::class, 'delete']);
