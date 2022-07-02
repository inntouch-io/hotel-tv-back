<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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

//Route::middleware('auth:sanctum')->get('/rooms', function (Request $request) {
//    return $request->user();
//});


Route::namespace('Api')->group(function (){

    // Auth
    Route::prefix('auth')->as('auth.')->group(function (Router $router){
        $router->post('/register-device', 'AuthController@registerDeviceId')->name('registerDeviceId');
        $router->post('/check-device', 'AuthController@checkDeviceId')->name('checkDeviceId');
    });

    Route::prefix('modules')->group(function (Router $router){
        $router->get('/get-list', 'ModulesController@getList');
    });

});
