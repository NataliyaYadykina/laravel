<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome!</title>
</head>

<body>
    <h1>Добро пожаловать на сайт, {{ $user->first_name }} {{ $user->last_name }}</h1>
    <p>Ваша электронная почта: {{ $user->email }}</p>
</body>

</html>
