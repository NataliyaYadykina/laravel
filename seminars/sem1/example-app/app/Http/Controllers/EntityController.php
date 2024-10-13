<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntityController extends Controller
{
    //
    protected $books = [
        'Book 1',
        'Book 2',
        'Book 3'
    ];

    public function index()
    {
        return view('books', ['books' => $this->books]);
    }

    public function delete($id)
    {
        if (array_key_exists($id, $this->books)) {
            unset($this->books[$id]);
        }
        return view('books', ['books' => $this->books]);
    }

    public function store(Request $request)
    {
        if ($request->bookname) {
            $this->books[] = $request->bookname;
        }
        return view('books', ['books' => $this->books]);
    }
}
