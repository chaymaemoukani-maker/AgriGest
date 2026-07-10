<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelleController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('parcelles', ParcelleController::class);