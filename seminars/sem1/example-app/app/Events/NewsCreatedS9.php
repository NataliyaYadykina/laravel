<?php

namespace App\Events;

use App\Models\News_s9;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewsCreatedS9
{
    use Dispatchable, SerializesModels;

    public News_s9 $news;

    /**
     * Create a new event instance.
     */
    public function __construct(News_s9 $news)
    {
        $this->news = $news;
        Log::info("News created event fired.");
    }
}
