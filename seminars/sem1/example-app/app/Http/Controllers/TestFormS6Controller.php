<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestFormS6Controller extends Controller
{
    public function displayForm()
    {
        return view('myform_s6');
    }

    public function postForm(Request $request)
    {
        // echo $request->input('name');
        // echo $request->input('password');
        // echo $request->input('age');
        // echo $request->input('gender');
        var_dump($request->input('hobbies'));
    }
}
