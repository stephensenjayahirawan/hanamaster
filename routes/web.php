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
Route::get('/','HomeController@index');
Route::group(['prefix'=>'admin','as'=>'admin'], function () {
    Route::get('/', ['as' => 'root', 'uses' => 'AdminController@index']);
    Route::get('/add', ['as' => 'add_admin', 'uses' => 'AdminController@addAdmin']);
    Route::get('/dashboard', ['as' => 'dashboard_admin', 'uses' => 'AdminController@dashboard']);
    Route::post('/login', ['as' => 'post_login', 'uses' => 'AdminController@login']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AdminController@logout']);
});