<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestRedirectController extends Controller
{
    public function __invoke()
    {
        // Redirect to Google's homepage
        // return redirect()->away('https://google.com');

        // Redirect to an action
        // return redirect()->action([LibraryUserController::class, 'showLibUsers'], ['id' => 0]);

        // Redirect to a route
        return redirect()->route('books');
    }
}
