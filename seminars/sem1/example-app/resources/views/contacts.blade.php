@extends('layouts.default')

@section('content')
    <h1>Contact Information</h1>

    <p>Address: {{ $address }}</p>
    <p>Post Code: {{ $post_code }}</p>
    <p>Phone: {{ $phone }}</p>

    @if (empty($email))
        <p>Email address not provided.</p>
    @else
        <p>Email: {{ $email }}</p>
    @endif
@endsection
