<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About page</title>
</head>

<body>
    <x-header text="About">
        <x-slot name="line">
            <p>TEST LINE</p>
        </x-slot>
        <x-slot name="shape">
            <div style="background-color: rgb(0, 4, 255); width: 50px; height: 50px; display: block;"></div>
        </x-slot>
    </x-header>
</body>

</html>
