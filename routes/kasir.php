<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kasir\DashboardController;

Route::group(['middleware' => ['auth:web', 'role:kasir'], 'prefix' => 'kasir'], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

});
