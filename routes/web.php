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


Route::prefix('admin')->as('admin.')->group(function (Router $router) {
    $router->resource('modules', ModuleController::class)->except(['store', 'show', 'create', 'destroy']);
});
