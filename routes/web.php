<?php

/* @var \Illuminate\Routing\Router */
$router = app('router');

// ------------------------------------------------------------
// Authentication Routes...
// ------------------------------------------------------------

$router->auth();

// ------------------------------------------------------------
// Main Routes...
// ------------------------------------------------------------

$router->get('/home', 'HomeController@home')->name('home');
$router->get('/', 'HomeController@index')->name('index');
