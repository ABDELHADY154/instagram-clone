<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('layouts.app');
    });
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/profile', 'UserController')->except(['index', 'edit', 'show', 'update']);
    Route::get('/profile', 'UserController@index')->name('profile');
    Route::get('/profile/edit', 'UserController@edit')->name('profile.edit');
    Route::put('/profile/update', 'UserController@update')->name('profile.update');
    Route::get('/profile/setting', 'UserController@setting')->name('profile.setting');
    Route::get('/profile/setting/disable', 'UserController@disable')->name('profile.disable');
    Route::put('/profile/setting/update-password', 'UserController@updatePassword')->name('profile.updatePassword');
});
