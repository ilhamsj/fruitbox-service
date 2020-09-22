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

use App\Admin;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'v1', 'namespace' => 'V1'], function () use ($router) {        
        $router->group(['prefix' => 'users'], function ($router) {
            $router->get('/', 'UserController@index');
        });

        $router->group(['prefix' => 'auth'], function ($router) {
            $router->post('/register', 'AuthController@Register');
            $router->post('/login', 'AuthController@Login');
        });

        $router->group(['prefix' => 'posts'], function ($router) {
            $router->get('/', 'PostController@index');
            $router->post('/', 'PostController@store');
            $router->get('/{id}', 'PostController@show');
            $router->put('/{id}', 'PostController@update');
            $router->delete('/{id}', 'PostController@destroy');
        });

        $router->group(['prefix' => 'products'], function ($router) {
            $router->get('/', 'ProductController@index');
            $router->post('/', 'ProductController@store');
            $router->get('/{id}', 'ProductController@show');
            $router->put('/{id}', 'ProductController@update');
            $router->delete('/{id}', 'ProductController@destroy');
        });

        $router->group(['prefix' => 'categories'], function ($router) {
            $router->get('/', 'CategoryController@index');
            $router->post('/', 'CategoryController@store');
            $router->get('/{id}', 'CategoryController@show');
            $router->put('/{id}', 'CategoryController@update');
            $router->delete('/{id}', 'CategoryController@destroy');    
        });
        
        $router->group(['prefix' => 'brands'], function ($router) {
            $router->get('/', 'BrandController@index');
            $router->post('/', 'BrandController@store');
            $router->get('/{id}', 'BrandController@show');
            $router->put('/{id}', 'BrandController@update');
            $router->delete('/{id}', 'BrandController@destroy');
        });
        
        $router->group(['prefix' => 'order'], function ($router) {
            $router->get('/', 'OrderController@index');
            $router->post('/', 'OrderController@store');
            $router->get('/{id}', 'OrderController@show');
            $router->put('/{id}', 'OrderController@update');
            $router->delete('/{id}', 'OrderController@destroy');
        });

        
        $router->group(['prefix' => 'backyard'], function ($router) {
            $router->group(['prefix' => 'auth'], function ($router) {
                $router->post('/login', 'AdminAuthController@authenticate');
                $router->post('/register', 'AdminAuthController@register');
            });

            $router->group(['middleware' => 'jwt.auth'], function ($router) {
                $router->get('/', function () {
                    return response()->json(Admin::all());
                });
            });
        });

    });
});
