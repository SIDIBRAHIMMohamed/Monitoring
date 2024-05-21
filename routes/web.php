<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ModuleHistoryController;




Route::get('/', function () {
    return redirect()->route('modules.index');
});

Route::resource('modules', ModuleController::class);
Route::get('modules/{module}/histories', [ModuleHistoryController::class, 'show'])->name('modules.histories.show');
Route::get('/modules/{module}/confirm-delete', [ModuleController::class, 'confirmDelete'])->name('modules.confirm-delete');
