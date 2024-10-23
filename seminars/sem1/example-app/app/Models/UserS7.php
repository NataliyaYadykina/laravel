<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserS7 extends Model
{
    /** @use HasFactory<\Database\Factories\UserS7Factory> */
    use HasFactory;
    public $fillable = ["name", "surname", "email"];
}
