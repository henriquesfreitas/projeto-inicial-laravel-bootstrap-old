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

Route::group(['prefix'=>'empresa', 'where'=>['id'=>'[0-9]+']], function()
{
    Route::get('', 'EmpresaController@index')->name('empresa');
    Route::get('create', 'EmpresaController@create');
    Route::post('store', 'EmpresaController@store');
    Route::get('{empresa}/edit', 'EmpresaController@edit');
    Route::get('{empresa}/destroy', 'EmpresaController@destroy');
    Route::put('{empresa}/update', 'EmpresaController@update');
});
