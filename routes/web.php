<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('api/v1/posts', 'PostController@index');
$router->post('api/v1/posts', 'PostController@store');
$router->get('api/v1/posts/{id}', 'PostController@show');
$router->put('api/v1/posts/{id}', 'PostController@update');
$router->delete('api/v1/posts/{id}', 'PostController@destroy');
