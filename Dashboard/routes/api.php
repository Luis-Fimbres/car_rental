<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\Loyalty_LevelsController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\BrandsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/users',UsersController::class);
Route::resource('/rentals',RentalsController::class);
Route::resource('/payments',PaymentsController::class);
Route::resource('/loyalty_levels',Loyalty_LevelsController::class);
Route::resource('/drivers',DriversController::class);
Route::resource('/cars',CarsController::class);
Route::resource('/brands',BrandsController::class);
