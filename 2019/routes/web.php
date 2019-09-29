<?php

use Illuminate\Support\Facades\Route;

Route::get('/optin/verify/{id}/{hash}', 'RegistrationWebhookController@verify')->name('sponsor.optin.verify');
Route::post(config('tito.webhook_url'), 'RegistrationWebhookController@handle');
Route::get('/code-of-conduct', 'CodeOfConductController')->name('code-of-conduct');
Route::get('/', 'HomeController')->name('index');
