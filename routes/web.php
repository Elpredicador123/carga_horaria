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
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('bienvenido');
Route::resource('/declaracionjuradas', 'DeclaracionjuradaController')->names('declaracionjurada');
Route::get('/declaracionjuradas/descargar/{id}', 'DeclaracionjuradaController@descarga')->name('declaracionjurada.descarga');
Route::get('/listardeclaracionevaluar', 'DeclaracionjuradaController@listardeclaracionevaluar')->name('declaracionjurada.listardeclaracionevaluar');
Route::get('/editdeclaracionevaluar/{id}', 'DeclaracionjuradaController@editdeclaracionevaluar')->name('declaracionjurada.editdeclaracionevaluar');
Route::put('/updatedeclaracionevaluar/{id}', 'DeclaracionjuradaController@updatedeclaracionevaluar')->name('declaracionjurada.updatedeclaracionevaluar');
Route::resource('/cargalectivas', 'CargalectivaController')->names('cargalectiva');
Route::get('/cargalectivascrear/{id}', 'CargalectivaController@create')->name('cargalectiva.create');
Route::get('/cargalectivaslistar', 'CargalectivaController@cargalectivaslistar')->name('cargalectiva.cargalectivaslistar');
Route::get('/cargalectivasllenar/{id}', 'CargalectivaController@cargalectivasllenar')->name('cargalectiva.cargalectivasllenar');
Route::post('/storedetallecarga', 'CargalectivaController@storedetallecarga')->name('cargalectiva.storedetallecarga');
Route::post('/updatecargalectivaasignacion/{id}', 'CargalectivaController@updatecargalectivaasignacion')->name('cargalectiva.updatecargalectivaasignacion');
Route::post('/updatecargalectivaterminado/{id}', 'CargalectivaController@updatecargalectivaterminado')->name('cargalectiva.updatecargalectivaterminado');
Route::post('/updatedetallecargahorariaterminado/{id}', 'CargalectivaController@updatedetallecargahorariaterminado')->name('cargalectiva.updatedetallecargahorariaterminado');
Route::delete('/destroydetallecarga/{id}', 'CargalectivaController@destroydetallecarga')->name('cargalectiva.destroydetallecarga');
Route::delete('/destroydetallecargahoraria/{id}', 'CargalectivaController@destroydetallecargahoraria')->name('cargalectiva.destroydetallecargahoraria');
Route::get('/cargahoraria/{id}', 'CargalectivaController@cargahoraria')->name('cargalectiva.cargahoraria');
Route::post('/storedetallecargahoraria/{id}', 'CargalectivaController@storedetallecargahoraria')->name('cargalectiva.storedetallecargahoraria');
Route::get('/horas_detallecarga/{id}/{tipo}', 'CargalectivaController@horas_detallecarga');
Route::get('/horas_completas/{id}/{cantidad}/{tipo}/{detalle_id}/{tipo_hora}', 'CargalectivaController@horas_completas');
Route::get('/imprimirCarga/{id}', 'CargalectivaController@imprimirCarga')->name('cargalectiva.imprimirCarga');
Route::get('/imprimirHorario/{id}', 'CargalectivaController@imprimirHorario')->name('cargalectiva.imprimirHorario');
Route::get('/declaracionjuradasplantilla', 'DeclaracionjuradaController@plantilla')->name('declaracionjurada.plantilla');
Route::get('/horasocupdas/{id}/{dia}', 'CargalectivaController@horasocupdas');


Route::resource('/usuarios', 'UserController')->names('usuarios');
Route::get('/crearusuario/{tipo}', 'UserController@create')->name('usuarios.create');
Route::post('/registrarusuario/{tipo}', 'UserController@store')->name('usuarios.store');
Route::get('/editarusuario/{id}/{tipo}', 'UserController@edit')->name('usuarios.edit');
Route::put('/updateusuario/{id}/{tipo}', 'UserController@update')->name('usuarios.update');