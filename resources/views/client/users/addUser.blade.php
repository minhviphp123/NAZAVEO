@extends('layout.client')
@section('content')
    <h1>{{ $title }}</h1>
    <form action="{{ route('users.postUsers') }}" method="post">
        @csrf

        @error('msg')
            <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror

        <label for="">Name</label>
        <input type="text" class="form-control rounded-pill" class="@error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" placeholder="Enter your name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="">Password</label>
        <input type="text" class="form-control rounded-pill" class="@error('password') is-invalid @enderror"
            name="password" placeholder="Enter your password">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary" type="submit">Go</button>
        <button class="btn btn-warning" type="submit"><a href="{{ route('users.index') }}"
                style="text-decoration: none">Back</a></button>
    </form>
@endsection
