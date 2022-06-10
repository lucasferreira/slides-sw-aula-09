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

// uma rota pode ser GET, POST, PUT ou DELETE
Route::get('/', 'HomeController@index');

// uma rota de exemplo POST para cadastrar algo no banco
Route::post('/create', 'HomeController@create')->name('home.create');

Route::get('/delete/{id}', 'HomeController@delete')->name('home.delete');

// rota genérica apenas para testar a emissão de uma view para o navegador
Route::get('/teste', function ()
{
	return view('teste'); // completar com .php
});
