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



Route::get('/sobre', function () {
    return view('Sobre');
});

//aprenseta o formulario de cadastro
Route::get('/cadastrar', function () {
    return view('login/cadastrar');
});

//apresenta a view home
Route::get('/', 'LoginController@home')->name('home');

//mostra a tela de login
Route::get('/entrar', 'LoginController@index')->name('entrar');

//tratar o login - verificar
Route::post('/loginValidar', 'LoginController@loginValidar')->name('loginValidar');

//fazer o cadastro
Route::post('/loginEnviar', 'LoginController@loginEnviar')->name('loginEnviar');

//logaut
Route::get('/sair', 'LoginController@sair')->name('sair');

//podcast categorias
Route::get('/categorias', 'PodcastController@view')->name('categorias');

//perfil 
Route::get('edit/{user}', 'PerfilController@edit')->name('edit');
Route::post('update/{id}','PerfilController@update')->name('update');
