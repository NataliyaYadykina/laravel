<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users. HW 7</title>
    <style>
        .invalid {
            border: 1px solid red;
        }
    </style>
</head>

<body>
    @if ($users)
        <table border="3">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Details</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('show_user_by_id_hw7', $user->id) }}">Details</a></td>
                </tr>
            @endforeach
        </table>
    @endif
    <h1>Add new user</h1>
    <div class="add-users__form-wrapper">
        <form action="{{ route('store_user_hw7') }}" name="add-new-user" id="add-new-user" method="POST">
            @csrf
            <div class="form-section">
                <label @error('name')
                class="invalid"
            @enderror for="name">Name
                    @error('name')
                        {{ $message }}
                    @enderror
                </label>
                <input type="text" id="name" name="name" class="form_control" required>
            </div>
            <div class="form-section">
                <label @error('surname')
                class="invalid"
            @enderror for="surname">Surname
                    @error('surname')
                        {{ $message }}
                    @enderror
                </label>
                <input type="text" id="surname" name="surname" class="form_control" required>
            </div>
            <div class="form-section">
                <label @error('email')
                class="invalid"
            @enderror for="email">Email
                    @error('email')
                        {{ $message }}
                    @enderror
                </label>
                <input type="email" id="email" name="email" class="form_control" required>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
