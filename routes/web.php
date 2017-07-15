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
    $router->get('/', 'JobsController@index')->name('jobs.index');
});

// ------------------------------------------------------------
// Blog Routes...
// ------------------------------------------------------------

$router->get('posts/category/{slug}', 'PostsController@category')->name('posts.category');
$router->resource('posts', 'PostsController');

// ------------------------------------------------------------
// Main Routes...
// ------------------------------------------------------------

$router->get('/home', 'HomeController@home')->name('home');
$router->get('/talks', 'TalksController@index')->name('talks');
$router->post('/contact', 'ContactController')->name('contact');
$router->get('/contribute', 'ContributeController')->name('contribute');
$router->get('/', 'HomeController@index')->name('index');
