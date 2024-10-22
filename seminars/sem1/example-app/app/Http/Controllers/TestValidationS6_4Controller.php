<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TestValidationS6_4Controller extends Controller
{
    public function show()
    {
        return view('employee_validation_s6_4');
    }

    public function post(Request $request)
    {
        // try {
        //     $validated = $request->validate([
        //         'name' => ['required', 'string', 'max:255']
        //     ]);
        // } catch (ValidationException $e) {
        //     die($e->getMessage());
        // }

        $validated = $request->validate([
            // name
            'name' => ['required', 'string', 'max:255'],
            // password
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        var_dump($validated);
    }
}
