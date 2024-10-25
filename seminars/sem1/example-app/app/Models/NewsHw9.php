<?php

namespace App\Models;

use App\Observers\NewsHw9Observer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsHw9 extends Model
{
    protected $table = 'news_table_hw9';
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // Регистрируем Observer вручную
        static::observe(NewsHw9Observer::class);
    }
}
