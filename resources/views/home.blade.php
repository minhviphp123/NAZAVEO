@extends('layout.app')
@section('content')
      @foreach ($myphone as $item)
       <h2> {{ $item }} </h2><br>
    @endforeach  
@endsection
