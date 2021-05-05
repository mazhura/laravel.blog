<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagsController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/article/{slug}', [HomeController::class,'show'])->name('home.show');
Route::get('/category/{slug}', [CategoryController::class,'show'])->name('categories.single');
Route::get('/tag/{slug}', [TagsController::class,'show'])->name('tag.single');

Route::group(['prefix' => 'admin','middleware'=>'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagsController::class);
    Route::resource('/posts', PostController::class);
});

Route::group(['middleware'=>'guest'],function (){
    Route::get('/register',[UserController::class,'create'])->name('register.create');
    Route::post('/register',[UserController::class,'store'])->name('register.store');
    Route::get('/login',[UserController::class,'loginCreate'])->name('login.create');
    Route::post('/login',[UserController::class,'login'])->name('login.store');
});

Route::get('/logout',[UserController::class,'logout'])->name('logout')->middleware('auth');

/*Route::fallback(function (){
    return redirect()->route('home.index');
});*/


