<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryUserController extends Controller
{
    protected $library_users = [
        [
            'id' => 0,
            'username' => 'user1',
            'first_name' => 'Ivan',
            'last_name' => 'Ivanov',
            'list_of_books' => ['Book1', 'Book2', 'Book3']
        ],
        [
            'id' => 1,
            'username' => 'user2',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'list_of_books' => ['Book4', 'Book5', 'Book6']
        ]
    ];

    public function showLibUsers($id)
    {
        return view('user_sem2', ['user' => $this->library_users[$id]]);
    }
}
