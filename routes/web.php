<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->group(function () {

    Route::prefix('admin')->as('admin.')->group(function () {
        Route::prefix('auth')->name('auth.')->group(function (Router $router) {
            // Login actions
            $router->get('login', 'AuthController@showLoginForm')->name('showLoginForm');
            $router->post('login', 'AuthController@login')->name('login');
        });
    });

    Route::middleware('auth:web')->group(function (Router $router) {
        // Home page
        $router->get('/', fn() => view('layouts.main'))->name('home');

        Route::prefix('admin')->as('admin.')->group(function () {
            // Logout
            Route::prefix('auth')->name('auth.')->group(function (Router $router) {
                $router->match(['get', 'post'], '/logout', 'AuthController@logout')->name('logout');
            });

            Route::prefix('profile')->name('profile.')->group(function (Router $router) {
                $router->get('edit', 'ProfileController@edit')->name('edit');
                $router->put('update', 'ProfileController@update')->name('update');

                $router->get('edit-password', 'ProfileController@editPassword')->name('editPassword');
                $router->put('update-password', 'ProfileController@updatePassword')->name('updatePassword');
            });

            // Modules
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

            // Applications
            Route::prefix('applications')->as('applications.')->group(function (Router $router) {
                $router->get('index', 'ApplicationsController@index')->name('index');
                $router->get('edit/{application}', 'ApplicationsController@edit')->name('edit');
                $router->put('update/{application}', 'ApplicationsController@update')->name('update');
            });

            // Messages
            Route::namespace('Messages')->prefix('messages')->as('messages.')->group(function () {

                Route::prefix('message')->as('message.')->group(function (Router $router) {
                    $router->get('/index', 'MessageController@index')->name('index');
                    $router->get('/create', 'MessageController@create')->name('create');
                    $router->post('/store', 'MessageController@store')->name('store');
                    $router->get('/edit/{id}', 'MessageController@edit')->name('edit');
                    $router->put('/update/{id}', 'MessageController@update')->name('update');
                    $router->get('/destroy/{id}', 'MessageController@destroy')->name('destroy');

                    Route::prefix('cards')->as('cards.')->group(function (Router $router) {
                        $router->get('/index/{id}', 'MessageCardController@index')->name('index');
                    });
                });

                Route::prefix('infos')->as('infos.')->group(function (Router $router) {
                    $router->get('/create/{id}', 'MessageInfoController@create')->name('create');
                    $router->post('/store/{id}', 'MessageInfoController@store')->name('store');
                    $router->get('/edit/{id}', 'MessageInfoController@edit')->name('edit');
                    $router->put('/update/{id}', 'MessageInfoController@update')->name('update');
                    $router->get('/destroy/{id}', 'MessageInfoController@destroy')->name('destroy');
                });
            });
        });
    });

});
