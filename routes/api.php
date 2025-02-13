<?php

use App\Http\Controllers\Api\FiasController;
use App\Http\Controllers\Api\MediaController;
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


Route::namespace('Api')->as('api.')->group(function () {

    Route::middleware('auth:sanctum')->prefix('user')->as('user.')->group(function (Router $router) {
        $router->get('/get-info', 'UserController@getInfo')->name('get_info');
    });

    // Version check
    Route::prefix('version')->as('version.')->group(function (Router $router) {
        $router->get('check', 'VersionController@check')->name('check');
    });

    // Auth
    Route::prefix('auth')->as('auth.')->group(function (Router $router) {
        $router->post('/register-device', 'AuthController@registerDeviceId')->name('registerDeviceId');
        //        $router->post('/check-device', 'AuthController@checkDeviceId')->name('checkDeviceId');
    });

    Route::prefix('modules')->as('modules.')->group(function (Router $router) {
        $router->get('/get-list', 'ModulesController@getList');
    });

    Route::prefix('third-party')->namespace('ThirdParty')->as('third-party.')->group(function () {
        //Apps
        Route::prefix('applications')->as('applications.')->group(function (Router $router) {
            $router->get('get-list', 'ApplicationsController@getList')->name('getList');
        });
        //Weather
        Route::prefix('weather')->as('weather.')->group(function (Router $router) {
            $router->get('get-today', 'WeatherController@getToday')->name('getToday');
        });

        // Rate currency
        Route::prefix('currency')->as('currency.')->group(function (Router $router) {
            $router->get('get-today', 'CurrencyController@getCurrency')->name('getCurrency');
        });
    });

    Route::prefix('messages')->as('messages.')->group(function (Router $router) {
        $router->get('get-list', 'MessagesController@getList')->name('getList');
        $router->get('get-cards', 'MessagesController@getCards')->name('getCards');
    });

    Route::prefix('information')->as('information.')->group(function (Router $router) {
        $router->get('get-list', 'InformationController@getList')->name('getList');
        $router->get('get-cards', 'InformationController@getCards')->name('getCards');
    });

    Route::prefix('iptv-countries')->as('iptv-countries.')->group(function (Router $router) {
        $router->get('get-countries', 'IptvCountriesController@getCountries')->name('get_countries');
    });

    Route::prefix('iptv-channels')->as('iptv_channels.')->group(function (Router $router) {
        $router->get('get-list', 'IptvChannelsController@getList')->name('get_list');
        $router->get('get-detail', 'IptvChannelsController@getDetail')->name('get_detail');
    });

    Route::prefix('galleries')->as('galleries.')->group(function (Router $router) {
        $router->get('get-list', 'GalleryController@getList')->name('getList');
    });

    Route::prefix('media')->as('media.')->group(function (Router $router) {
        $router->get('get-list', [MediaController::class, 'getList'])->name('getList');
    });

    Route::prefix('user')->as('user.')->group(function (Router $router) {
        // $router->get('check-in', 'UserController@checkIn')->name('checkIn');
        $router->post('check-out', 'UserController@checkOut')->name('checkOut');
    });

    Route::prefix('fias')->as('fias.')->group(function (Router $router) {
        $router->post('resync', [FiasController::class, 'resync']);
        $router->post('guest-in', [FiasController::class, 'guestIn']);
        $router->post('guest-out', [FiasController::class, 'guestOut']);
        $router->post('guest-check', [FiasController::class, 'guestCheck']);
    });
});
