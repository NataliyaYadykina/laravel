<?php

namespace App\Observers;

use App\Models\NewsHw9;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsHw9Observer
{
    /**
     * Handle the NewsHw9 "saving" event.
     */
    public function saving(NewsHw9 $newsHw9): void
    {
        $newsHw9->slug = Str::slug($newsHw9->title);
        Log::info('Saving news ' . $newsHw9);
    }
}
