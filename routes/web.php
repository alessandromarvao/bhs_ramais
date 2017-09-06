<?php

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

Route::group(['prefix'=>'admin'], function(){
    Route::get('', function(){
        return view('admin.index');
    })->name('admin');
    Route::resource('sip', 'Admin\SIPController');
    Route::resource('iax', 'Admin\IAXController');
});

Route::group(['prefix'=>'ramais'], function(){
    Route::get('', function () {
        return view('welcome');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
