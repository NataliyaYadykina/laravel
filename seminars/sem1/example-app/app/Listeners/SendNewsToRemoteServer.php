<?php

namespace App\Listeners;

use App\Events\NewsCreatedS9;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNewsToRemoteServer
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
    public function handle(NewsCreatedS9 $event): void
    {
        Log::info("Send news to remote server listener fired id " . $event->news->id);
    }
}
