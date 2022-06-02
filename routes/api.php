<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ReactionController;

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

    Route::post('/user', [ AuthController::class, 'user', ])->name('auth.user');
    Route::post('/logout', [ AuthController::class, 'logout', ])->name('auth.logout');

    Route::apiResources([
        'post' => PostController::class,
        'comment' => CommentController::class,
        'reaction' => ReactionController::class,
    ]);

});