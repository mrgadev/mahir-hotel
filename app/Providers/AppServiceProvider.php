<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Date locale
        Carbon::setLocale(app()->getLocale());
        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('google-one-tap', \SocialiteProviders\GoogleOneTap\Provider::class);
        });
    }
}
