<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                User Registration example
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" action="{{ url('user') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Name:</label>
                        <input type="text" class="form-control" id="username" name="username" required="">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
