<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::prefix('v1')->group(function(){

    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('/user', [UserController::class, 'user']);

    });

    Route::group(['prefix' => 'auth'], function() {

        Route::post('create', [UserController::class, 'store']);
        Route::post('login', [UserController::class, 'login']);
        Route::post('access_code', [UserController::class, 'generateAccessTokenFromRefreshToken']);

    });

});
