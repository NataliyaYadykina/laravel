<?php

namespace App\Listeners;

use App\Events\NewsCreatedS9;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNewsCreatedS9Notification
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
    public function handle(NewsCreatedS9 $event)
    {
        Log::info("Send news created notification listener fired id " . $event->news->id);
        // Остановим цепочку листенеров
        // return false;
    }
}
