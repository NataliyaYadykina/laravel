<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestTestController extends Controller
{
    //
    public function testRequest(Request $request)
    {
        $first_name = $request->input('first_name', 'No name');
        $last_name = $request->input('last_name', 'No name');

        echo $first_name . ' ' . $last_name;
    }
}
