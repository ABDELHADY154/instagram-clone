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
// ******Facebook Login*******//
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login-facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback')->name('facebook-callback');


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
    Route::get('/profile/{id}', 'UserController@profileView')->name('profile.view');
    Route::get('/search', 'HomeController@search')->name('search');
    Route::resource('/post', 'PostController')->except(['index', 'edit', 'update', 'destroy']);

    // *********Follow************//
    Route::get('/follow/{id}', 'FollowController@follow')->name('follow-user');
    Route::get('/unfollow/{id}', 'FollowController@unfollow')->name('unfollow-user');
    Route::get('/followers', 'FollowController@profileFollowers')->name('profile-followers');
    Route::get('/following', 'FollowController@profileFollowing')->name('profile-following');
    Route::get('/followers/{id}', 'FollowController@followersList')->name('followers-list');
    Route::get('/following/{id}', 'FollowController@followingList')->name('following-list');

    // *********SAVE POST************//
    Route::get('/save/{id}', 'SavePostController@savePost')->name('save-post');
    Route::get('/unSave/{id}', 'SavePostController@unSavePost')->name('unSave-post');


    // *********LIKE************//
    Route::get('like/{id}', 'LikeController@like')->name('like');
    Route::get('unlike/{id}', 'LikeController@unlike')->name('unlike');

    // *********Comment************//
    Route::post('/comment/{id}', 'CommentController@comment')->name('comment');
});
