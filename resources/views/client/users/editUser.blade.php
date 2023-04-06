@extends('layout.client')
@section('content')
    <h1>{{ $title }}</h1>
    <form action="{{ route('users.postEditUsers', ['id' => $id]) }}" method="post">
        @csrf

        <label for="">Edit User</label>
        <input type="text" class="form-control rounded-pill" class="@error('name') is-invalid @enderror" name="name"
            placeholder="Enter your name" value="{{ old('name') ?? $userDetail->name }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn" type="submit">Go</button>
    </form>
@endsection
