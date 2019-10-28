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
Route::get('/sensor', 'HomeController@sensor')->name('sensor');
Route::get('/log', 'HomeController@log')->name('log');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

// Route::post('/fuelMonitoring', 'fuelMonitoringController@store')->name('fuelMonitoring');
Route::post('/status_log', 'fuelMonitoringController@updateStatusStatic')->name('status_log');
Route::post('/fillLevel_log', 'fuelMonitoringController@updateFillevelStatic')->name('fillLevel_log');
Route::post('/create', 'fuelMonitoringController@store')->name('create');

// Route::get('/show', 'fuelMonitoringController@show');
