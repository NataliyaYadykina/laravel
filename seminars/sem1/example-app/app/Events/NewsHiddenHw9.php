<?php

namespace App\Events;

use App\Models\NewsHw9;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewsHiddenHw9
{
    use Dispatchable, SerializesModels;

    public NewsHw9 $news;

    /**
     * Create a new event instance.
     */
    public function __construct(NewsHw9 $news)
    {
        $this->news = $news;
        Log::info("News hidden event fired.");
    }
}
