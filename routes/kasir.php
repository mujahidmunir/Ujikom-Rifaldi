<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kasir\DashboardController;
use App\Http\Controllers\kasir\HistoryController;

Route::group(['middleware' => ['auth:web', 'role:kasir'], 'prefix' => 'kasir'], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::post('dashboard', [DashboardController::class, 'checkout']);
    Route::get('/get-order/{id}', [DashboardController::class, 'index']);
    Route::get('history', [HistoryController::class, 'index']);
});
