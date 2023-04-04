@extends('layout.client')
@section('content')
    <h1>{{ $title }}</h1>
    <form action="/them-san-pham" method="PUT">
        @csrf
        <input type="text" class="form-control rounded-pill" placeholder="Enter your product name">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button class="btn" type="submit">Go</button>
    </form>
@endsection
