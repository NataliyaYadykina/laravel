<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SimpleController extends Controller
{
    //
    public function test(Request $request)
    {
        // echo $request->param;
        // echo $request->param2;
        // echo $request->param3;
        $response = [
            'param1' => $request->param,
            'param2' => $request->param2
        ];

        // return new Response(json_encode($response));
        return response()->json($response);
    }
}
