<?php

/* @var \Illuminate\Routing\Router */
$router = app('router');

// ------------------------------------------------------------
// Authentication Routes...
// ------------------------------------------------------------

$router->auth();

// ------------------------------------------------------------
// Jobs Routes...
// ------------------------------------------------------------

$router->group(['prefix' => 'jobs'], function($router) {
    $router->get('/', 'JobsController@index')->name('jobs');
});

// ------------------------------------------------------------
// Main Routes...
// ------------------------------------------------------------

$router->get('/home', 'HomeController@home')->name('home');
$router->get('/', 'HomeController@index')->name('index');
