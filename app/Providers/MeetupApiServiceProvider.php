<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MeetupApi;

class MeetupApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\MeetupApi', function () {
            return new MeetupApi([
                'key'     => config('services.meetup.key'),
                'urlName' => config('services.meetup.urlName'),
            ]);
        });
    }
}