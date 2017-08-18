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
        if ($this->app->environment() == 'local') {
            $this->app->register(DebugbarServiceProvider::class);
        }

        if (config('app.force_https')) {
            $this->app['url']->forceScheme('https');
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

        view()->share('meetup__group', $group);
        view()->share('meetup__next_event', $next_event);
    }
}
