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

Route::get('/', function(){
    return view('auth.login');
});

Route::get('/dashboard', 'AdminController@index');
Route::get('/manageUser', 'AdminController@manage');
Route::delete('/manageUser/{id}', 'AdminController@destroy');

Route::get('/event', 'PenyelenggaraController@index');
Route::get('/addEvent', 'PenyelenggaraController@create');
Route::post('/addEvent', 'PenyelenggaraController@store');
Route::get('/detailEvent/{id}', 'PenyelenggaraController@show');
Route::get('/editEvent/{id}', 'PenyelenggaraController@edit');
Route::patch('/editEvent/{id}', 'PenyelenggaraController@update');
Route::delete('/hapusEvent/{id}', 'PenyelenggaraController@destroy');

Route::get('/editProfile', 'UserController@edit');
Route::patch('/editProfile', 'UserController@update');
Route::get('/myEvent', 'UserController@myEvent');
Route::get('/detailMyEvent/{id}', 'UserController@detail');
Route::get('/allEvent', 'UserController@allEvent');
Route::get('/detailAllEvent/{id}', 'UserController@show');
Route::get('/Ikuti/{id}', 'UserController@Ikuti');

Auth::routes();

Route::get('/user', 'UserController@index')->name('user');
