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

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function() use ($router) {

$router->get('members', 'MembersController@getAll');

$router->get('member/{id:[0-9]+}', 'MembersController@getById', function ($id) {

});

$router->get('direction/{id:[0-9]+}', 'MembersController@getByDirection', function ($id) {

});

$router->get('status/{status}', 'MembersController@getByStatus', ['status' => '/^(ingame|out)$/']);

$router->put('points/create', 'MembersController@addPoints');

$router->post('members/{id}/update', 'MembersController@update');

});