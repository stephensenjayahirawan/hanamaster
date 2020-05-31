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
    Route::group(['prefix'=>'/job_vacancy','as'=>'admin/job_vacancy'], function () {
        Route::get('/', ['as' => 'job_vacancy', 'uses' => 'JobsController@index']);
        Route::get('/add', ['as' => 'job_vacancy_add', 'uses' => 'JobsController@create']);
        Route::post('/store', ['as' => 'job_vacancy_store', 'uses' => 'JobsController@store']);
        Route::get('/show/{id}', ['as' => 'job_vacancy_show', 'uses' => 'JobsController@show']);
        Route::get('/delete/{id}', ['as' => 'job_vacancy_delete', 'uses' => 'JobsController@destroy']);
        Route::get('/edit/{id}', ['as' => 'job_vacancy_edit', 'uses' => 'JobsController@edit']);
        Route::post('/post_edit', ['as' => 'job_vacancy_post_edit', 'uses' => 'JobsController@postEdit']);
    });
});

Route::get('/send-email-html','HomeController@send_email');
Route::post('/apply-job','HomeController@apply');
Route::get('my-captcha', 'HomeController@myCaptcha')->name('myCaptcha');
Route::post('my-captcha', 'HomeController@myCaptchaPost')->name('myCaptcha.post');
Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');