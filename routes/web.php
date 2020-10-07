<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('home.index');
})->middleware('auth');

Auth::routes();

Route::resource('home', HomeController::class)->middleware('auth');
