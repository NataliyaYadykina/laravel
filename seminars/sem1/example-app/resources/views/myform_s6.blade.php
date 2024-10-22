<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form sem_6</title>
</head>

<body>
    <form action="{{ route('post_form_s6') }}" method="POST" name="myname_s6">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>
        {{-- <label for="age">Age</label> --}}
        <input type="hidden" id="age" name="age" value="34" min="1" required><br>
        <label>Male</label>
        <input type="radio" name="gender" value="male">
        <label>Female</label>
        <input type="radio" name="gender" value="female"><br>
        <label for="hobbies">Hobbies</label><br>
        <input type="checkbox" id="hobby1" name="hobbies[]" value="reading"> Reading<br>
        <input type="checkbox" id="hobby2" name="hobbies[]" value="painting"> Painting<br>
        <input type="checkbox" id="hobby3" name="hobbies[]" value="cooking"> Cooking<br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
