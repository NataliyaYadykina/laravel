<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UsersController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('view-any', User::class);
        // Gate::authorize('view-users');
        return User::all();
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return $user;
    }
}
