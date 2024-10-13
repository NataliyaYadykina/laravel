<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProcessorController extends Controller
{
    public function index()
    {
        return view('form_processor');
    }

    public function store(Request $request)
    {
        $user = new \stdClass();
        $user->last_name = "Doe";
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        // return response()->json($user);

        return view('welcome_user_hw2', ['user' => $user]);
    }
}
