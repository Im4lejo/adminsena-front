<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;

Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('areas.show');
Route::put('area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::get('area/{area}/editar', [AreaController::class, 'edit'])->name('area.edit');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');
Route::post('area', [AreaController::class, 'store'])->name('area.store');
Route::get('areas/create', [AreaController::class, 'create'])->name('area.create');
