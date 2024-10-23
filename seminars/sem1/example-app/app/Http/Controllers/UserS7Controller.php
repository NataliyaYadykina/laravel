<?php

namespace App\Http\Controllers;

use App\Models\UserS7;
use Illuminate\Http\Request;

class UserS7Controller extends Controller
{
    public function index()
    {
        $users = UserS7::all();
        // var_dump($users);
        return view('user_form_hw7', compact('users'));
    }

    public function store(Request $request)
    {
        // Валидация входящих данных
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:50', 'regex:/^[\S]+(?:\s[\S]+)*$/'], // обязательное поле, не пустое, уникальное, макс. 50 символов
            'surname' => ['required', 'string', 'max:50', 'regex:/^[\S]+(?:\s[\S]+)*$/'], // обязательное поле, не пустое, макс. 50 символов
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user_s7_s,email', 'regex:/^[\S]+(?:\s[\S]+)*$/'], // обязательное поле, не пустое, уникальное, макс. 255 символов, формат email
        ], [
            // Сообщения об ошибках
            'surname.required' => 'Поле "surname" обязательно для заполнения.',
            'surname.max' => 'Поле "surname" не может превышать 50 символов.',
            'email.required' => 'Поле "email" обязательно для заполнения.',
            'email.max' => 'Поле "email" не может превышать 255 символов.',
            'email.email' => 'Поле "email" должно быть формата: example@mail.com',
            'email.unique' => 'Такой email уже существует.',
            'name.required' => 'Поле "name" обязательно для заполнения.',
            'name.max' => 'Поле "name" не может превышать 50 символов.',
            'regex' => 'Поле не должно содержать только пробелы.'
        ]);

        // Если валидация пройдена, создаем запись в модели UserS7
        $user = new UserS7();
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->email = $validatedData['email'];
        $user->save();

        // Возвращаем успешный ответ или редирект
        return redirect()->route('show_user_hw7')->with('success', 'Пользователь успешно добавлен!');
    }

    public function get($id)
    {
        $user = UserS7::where('id', $id)->first();
        // var_dump($user);
        return view('show_user_hw7', compact('user'));
    }
}
