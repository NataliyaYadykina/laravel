@extends('layouts.default')

@section('content')
    <h1>Welcome, {{ $name }}</h1>

    <p>Position: {{ $position }}</p>
    <p>Address: {{ $address }}</p>

    @if ($age > 18)
        <p>Your age is {{ $age }}.</p>
    @else
        <p>You are too young!</p>
    @endif
@endsection
