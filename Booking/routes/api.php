<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/city',[CityController::class, 'getAll']);
Route::get('/city/{id}',[CityController::class, 'getById']);
Route::post('/city',[CityController::class, 'add']);
Route::put('/city/{id}',[CityController::class, 'edit']);
Route::delete('/city/{id}',[CityController::class, 'delete']);

Route::get('/country',[CountryController::class, 'getAll']);
Route::get('/country/{id}',[CountryController::class, 'getById']);
Route::post('/country',[CountryController::class, 'add']);
Route::put('/country/{id}',[CountryController::class, 'edit']);
Route::delete('/country/{id}',[CountryController::class, 'delete']);

Route::get('/cabinet',[CabinetController::class, 'getAll']);
Route::get('/cabinet/{city}',[CabinetController::class, 'getByCity']);
Route::get('/cabinet/{id}',[CabinetController::class, 'getById']);
Route::post('/cabinet',[CabinetController::class, 'add']);
Route::put('/cabinet/{id}',[CabinetController::class, 'edit']);
Route::delete('/cabinet/{id}',[CabinetController::class, 'delete']);

Route::get('/booking',[BookingController::class, 'getAll']);
Route::get('/booking/{id}',[BookingController::class, 'getById']);
Route::post('/booking',[BookingController::class, 'add']);
Route::put('/booking/{id}',[BookingController::class, 'edit']);
Route::delete('/booking/{id}',[BookingController::class, 'delete']);

Route::get('/building',[BuildingController::class, 'getAll']);
Route::get('/building/{id}',[BuildingController::class, 'getById']);
Route::post('/building',[BuildingController::class, 'add']);
Route::put('/building/{id}',[BuildingController::class, 'edit']);
Route::delete('/building/{id}',[BuildingController::class, 'delete']);
