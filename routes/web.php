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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','LinkController@index')->name('link');
Route::get('/home/{param}','LinkController@list')->name('list');
Route::post('/home','LinkController@store');
Route::post('/home/{param}','LinkController@store');