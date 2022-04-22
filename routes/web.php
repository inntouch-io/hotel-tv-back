<?php

use App\Http\Controllers\Admin\Module\ModuleController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});


Route::prefix('admin')->group(function () {
    Route::prefix('modules')->group(function (Router $router) {
        $router->match(['get', 'post'], 'index', [ModuleController::class, 'index'])->name('admin.modules.index');
        $router->match(['get', 'post'], 'edit', [ModuleController::class, 'edit'])->name('admin.modules.edit');
    });
});
