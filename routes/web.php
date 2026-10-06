<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;

Route::get('area', [AreaController::class, 'index'])->name('home.index');
