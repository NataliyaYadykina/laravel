<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    // public function index()
    // {
    //     echo "Hello, world!";
    // }

    // Если в классе один метод, его можноописать как __invoke и в роут его не указывать
    public function __invoke()
    {
        echo "Hello, world!";
    }
}
