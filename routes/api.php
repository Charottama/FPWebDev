<?php

use Illuminate\Http\Request;

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

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::resource('food', 'foodController');
Route::resource('recipe', 'RecipeController');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::resource('buy', 'TransactionController');
});

/*
User bisa view food, recipe, register

pas user klik buy, maka angular akan cek, apakah di localStorage ada jwt apa gak. 

Kalau gak, maka: lariin ke form login.
	Setelah user mengisi login -> submit => kirim email dan password ke laravel.
	Kalau bener, laravel kirim JWT. JWT disimpan ke localStorage.setItem("jwt", result.data.token)

Kalau ada, maka: user boleh buy => lariin ke form confirm transaction 
=> kalau ok, maka kirim data barang yang dibeli user ke laravel. Jangan lupa kirimkan JWT beserta dengan data Transaction
=> Laravel bakalan balikin json status success/failed.
Selebihnya atur sendiri


*/