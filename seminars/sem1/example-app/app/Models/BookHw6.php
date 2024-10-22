<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHw6 extends Model
{
    /** @use HasFactory<\Database\Factories\BookHw6Factory> */
    use HasFactory;
    public $fillable = ["title", "author", "genre"];
}
