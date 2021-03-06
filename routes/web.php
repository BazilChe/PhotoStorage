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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'AuthController@register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/login', 'LoginController@login');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::resource('users', 'UserController');
Route::resource('photos', 'PhotoController');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
