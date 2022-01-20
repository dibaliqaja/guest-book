<?php

use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\ProvinceCityController;
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

Route::get('provinces', [ProvinceCityController::class, 'provinces']);
Route::get('cities/{code}', [ProvinceCityController::class, 'cities']);

Route::apiResource('guests', GuestBookController::class);
