<?php

namespace App\Observers;

use App\Models\News_s9;
use Illuminate\Support\Facades\Log;

class NewsS9Observer
{
    public function updating(News_s9 $news)
    {
        Log::info('Updating news' . $news);
    }
}
