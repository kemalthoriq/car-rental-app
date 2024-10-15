<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;

Route::post('/register', [UserController::class, 'register']);
Route::get('/cars', [CarController::class, 'index']);
Route::post('/rent', [RentalController::class, 'store']);
Route::post('/return', [RentalController::class, 'returnCar']);
