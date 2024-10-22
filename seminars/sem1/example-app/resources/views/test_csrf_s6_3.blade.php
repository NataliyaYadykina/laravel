<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test CSRF</title>
</head>

<body>
    <form action="{{ route('post_csrf_s6_3') }}" name="test_csrf", method="POST">
        @csrf
        <input type="text" name="test_name">
        <input type="submit" value="Submit">
    </form>
</body>

</html>
