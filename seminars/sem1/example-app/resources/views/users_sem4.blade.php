<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users list</title>
</head>

<body>
    @php
        $greenUser = 2;
    @endphp
    <table border="3">
        @foreach ($users as $key => $user)
            @if ($key === $greenUser)
                <tr>
                    <td>{{ $key }}</td>
                    <td style="background-color: green">{{ $user }}</td>
                </tr>
            @elseif ($key === 4)
                <tr>
                    <td>{{ $key }}</td>
                    <td><b>{{ $user }}</b></td>
                </tr>
            @else
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $user }}</td>
                </tr>
            @endif
        @endforeach
    </table>
</body>

</html>
