<?php

use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\Module\ModuleController;
use App\Http\Controllers\Admin\Module\ModuleInfoController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::prefix('admin')->as('admin.')->group(function (Router $router) {
    $router->resource('modules', ModuleController::class)->except(['create', 'store', 'show', 'destroy']);

    Route::prefix('modules')->as('modules.')->group(function (Router $router){
        $router->resource('infos', ModuleInfoController::class)->except(['index', 'create', 'store', 'show', 'destroy']);
    });

    $router->resource('applications', ApplicationController::class)->except(['create', 'store', 'show', 'destroy']);
});


