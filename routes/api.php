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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('delpic','Api\Auth\User\DelMePicController');
    Route::post('updatepic','Api\Auth\User\UpdateMePicController');
    Route::post('myfavorites','Api\Auth\User\MyFavoritesController');
    Route::post('myadresses','Api\Auth\User\MyAdressesController');
    Route::post('myphones','Api\Auth\User\MyPhonesController');
    Route::get('AuthUser','Api\Auth\CurrentUserController');
    Route::get('logout','Api\Auth\LogoutController');
});

Route::post('getProducts','GetProducts');

Route::post('register','Api\Auth\RegisterController');
Route::post('login','Api\Auth\LoginController');

Route::get('getAllProductsTitle','GetAllProductsTitle');
