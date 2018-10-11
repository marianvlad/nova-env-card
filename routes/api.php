<?php

use Illuminate\Support\Facades\Route;

Route::get('/environment', 'Marianvlad\NovaEnvCard\Http\Controllers\Environment@get');
Route::post('/environment', 'Marianvlad\NovaEnvCard\Http\Controllers\Environment@post');
