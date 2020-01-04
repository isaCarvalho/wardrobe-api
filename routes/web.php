<?php

$router->get('/', function () use ($router) {
    return "Welcome to Wardrobe API!";
});

$router->group(['prefix' => "/api/users"], function () use ($router) {
    $router->get('', 'UserController@getAll');
    $router->get('{id}', 'UserController@getById');
    $router->post('', 'UserController@insert');
    $router->put('{id}', 'UserController@update');
    $router->delete('', 'UserController@deleteAll');
    $router->delete('{id}', 'UserController@deleteById');
});

$router->group(["prefix" => "/api/roupas"], function () use ($router) {
    $router->get('', 'RoupaController@getAll');
    $router->get('{id}', 'RoupaController@getById');
    $router->post('', 'RoupaController@insert');
    $router->put('{id}', 'RoupaController@update');
    $router->delete('', 'RoupaController@deleteAll');
    $router->delete('{id}', 'RoupaController@deleteById');
});