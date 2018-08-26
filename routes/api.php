<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Marianvlad\NovaEnvCard\Http\Controllers\EnvironmentController;

Route::get('/environment', EnvironmentController::class.'@show');
Route::post('/environment', EnvironmentController::class.'@update');