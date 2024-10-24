<?php

namespace App\Providers;

use App\Services\SmsSenderS8Interface;
use App\Services\SmsSenderS8Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SmsSenderS8Interface::class, function () {
            return new SmsSenderS8Service('7054606026', 'njkamkajjnaj'); // Replace with your own implementation of SmsSenderS8Interface.
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
