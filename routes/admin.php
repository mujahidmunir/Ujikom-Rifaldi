<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\TableController;
Route::group(['middleware' => ['auth:web', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/account', AccountController::class)->names('admin.account');
    Route::get('tables', [TableController::class, 'index'])->name('admin.tables');
    Route::get('/tables/edit/{id}', [TableController::class, 'edit'])->name('admin.table.edit');
    Route::patch('tables/{id}', [TableController::class, 'update']);
    Route::post('tables', [TableController::class, 'store']);
    Route::get('/tables/delete/{id}', [TableController::class, 'destroy'])->name('admin.table.delete');
});
