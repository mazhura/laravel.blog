<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {return view('welcome');})->name('welcome');


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [MainController::class, 'index'])->name('admin.index');

    Route::resource('/categories', CategoryController::class);

    Route::resource('/tags', TagsController::class);

    Route::resource('/posts', PostController::class);

});

Route::get('/test',[TestController::class,'index']);










//todo make API

