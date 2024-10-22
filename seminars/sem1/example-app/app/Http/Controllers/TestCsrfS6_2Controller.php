<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestCsrfS6_2Controller extends Controller
{
    public function show()
    {
        return view('test_csrf_s6_3');
    }

    public function post(Request $request)
    {
        echo $request->input('test_name');
    }
}
