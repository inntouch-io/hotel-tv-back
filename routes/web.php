<?php

use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\Module\ModuleController;
use App\Http\Controllers\Admin\Module\ModuleInfoController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
})->name('home');

Route::namespace('Admin')->group(function (){

    Route::prefix('admin')->as('admin.')->group(function (Router $router) {
        Route::prefix('auth')->name('auth.')->group(function (Router $router){
            //login actions
            $router->get('login', 'AuthController@showLoginForm')->name('showLoginForm');
            $router->post('login', 'AuthController@login')->name('login');

            //logout actions
            $router->get('/logout', 'AuthController@logout')->name('logout');
            $router->post('/logout', 'AuthController@logout')->name('logout');
        });
    });

    Route::middleware('auth:web')->prefix('admin')->as('admin.')->group(function (Router $router) {

        $router->resource('modules', 'Module\ModuleController')->except(['create', 'store', 'show', 'destroy']);

        Route::prefix('modules')->as('modules.')->group(function (Router $router) {
            $router->resource('infos', 'Module\ModuleInfoController')->except(['index', 'create', 'store', 'show', 'destroy']);
        });

        $router->resource('applications', ApplicationController::class)->except(['create', 'store', 'show', 'destroy']);
    });

});



