<?php

use App\Http\Controllers\Api\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/temperature', WeatherController::class);

