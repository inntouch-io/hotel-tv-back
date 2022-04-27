<?php

use App\Http\Controllers\Admin\Module\ModuleController;
use App\Http\Controllers\Admin\Module\ModuleInfoController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});


//Route::prefix('admin')->group(function () {
//    Route::prefix('modules')->group(function (Router $router){
//        $router->get('/', [ModuleController::class, 'index'])->name('admin.modules.index');
//        $router->get('edit', [ModuleController::class, 'edit'])->name('admin.modules.edit');
//        $router->get('update', [ModuleController::class, 'update'])->name('admin.modules.update');
//
//        Route::prefix('infos')->group(function (Router $router) {
//            $router->get('edit', [ModuleInfoController::class, 'edit'])->name('admin.modules.info.edit');
//            $router->post('update', [ModuleInfoController::class, 'update'])->name('admin.modules.info.update');
//        });
//    });
//});


Route::prefix('admin')->as('admin.')->group(function (Router $router) {
    $router->resource('modules', ModuleController::class)->except(['create', 'store', 'show', 'destroy']);

    Route::prefix('modules')->as('modules.')->group(function (Router $router){
        $router->resource('infos', ModuleInfoController::class)->except(['index', 'create', 'store', 'show', 'destroy']);
    });
});
