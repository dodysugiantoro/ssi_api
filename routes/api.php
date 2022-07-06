<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/login', '\App\Http\Controllers\Api\LoginController@index');
// Route::get('/logout', '\App\Http\Controllers\Api\LoginController@logout');

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    // Route::get('logout', 'logout');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);

    Route::post('/logout', '\App\Http\Controllers\Api\RegisterController@logout');
});
