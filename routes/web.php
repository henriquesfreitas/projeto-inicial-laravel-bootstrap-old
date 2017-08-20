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

Route::group(['prefix'=>'pessoa-juridica', 'where'=>['id'=>'[0-9]+']], function()
{
    Route::get('', 'PessoaJuridicaController@index')->name('pessoa-juridica');
    Route::get('create', 'PessoaJuridicaController@create');
    Route::post('store', 'PessoaJuridicaController@store');
    Route::get('{pessoaJuridica}/edit', 'PessoaJuridicaController@edit');
    Route::get('{pessoaJuridica}/destroy', 'PessoaJuridicaController@destroy');
    Route::put('{pessoaJuridica}/update', 'PessoaJuridicaController@update');
    Route::get('get-cidades/{idEstado}', 'PessoaJuridicaController@getCidades');
});
