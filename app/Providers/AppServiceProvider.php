<?php

namespace App\Providers;

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
        $this->loadDevelopmentServiceProviders();

        $this->loadPublicConfigItems();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Load the service providers that should only be available in development environment.
     *
     * @return void
     */
    protected function loadDevelopmentServiceProviders()
    {
        if (app()->environment('local')) {
            app()->register(DebugbarServiceProvider::class);
        }
    }

    /**
     * Load the configuration items to make available to JavaScript.
     *
     * @return void
     */
    protected function loadPublicConfigItems()
    {
        $appConfigKeys = [
            'name', 'url', 'twitter', 'welcome_message', 'jumbo_videos', 'cfp_link'
        ];

        view()->share('lnConfig', json_encode([
            'app' => array_only(config('app'), $appConfigKeys)
        ]));
    }
}
