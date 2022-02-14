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



Route::group(['prefix' => '/city'], function () {
    Route::get('/', [CityController::class, 'getAll']);
    Route::get('/{id}', [CityController::class, 'getById']);
    Route::post('/', [CityController::class, 'add']);
    Route::put('/{id}', [CityController::class, 'edit']);
    Route::delete('/{id}', [CityController::class, 'delete']);
});

Route::group(['prefix' => '/country'], function () {
    Route::get('/', [CountryController::class, 'getAll']);
    Route::get('/{id}', [CountryController::class, 'getById']);
    Route::post('/', [CountryController::class, 'add']);
    Route::put('/{id}', [CountryController::class, 'edit']);
    Route::delete('/{id}', [CountryController::class, 'delete']);
});


Route::group(['prefix' => '/cabinet'], function () {
    Route::get('/', [CabinetController::class, 'getAll']);
    Route::get('/{id}', [CabinetController::class, 'getById']);
    Route::get('/{name}', [CabinetController::class, 'getByCity']);
    Route::post('/', [CabinetController::class, 'add']);
    Route::put('/{id}', [CabinetController::class, 'edit']);
    Route::delete('/{id}', [CabinetController::class, 'delete']);
});

Route::group(['prefix' => '/booking'], function () {
    Route::get('/', [BookingController::class, 'getAll']);
    Route::get('/{id}', [BookingController::class, 'getById']);
    Route::post('/', [BookingController::class, 'add']);
    Route::put('/{id}', [BookingController::class, 'edit']);
    Route::delete('/{id}', [BookingController::class, 'delete']);
});

Route::group(['prefix' => '/building'], function () {
    Route::get('/', [BuildingController::class, 'getAll']);
    Route::get('/{id}', [BuildingController::class, 'getById']);
    Route::post('/', [BuildingController::class, 'add']);
    Route::put('/{id}', [BuildingController::class, 'edit']);
    Route::delete('/{id}', [BuildingController::class, 'delete']);
});

