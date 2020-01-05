<?php

$router->get('/', function () use ($router) {
    return "Welcome to Wardrobe API!";
});

$router->group(['prefix' => "users"], function () use ($router) {
    $router->get('', 'UserController@getAll');
    $router->get('{id}', 'UserController@getById');
    $router->post('', 'UserController@insert');
    $router->put('{id}', 'UserController@update');
    $router->delete('', 'UserController@deleteAll');
    $router->delete('{id}', 'UserController@deleteById');
});

$router->group(["prefix" => "clothes"], function () use ($router) {
    $router->get('', 'ClotheController@getAll');
    $router->get('{id}', 'ClotheController@getById');
    $router->post('', 'ClotheController@insert');
    $router->put('{id}', 'ClotheController@update');
    $router->delete('', 'ClotheController@deleteAll');
    $router->delete('{id}', 'ClotheController@deleteById');
});

$router->group(["prefix" => "sizes"], function () use ($router) {
    $router->get('', 'SizeController@getAll');
    $router->get('{id}', 'SizeController@getById');
});

$router->group(["prefix" => "categories"], function () use ($router) {
    $router->get('', 'CategoryController@getAll');
    $router->get('{id}', 'CategoryController@getById');
});