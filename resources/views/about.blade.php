@extends('layout.app')
@section('content')
    <h1>About</h1> 
    {{ $x = 10 }}
   
@if ($x > 1) 
    <h2>{{ $name }}</h2>

@endif

@endsection
