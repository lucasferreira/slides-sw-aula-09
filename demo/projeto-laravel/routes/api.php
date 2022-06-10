<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/cursos', 'Api\CursosController@index');
Route::post('/cursos', 'Api\CursosController@store');
Route::get('/cursos/{id}', 'Api\CursosController@show');
Route::put('/cursos/{id}', 'Api\CursosController@update');
Route::delete('/cursos/{id}', 'Api\CursosController@destroy');

// também é possível resumir todas as rotas declaradas a cima com um método automático
// chamado de...
// Route::resource('cursos', 'Api\CursosController');
// assim não precisaríamos declarar uma roda de api por uma
