<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Employee form</title>
</head>

<body>
    <form action="{{ route('store_form_hw5') }}" method="POST">
        @csrf
        <label for="name">Имя работника:</label>
        <input type="text" id="name" name="name" required>

        <label for="surname">Фамилия работника:</label>
        <input type="text" id="surname" name="surname" required>

        <label for="position">Должность:</label>
        <input type="text" id="position" name="position" required>

        <label for="address">Адрес проживания:</label>
        <input type="text" id="address" name="address" required>

        <label for="details">Детали (в формате JSON):</label>
        <textarea id="details" name="details" required></textarea>

        <button type="submit">Отправить</button>
    </form>
</body>

</html>
