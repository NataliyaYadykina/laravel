<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Upload</title>
</head>

<body>
    <form action="{{ route('uploadFileS5') }}" name="file-upload" enctype="multipart/form-data" method="POST">
        <input type="file" name="upload_photo[]">
        <input type="file" name="upload_photo[]">
        <input type="file" name="upload_photo[]">
        <input type="submit" value="Upload">
        @csrf
    </form>
</body>

</html>
