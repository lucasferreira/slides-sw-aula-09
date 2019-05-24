<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::post('/teste', 'HomeController@teste');
Route::get('/salvar', 'HomeController@salvar');
Route::get('/alterar/{id}', 'HomeController@alterar');
Route::get('/excluir/{id}', 'HomeController@excluir');
Route::get('/alunos', 'AlunosController@index');
