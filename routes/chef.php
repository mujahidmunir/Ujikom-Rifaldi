<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chef\DashboardController;


Route::group(['middleware' => ['auth:web', 'role:chef'], 'prefix' => 'chef'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/{id}', [DashboardController::class, 'index']);
    Route::get('/waiters', [DashboardController::class, 'waiters']);
    Route::post('/approve', [DashboardController::class, 'approve']);
    Route::post('/order-delivery', [DashboardController::class, 'orderDelivery']);


});
