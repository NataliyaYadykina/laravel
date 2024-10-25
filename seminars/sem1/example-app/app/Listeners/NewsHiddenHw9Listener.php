<?php

namespace App\Listeners;

use App\Events\NewsHiddenHw9;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NewsHiddenHw9Listener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewsHiddenHw9 $event): void
    {
        Log::info('News ' . $event->news->id . ' hidden');
    }
}
