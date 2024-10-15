<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestCookieController extends Controller
{
    //
    public function testCookie(Request $request)
    {
        $sessionIdentify = $request->cookie('laravel_session');
        $session = $request->session();
        var_dump($session) . PHP_EOL;
        echo '||||| sessionIdentify: ' . $sessionIdentify . PHP_EOL;
        echo '||||| session_token: ' . $session->get('_token') . PHP_EOL;
    }
}
