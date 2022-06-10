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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
})->name('login');

Route::post('/login', 'LoginController@postLogin' )->name('login.post');



Route::group(['middleware' => 'admin'], function () { 
    
        Route::get('/dashboard', 'HomeController@index' )->name('dashboard');

        Route::get('/user', 'UserController@index' )->name('user');
        Route::get('/user_list', 'UserController@list' )->name('user.list');
        Route::post('/user/store', 'UserController@store' )->name('user.store');
        Route::get('/file_image/{id?}', 'UserController@file_image' )->name('file_image');
        Route::get('/user/{id?}', 'UserController@user_edit' )->name('user');
        Route::post('/userdelete/{id}', 'UserController@delete' )->name('user.delete');

        Route::post('/logout', 'LoginController@logout' )->name('logout');

});











    
