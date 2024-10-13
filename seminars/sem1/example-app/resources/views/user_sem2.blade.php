<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User information</title>
</head>

<body @if ($user['id'] == 0) style="background-color: yellow" @endif>
    <table border="4">
        <tr>
            <td>Username: </td>
            <td>{{ $user['username'] }}</td>
        </tr>
        <tr>
            <td>First name: </td>
            <td>{{ $user['first_name'] }}</td>
        </tr>
        <tr>
            <td>Last name: </td>
            <td>{{ $user['last_name'] }}</td>
        </tr>
        <tr>
            <td>List of books: </td>
            <td>
                @foreach ($user['list_of_books'] as $item)
                    {{ $item }} <br>
                @endforeach
            </td>
        </tr>
    </table>
</body>

</html>
