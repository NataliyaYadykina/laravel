<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books list</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <table>
                    @foreach ($books as $key => $book)
                        <tr>
                            <td>{{ $book }}</td>
                            <td><a href="{{ route('remove_book', $key) }}">REMOVE</a></td>
                        </tr>
                    @endforeach
                </table>
                <form name="add-new-book" id="add-new-book" action="{{ route('save_book') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="bookname">Name:</label>
                        <input type="text" class="form-control" id="bookname" name="bookname" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
