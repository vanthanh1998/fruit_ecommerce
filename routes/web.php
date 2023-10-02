<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('shop-detail',[HomeController::class, 'index'])->name('home.detail');

Route::group(['prefix'=>'admin'],function(){
    Route::controller(AuthController::class)->group(function () {
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerSave')->name('register.save');

        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAction')->name('login.action');

        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });
});

Route::middleware('auth')->group(function () {
    Route::group(['prefix'=>'admin'],function(){
        Route::get('dashboard', function () {
            return view('admin/dashboard');
        })->name('dashboard');

        Route::controller(CategoryController::class)->prefix('categories')->group(function () {
            Route::get('', 'index')->name('categories');
            Route::get('create', 'create')->name('categories.create');
            Route::post('store', 'store')->name('categories.store');
            Route::get('show/{id}', 'show')->name('categories.show');
            Route::get('edit/{id}', 'edit')->name('categories.edit');
            Route::put('edit/{id}', 'update')->name('categories.update');
            Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');
        });

        Route::controller(ProductController::class)->prefix('products')->group(function () {
            Route::get('', 'index')->name('products');
            Route::get('create', 'create')->name('products.create');
            Route::post('store', 'store')->name('products.store');
            Route::get('show/{id}', 'show')->name('products.show');
            Route::get('edit/{id}', 'edit')->name('products.edit');
            Route::put('edit/{id}', 'update')->name('products.update');
            Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
        });

        Route::get('admin/profile', [AuthController::class, 'profile'])->name('profile');
    });
});
