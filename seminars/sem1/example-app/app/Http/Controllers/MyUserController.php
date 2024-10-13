<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyUserController extends Controller
{
    public function showMyUser()
    {
        $user = new \stdClass();
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->id = 1;

        // $json = json_encode($user);
        // $response = new Response($json);
        // $response->header('Content-Type', 'application/json');
        // return $response;
        return response()->json($user);
    }
}
