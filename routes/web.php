<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
})->name('home');

Route::namespace('Admin')->group(function () {

    Route::prefix('admin')->as('admin.')->group(function (Router $router) {
        Route::prefix('auth')->name('auth.')->group(function (Router $router) {
            // login actions
            $router->get('login', 'AuthController@showLoginForm')->name('showLoginForm');
            $router->post('login', 'AuthController@login')->name('login');

            // logout actions
            $router->get('/logout', 'AuthController@logout')->name('logout');
            $router->post('/logout', 'AuthController@logout')->name('logout');
        });
    });

    Route::middleware('auth:web')->prefix('admin')->as('admin.')->group(function () {

        Route::namespace('Modules')->prefix('modules')->as('modules.')->group(function () {

            Route::prefix('module')->as('module.')->group(function (Router $router) {
                $router->get('/index', 'ModuleController@index')->name('index');
                $router->get('/edit/{id}', 'ModuleController@edit')->name('edit');
                $router->put('/update/{id}', 'ModuleController@update')->name('update');
            });

            Route::prefix('infos')->as('infos.')->group(function (Router $router) {
                $router->get('/edit/{id}', 'ModuleInfoController@edit')->name('edit');
                $router->put('/update/{id}', 'ModuleInfoController@update')->name('update');
            });

        });

        Route::prefix('applications')->as('applications.')->group(function (Router $router) {
            $router->get('index', 'ApplicationController@index')->name('index');
            $router->get('edit/{application}', 'ApplicationController@edit')->name('edit');
            $router->put('update/{application}', 'ApplicationController@update')->name('update');
        });
    });

});



