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

$router->get('/key', function() {
    return str_random(32);
});

$router->get('/patients', ['uses' => 'PatientsController@index']);
$router->post('/patients', ['uses' => 'PatientsController@createUser']);
$router->post('/somatometria',['uses' => 'SomatometriaController@createSomatometria']);
$router->get('/somatometria', ['uses' => 'SomatometriaController@index']);