<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    // public function showUsers()
    // {
    //     $users = DB::connection('mysql')->table('users')->select(['first_name', 'last_name', 'email'])->get();
    //     print_r($users);
    // }

    // sem1
    public function showUsers()
    {
        // DB::connection('mysql')->table('users')->insert(['first_name' => 'Oleg', 'last_name' => 'Olegov', 'email' => 'olegov@gmail.com']);
        // DB::connection('mysql')->table('users')->insert(['first_name' => 'Igor', 'last_name' => 'Igorev', 'email' => 'igorev@gmail.com']);
        // DB::connection('mysql')->table('users')->insert(['first_name' => 'Nikolay', 'last_name' => 'Nikolaev', 'email' => 'nikolaev@gmail.com']);
        // DB::connection('mysql')->table('users')->insert(['first_name' => 'Fedor', 'last_name' => 'Fedorov', 'email' => 'fedorov@gmail.com']);
        $users = DB::connection('mysql')->table('users')->select(['first_name', 'email'])->get();
        return view('user', ['users' => $users]);
    }

    // sem2
    public function index()
    {
        return view('test');
    }

    public function store(Request $request)
    {
        $userData = ['User name' => $request->username, 'email' => $request->email];
        return response()->json($userData);
    }
}
