<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;

Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('areas.show');
Route::put('areas/{area}', [AreaController::class, 'update'])->name('area.update');
Route::get('areas/{area}/editar', [AreaController::class, 'edit'])->name('area.edit');
Route::delete('areas/{area}', [AreaController::class, 'destroy'])->name('area.destroy');
