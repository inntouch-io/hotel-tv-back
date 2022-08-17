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

            Route::prefix('version')->name('version.')->group(function (Router $router) {
                $router->get('show', 'VersionController@show')->name('show');
                $router->put('upgrade', 'VersionController@upgrade')->name('upgrade');
            });

            // Logout
            Route::prefix('auth')->as('auth.')->group(function (Router $router) {
                $router->match(['get', 'post'], '/logout', 'AuthController@logout')->name('logout');
            });

            // Profile
            Route::prefix('profile')->as('profile.')->group(function (Router $router) {
                $router->get('edit', 'ProfileController@edit')->name('edit');
                $router->put('update', 'ProfileController@update')->name('update');

                $router->get('edit-password', 'ProfileController@editPassword')->name('editPassword');
                $router->put('update-password', 'ProfileController@updatePassword')->name('updatePassword');
            });

            // Applications
            Route::resource('applications', 'ApplicationsController');

            // Rooms
            Route::resource('rooms', 'RoomController');

            // Modules
            Route::namespace('Modules')->prefix('modules')->as('modules.')->group(function () {

                Route::prefix('module')->as('module.')->group(function (Router $router) {
                    $router->get('/index', 'ModuleController@index')->name('index');
                    $router->get('/edit/{id}', 'ModuleController@edit')->name('edit');
                    $router->put('/update/{id}', 'ModuleController@update')->name('update');
                    $router->get('/sorting-list', 'ModuleController@sortingList')->name('sortingList');
                    $router->post('/sorting', 'ModuleController@sorting')->name('sorting');
                });

                Route::prefix('infos')->as('infos.')->group(function (Router $router) {
                    $router->get('/edit/{id}', 'ModuleInfoController@edit')->name('edit');
                    $router->put('/update/{id}', 'ModuleInfoController@update')->name('update');
                });

            });

            // Messages
            Route::namespace('Messages')->prefix('messages')->as('messages.')->group(function () {
                Route::resource('message', 'MessageController')->except('show');

                // Messages sorting
                Route::prefix('message')->as('message.')->group(function (Router $router) {
                    $router->get('/sorting-list', 'MessageController@sortingList')->name('sortingList');
                    $router->post('/sorting', 'MessageController@sorting')->name('sorting');
                });

                // Message Infos
                Route::resource('infos', 'MessageInfoController');

                // Message Cards
                Route::namespace('Cards')->prefix('cards')->as('cards.')->group(function () {
                    Route::resource('card', 'MessageCardController')->except('show');

                    // Message Cards sorting
                    Route::prefix('card')->as('card.')->group(function (Router $router) {
                        $router->get('/sorting-list', 'MessageCardController@sortingList')->name('sortingList');
                        $router->post('/sorting', 'MessageCardController@sorting')->name('sorting');
                    });

                    // Message Infos
                    Route::resource('infos', 'MessageCardInfoController');
                });
            });

            // Menus
            Route::namespace('Menus')->prefix('menus')->as('menus.')->group(function () {
                Route::resource('menu', 'MenuController')->except('show');

                // Menus sorting
                Route::prefix('menu')->as('menu.')->group(function (Router $router) {
                    $router->get('/types-list', 'MenuController@typesList')->name('typesList');
                    $router->get('/sorting-list', 'MenuController@sortingList')->name('sortingList');
                    $router->post('/sorting', 'MenuController@sorting')->name('sorting');
                });

                // Menu infos
                Route::resource('infos', 'MenuInfoController');

                // Menu Cards
                Route::namespace('Cards')->prefix('cards')->as('cards.')->group(function () {
                    Route::resource('card', 'MenuCardController')->except('show');

                    // MenuCards sorting
                    Route::prefix('card')->as('card.')->group(function (Router $router) {
                        $router->get('/sorting-list', 'MenuCardController@sortingList')->name('sortingList');
                        $router->post('/sorting', 'MenuCardController@sorting')->name('sorting');
                    });

                    // MenuCards infos
                    Route::resource('infos', 'MenuCardInfoController');
                });
            });

            // Iptv channels
            Route::namespace('Iptv')->prefix('iptv')->as('iptv.')->group(function () {
                Route::resource('channel', 'ChannelController')->except('show');

                // Iptv channels sorting
                Route::prefix('channel')->as('channel.')->group(function (Router $router) {
                    $router->get('/sorting-list', 'ChannelController@sortingList')->name('sortingList');
                    $router->post('/sorting', 'ChannelController@sorting')->name('sorting');
                });

                // Iptv channel infos
                Route::resource('infos', 'ChannelInfoController');
            });
        });
    });
});
