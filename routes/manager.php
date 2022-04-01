<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manager\DashboardController;
use App\Http\Controllers\manager\MenuController;
use App\Http\Controllers\manager\ReportController;
use App\Http\Controllers\manager\LogActivityController;

Route::group(['middleware' => ['auth:web', 'role:manager'], 'prefix' => 'manager'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/menu', MenuController::class)->names('manager.menu');
    Route::get('/report', [ReportController::class, 'index'])->name('manager.report');
    Route::post('report/filter', [ReportController::class, 'filter'])->name('report.filter');
    Route::get('/log-activity' , [LogActivityController::class, 'index']);

    // URL AJAX LOG PEGAWAI
    Route::get('/log-chef', [LogActivityController::class, 'chef'])->name('log.chef');
    Route::get('/log-waiter', [LogActivityController::class, 'waiter'])->name('log.waiter');
    Route::post('/log-chef/filter', [LogActivityController::class, 'filterChef'])->name('log.chef.filter');
    Route::post('/log-waiter/filter', [LogActivityController::class, 'filterWaiter'])->name('log.waiter.filter');

});
