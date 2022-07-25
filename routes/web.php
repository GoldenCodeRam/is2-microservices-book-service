<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/book', 'BookController@index');
$router->get('/book/{id}', 'BookController@show');
$router->post('/book', 'BookController@store');
$router->put('/book/{id}', 'BookController@update');
$router->patch('/book/{id}', 'BookController@update');
$router->delete('/book/{id}', 'BookController@delete');