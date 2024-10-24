<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHW8 extends Model
{
    // Указываем название таблицы в базе данных
    protected $table = 'logs_table_hw8';
    use HasFactory;
    public $timestamps = false;
}
