<?php

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

use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
// Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('actionlogin', 'actionlogin')->name('actionlogin');
    Route::get('/logout', 'actionlogout')->name('actionlogout')->middleware('auth');
});

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

//route resource
Route::resource('/products', \App\Http\Controllers\ProductController::class)->middleware('auth');

Route::get('product-export', [ProductController::class, 'export'])->name('product.export');

