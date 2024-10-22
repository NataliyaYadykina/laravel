<?php

namespace App\Http\Controllers;

use App\Models\BookHw6;
use Illuminate\Http\Request;

class BookHw6Controller extends Controller
{
    public function index()
    {
        return view('form_hw6');
    }

    public function store(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:book_hw6s,title', 'regex:/^[\S]+(?:\s[\S]+)*$/'], // обязательное поле, не пустое, уникальное, макс. 255 символов
            'author' => ['required', 'string', 'max:100', 'regex:/^[\S]+(?:\s[\S]+)*$/'], // обязательное поле, не пустое, макс. 100 символов
            'genre' => ['required', 'string', 'max:100', 'regex:/^[\S]+(?:\s[\S]+)*$/'], // обязательное поле, не пустое, макс. 100 символов
        ], [
            // Сообщения об ошибках
            'author.required' => 'Поле "Автор" обязательно для заполнения.',
            'author.max' => 'Имя автора не может превышать 100 символов.',
            'genre.required' => 'Поле "Жанр книги" обязательно для заполнения.',
            'title.required' => 'Поле "Название книги" обязательно для заполнения.',
            'title.max' => 'Название книги не может превышать 255 символов.',
            'title.unique' => 'Такое название книги уже существует.',
            'regex' => 'Поле не должно содержать только пробелы.'
        ]);

        // Если валидация пройдена, создаем запись в модели Book
        $book = new BookHw6();
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->genre = $validatedData['genre'];
        $book->save();

        // Возвращаем успешный ответ или редирект
        return redirect()->route('show_book_hw6')->with('success', 'Книга успешно добавлена!');
    }
}
