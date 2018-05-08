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
    return view('auth.login');
});

    //

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::resource('container', 'ContainerController');
Route::resource('location', 'LocationController');
Route::resource('material', 'MaterialController');
Route::resource('region', 'RegionController');
Route::resource('vehicle', 'VehicleController');
Route::get('user/delete/{id}', 'UserController@destroy');
// Backup routes
Route::get('backup', 'BackupController@index')->name('backup');
Route::get('backup/create', 'BackupController@create')->name('bcreate');
Route::get('backup/download/{file_name}', 'BackupController@download');
Route::get('backup/delete/{file_name}', 'BackupController@delete');
