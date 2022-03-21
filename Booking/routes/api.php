<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CRUD_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => '/city'], function () {
    Route::get('/', [CRUD_Controller::class, 'getAll']);
    Route::get('/{id}', [CRUD_Controller::class, 'getById']);
    Route::post('/', [CRUD_Controller::class, 'add']);
    Route::put('/{id}', [CRUD_Controller::class, 'edit']);
    Route::delete('/{id}', [CRUD_Controller::class, 'delete']);
});

Route::group(['prefix' => '/cabinet'], function () {
    Route::get('/', [CRUD_Controller::class, 'getAll']);
    Route::get('/{id}', [CRUD_Controller::class, 'getById']);
    Route::post('/', [CRUD_Controller::class, 'add']);
    Route::put('/{id}', [CRUD_Controller::class, 'edit']);
    Route::delete('/{id}', [CRUD_Controller::class, 'delete']);
});

Route::group(['prefix' => '/country'], function () {
    Route::get('/', [CRUD_Controller::class, 'getAll']);
    Route::get('/{id}', [CRUD_Controller::class, 'getById']);
    Route::post('/', [CRUD_Controller::class, 'add']);
    Route::put('/{id}', [CRUD_Controller::class, 'edit']);
    Route::delete('/{id}', [CRUD_Controller::class, 'delete']);
    });

Route::group(['prefix' => '/booking'], function () {
    Route::get('/', [CRUD_Controller::class, 'getAll']);
    Route::post('/test', [CRUD_Controller::class, 'getInUseCabinet']);
    Route::get('/{id}', [CRUD_Controller::class, 'getById']);
    Route::post('/', [CRUD_Controller::class, 'add']);
    Route::put('/{id}', [CRUD_Controller::class, 'edit']);
    Route::delete('/{id}', [CRUD_Controller::class, 'delete']);
});

Route::group(['prefix' => '/building'], function () {
    Route::get('/', [CRUD_Controller::class, 'getAll']);
    Route::get('/{id}', [CRUD_Controller::class, 'getById']);
    Route::post('/', [CRUD_Controller::class, 'add']);
    Route::put('/{id}', [CRUD_Controller::class, 'edit']);
    Route::delete('/{id}', [CRUD_Controller::class, 'delete']);
});
