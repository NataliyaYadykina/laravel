<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Validation</title>
    <style>
        .invalid {
            border: 1px solid red;
        }
    </style>
</head>

<body>
    <form action="{{ route('post_validate_form_s6_4') }}" name="validation_test" method="POST">
        @csrf
        <label @error('name')
            class="invalid"
        @enderror for="name">Name: @error('name')
                {{ $message }}
            @enderror
        </label>
        <input type="text" id="name" name="name" required>
        <br>
        <label @error('password')
            class="invalid"
        @enderror for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="confirm_password">Confirm password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <input type="submit" value="Submit">
    </form>
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</body>

</html>
