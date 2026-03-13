<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void { /* ... */ }

    public function boot(): void
    {
        Event::listen(SocialiteWasCalled::class, [
            \SocialiteProviders\Spotify\SpotifyExtendSocialite::class, 'handle'
        ]);

        Event::listen(SocialiteWasCalled::class, [
            \SocialiteProviders\Twitch\TwitchExtendSocialite::class, 'handle'
        ]);
    }
}