<?php

use Illuminate\Support\Facades\Route;

Route::get('/code-of-conduct', 'CodeOfConductController')->name('code-of-conduct');
Route::get('/', 'HomeController')->name('index');
