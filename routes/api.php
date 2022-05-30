<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [ AuthController::class, 'register', ])->name('auth.register');
Route::post('/login', [ AuthController::class, 'login', ])->name('auth.login');

Route::group([ 'middleware' => [ 'auth:sanctum', ] ], function () {

    Route::post('/logout', [ AuthController::class, 'logout', ])->name('auth.logout');

});