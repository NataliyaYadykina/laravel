<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User resume</title>
</head>

<body>
    @if ($data)
        <h1>Resume for {{ $data['name'] }}</h1>
        <p>Surname: {{ $data['surname'] }}</p>
        <p>Email: {{ $data['email'] }}</p>
    @else
        <h3>No resume data found</h3>
    @endif
</body>

</html>
