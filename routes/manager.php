<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manager\DashboardController;
use App\Http\Controllers\manager\MenuController;

Route::group(['middleware' => ['auth:web', 'role:manager'], 'prefix' => 'manager'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/menu', MenuController::class)->names('manager.menu');
});
