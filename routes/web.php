<?php

//use App\Http\Controllers\Admin\Modules\ModuleController;
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
//                $router->controller(ModuleController::class)->group(function (Router $router) {
//                    $router->match(['get', 'post'], 'edit/{id}', 'edit')
//                        ->where('id', '[0-9]+')
//                        ->name('module.edit');
//                });


                $router->get('/index', 'ModuleController@index')->name('index');
                $router->get('/edit/{id}', 'ModuleController@edit')->name('edit');
                $router->put('/update/{id}', 'ModuleController@update')->name('update');
            });

            Route::prefix('infos')->as('infos.')->group(function (Router $router) {
                $router->get('/edit/{id}', 'ModuleInfoController@edit')->name('edit');
                $router->put('/update/{id}', 'ModuleInfoController@update')->name('update');
            });

        });

//        $router->resource('applications', ApplicationController::class)->except(['create', 'store', 'show', 'destroy']);
    });

});



