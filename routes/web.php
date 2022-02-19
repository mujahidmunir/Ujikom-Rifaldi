<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JsonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes([
    'register' => false
]);


Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/test', [\App\Http\Controllers\TestController::class, 'index'])->name('test');
    Route::get('/',[JsonController::class, 'index']);
    Route::get('/{id}',[JsonController::class, 'index']);
    Route::get('get-menu/{id}',[JsonController::class, 'filterMenu']);
    Route::post('cart', [JsonController::class, 'add_cart'])->name('addCart');

    Route::get('/list-cart', [JsonController::class, 'list_cart'])->name('list_cart');
    Route::get('/delete-cart/{id}', [JsonController::class, 'delete_cart'])->name('delete-cart');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'asdf'])->name('home');

});




