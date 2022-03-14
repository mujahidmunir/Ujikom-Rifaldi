<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manager\DashboardController;
use App\Http\Controllers\manager\MenuController;
use App\Http\Controllers\manager\ReportController;

Route::group(['middleware' => ['auth:web', 'role:manager'], 'prefix' => 'manager'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/menu', MenuController::class)->names('manager.menu');
    Route::get('/report', [ReportController::class, 'index'])->name('manager.report');
    Route::post('report/filter', [ReportController::class, 'filter'])->name('report.filter');
});
