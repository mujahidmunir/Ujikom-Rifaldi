<?php
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:web', 'role:chef'], 'prefix' => 'chef'], function () {

});
