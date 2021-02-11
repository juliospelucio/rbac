<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UserController;

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

//Generate a 32 characters long key for application
$router->get('/key', function () {
    return \Illuminate\Support\Str::random(32);
});


$router->group(['prefix' => 'users/'], function ($router) {
    $router->get('/', 'UserController@list');
    $router->post('/', 'UserController@create');
    $router->get('/{id}', 'UserController@show');
    $router->post('/{id}', 'UserController@edit');
    $router->delete('/{id}', 'UserController@delete');
    $router->get('/{user_id}/role', 'UserController@role');
});

$router->group(['prefix' => 'roles'], function ($router) {
    $router->get('/', 'RoleController@list');
    $router->post('/', 'RoleController@create');
    $router->get('/{id}', 'RoleController@show');
    $router->post('/{id}', 'RoleController@edit');
    $router->delete('/{id}', 'RoleController@delete');
    $router->get('/{role_id}/users', 'RoleController@users');
    $router->get('/{role_id}/group', 'RoleController@group');
});

$router->group(['prefix' => 'groups/'], function ($router) {
    $router->get('/', 'GroupController@list');
    $router->post('/', 'GroupController@create');
    $router->get('/{id}', 'GroupController@show');
    $router->post('/{id}', 'GroupController@edit');
    $router->delete('/{id}', 'GroupController@delete');
    $router->get('/{group_id}/users', 'GroupController@users');
    $router->get('/{group_id}/roles', 'GroupController@roles');
});



$router->get('/', function () use ($router) {
    return [
        'version' => $router->app->version(),
        'About' => 'GAC - Role based access API'
    ];
});

$router->get('/app', function () use ($router) {
    return env('APP_NAME');
});
