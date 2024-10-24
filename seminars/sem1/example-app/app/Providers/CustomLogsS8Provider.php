<?php

namespace App\Providers;

use App\Services\CustomLogDbServiceS8;
use App\Services\CustomLogServiceS8Interface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class CustomLogsS8Provider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(CustomLogServiceS8Interface::class, function () {
            return new CustomLogDbServiceS8(DB::table('logs')); // Replace with your own implementation of CustomLogServiceS8Interface.
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
