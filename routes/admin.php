<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AccountController;
Route::group(['middleware' => ['auth:web', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/account', AccountController::class)->names('admin.account');
});
