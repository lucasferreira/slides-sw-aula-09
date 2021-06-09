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
Route::get('/teste/{id}', 'HomeController@teste');

// para web
Route::get('/cursos', 'CursosController@index');
Route::get('/cursos/create', 'CursosController@create');
Route::post('/cursos/create', 'CursosController@store');
Route::get('/cursos/edit/{id}', 'CursosController@edit');
Route::post('/cursos/edit/{id}', 'CursosController@update');
Route::get('/cursos/destroy/{id}', 'CursosController@destroy');


// O método estático `Route::group` serve para "agrupar"
// um cojunto de rotas sobre uma "árvore" em comum,
// ex: /api/cursos
Route::group(array('prefix' => 'api'), function () {

  Route::resource('cursos', 'Api\CursosController');
  Route::resource('alunos', 'Api\AlunosController');

});
