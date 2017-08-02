<?php

namespace App\Providers;

use App\Meetup;
use Illuminate\Support\ServiceProvider;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->environment() == 'local') {
            $this->app->register(DebugbarServiceProvider::class);
        }

        $this->registerGlobalViewVariables();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function registerGlobalViewVariables()
    {
        $group = (new Meetup)->groupDetailsWithNextEvent();

        $next_event = $group->get('next_event');

        view()->share(compact('meetup__group', 'meetup__next_event'));
    }
}
