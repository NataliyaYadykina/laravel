<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestHeaderController extends Controller
{
    //
    public function getHeader(Request $request)
    {
        $userAgent = $request->header('User-Agent');

        echo $userAgent . PHP_EOL;

        if ($request->hasHeader('My-Header')) {
            echo $request->header('My-Header');
        } else {
            echo "My-Header header not found";
        }
    }
}
