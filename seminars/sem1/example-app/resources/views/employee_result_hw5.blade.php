<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees list</title>
</head>

<body>
    <h2>Данные сотрудников:</h2>

    <ul>
        @foreach ($employees as $employee)
            <li>
                <strong>Имя:</strong> {{ $employee['name'] }} <br>
                <strong>Фамилия:</strong> {{ $employee['surname'] }} <br>
                <strong>Должность:</strong> {{ $employee['position'] }} <br>
                <strong>Адрес:</strong> {{ $employee['address'] }} <br>
                <strong>Дополнительная информация:</strong> {{ json_encode($employee['details']) }} <br>
                <hr>
            </li>
        @endforeach
    </ul>
</body>

</html>
