<?php

namespace App\Providers;

use Facades\App\Meetup;
use App\Services\MeetupDotCom;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMeetupCommunityDetails();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\\Services\\MeetupDotCom', function () {
            return new MeetupDotCom([
                'key' => config('services.meetup.key'),
                'urlName' => config('services.meetup.urlName'),
            ]);
        });
    }

    /**
     * Loads some global view variables.
     *
     * @return void
     */
    protected function loadMeetupCommunityDetails()
    {
        try {
            view()->share(
                'meetup__next_event',
                Meetup::groupDetailsWithNextEvent()->get('next_event')
            );
        } catch (\Exception $e) {
            // Possibly a database connection error happened
        }
    }
}
