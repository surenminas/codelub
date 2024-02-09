<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Post\PostResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

Route::group(['middleware' => 'jwt.auth'], function(){

    Route::get('/', function () {
        return 'Route Api';
    });
});

// Route::group(['namespace' => 'Api', 'middleware' => 'jwt.auth'], function () {
    Route::group(['namespace' => 'Api'], function () {


    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {

        Route::get('/', [App\Http\Controllers\Api\Post\ApiPostController::class, 'index']);
        Route::get('/all', [App\Http\Controllers\Api\Post\ApiPostController::class, 'all']);

    });
});



