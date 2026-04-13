<?php

use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CarroController::class, 'index']);
Route::resource('carros', CarroController::class);

