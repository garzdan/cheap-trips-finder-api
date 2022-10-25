<?php

use App\Http\Controllers\Api\V1\Airport\AirportController;
use App\Http\Controllers\Api\V1\Trip\TripController;
use App\Http\Controllers\Api\V1\Flight\FlightController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.v1'], function () {
   Route::resource('airports', AirportController::class)->only(['index']);
   Route::resource('flights', FlightController::class)->only(['index']);
   Route::resource('trips', TripController::class)->only(['index']);
});
