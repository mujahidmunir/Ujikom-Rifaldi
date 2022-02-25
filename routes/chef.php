<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chef\DashboardController;


Route::group(['middleware' => ['auth:web', 'role:chef'], 'prefix' => 'chef'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
