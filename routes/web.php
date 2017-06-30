<?php

/* @var \Illuminate\Routing\Router */
$router = app('router');

// ------------------------------------------------------------
// Authentication Routes...
// ------------------------------------------------------------

//$router->auth();

// ------------------------------------------------------------
// Jobs Routes...
// ------------------------------------------------------------

$router->group(['prefix' => 'jobs'], function($router) {
    $router->get('/', 'JobsController@index')->name('jobs.index');
});

// ------------------------------------------------------------
// Blog Routes...
// ------------------------------------------------------------

$router->group(['prefix' => 'blog'], function($router) {
    $router->get('/', 'BlogController@index')->name('blog.index');
});

// ------------------------------------------------------------
// Main Routes...
// ------------------------------------------------------------

$router->get('/home', 'HomeController@home')->name('home');
$router->get('/talks', 'HomeController@talks')->name('talks');
$router->post('/contact', 'ContactController')->name('contact');
$router->get('/', 'HomeController@index')->name('index');
