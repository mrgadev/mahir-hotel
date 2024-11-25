<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RoomReview;
use App\Policies\RoomReviewPolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::policy(User::class, RoomReviewPolicy::class);
    }
}
