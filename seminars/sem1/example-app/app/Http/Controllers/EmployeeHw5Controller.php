<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeHw5Controller extends Controller
{
    // Создаем статическую переменную для хранения данных
    private static $employees = [
        [
            'name' => 'Иван',
            'surname' => 'Иванов',
            'position' => 'Менеджер',
            'address' => 'Москва, ул. Ленина, д. 1',
            'details' => ['age' => 30, 'experience' => '5 лет']
        ],
        [
            'name' => 'Петр',
            'surname' => 'Петров',
            'position' => 'Разработчик',
            'address' => 'Санкт-Петербург, пр. Невский, д. 2',
            'details' => ['age' => 28, 'experience' => '3 года']
        ],
        [
            'name' => 'Светлана',
            'surname' => 'Смирнова',
            'position' => 'Дизайнер',
            'address' => 'Екатеринбург, ул. Чехова, д. 3',
            'details' => ['age' => 27, 'experience' => '4 года']
        ],
        [
            'name' => 'Александр',
            'surname' => 'Сидоров',
            'position' => 'Аналитик',
            'address' => 'Казань, ул. Пушкина, д. 4',
            'details' => ['age' => 35, 'experience' => '8 лет']
        ],
        [
            'name' => 'Екатерина',
            'surname' => 'Лебедева',
            'position' => 'Тестировщик',
            'address' => 'Новосибирск, ул. Дзержинского, д. 5',
            'details' => ['age' => 26, 'experience' => '2 года']
        ]
    ];

    public function index()
    {
        return view('get_employee_data_hw5');
    }

    // Функция для сохранения данных
    public function store(Request $request)
    {
        // Получение данных из запроса
        $name = $request->input('name');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $address = $request->input('address');
        $details = json_decode($request->input('details'), true);

        // Сохранение данных в статической переменной
        self::$employees[] = [
            'name' => $name,
            'surname' => $surname,
            'position' => $position,
            'address' => $address,
            'details' => $details,
        ];

        // Вывод данных для проверки
        return view('employee_result_hw5', ['employees' => self::$employees]);
    }

    // Функция для обновления данных
    public function update(Request $request, $id)
    {
        // Получение новых данных из запроса
        $name = $request->input('name');
        $surname = $request->input('surname');

        echo "name: " . $name . " , surname: " . $surname;

        // Логика обновления данных в массиве
        if (isset(self::$employees[$id])) {
            self::$employees[$id]['name'] = $name;
            self::$employees[$id]['surname'] = $surname;
        }

        // Вывод данных после обновления
        return view('employee_result_hw5', ['employees' => self::$employees]);
    }

    // Функции для получения пути и URL запроса
    public function getPath(Request $request)
    {
        return $request->path();
    }

    public function getUrl(Request $request)
    {
        return $request->url();
    }
}
