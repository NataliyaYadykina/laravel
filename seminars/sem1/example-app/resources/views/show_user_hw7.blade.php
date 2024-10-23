<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show user</title>
</head>

<body>
    <a href="{{ route('show_user_hw7') }}">Back</a>
    <h1>User Details</h1>
    @if ($user)
        <p>Name: {{ $user->name }}</p>
        <p>Surname: {{ $user->surname }}</p>
        <p>Email: {{ $user->email }}</p>
    @else
        <p>User not found</p>
    @endif
</body>

</html>
