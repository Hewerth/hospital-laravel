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
    return view('index');
});

Route::get('pacientes/menores', 'PacienteController@listMenores');
Route::get('pacientes/jovenes', 'PacienteController@listJovenes');
Route::get('pacientes/ancianos', 'PacienteController@listAncianos');
Route::get('pacientes/riesgo', 'PacienteController@mayorRiesgo')->name('paciente.riesgo');
Route::get('pacientes/fumadores', 'PacienteController@fumadores')->name('paciente.fumador');
Route::get('pacientes/anciano', 'PacienteController@masAnciano')->name('paciente.anciano');
Route::resource('pacientes','PacienteController');

Route::get('consultas/pediatria', 'ConsultaController@pediatria');
Route::get('consultas/urgencia', 'ConsultaController@urgencia');
Route::get('consultas/cgi', 'ConsultaController@cgi');
Route::resource('consultas','ConsultaController');







