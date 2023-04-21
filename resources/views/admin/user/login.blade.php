@extends('layout.mainLayout')
@section('header')
@include('layout.header')
@endsection
@section('content')
<div class="container">
    <div class="row">
         <div class="col-4" style="margin: 100px auto">
             <h2>Login</h2>
             @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
             @endif
             @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
             @endif
             <form method="POST" action="{{route('post-login')}}">
                @csrf
               <div class="form-group">
                 <label for="username">Username:</label>
                 <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name">
                 @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group">
                 <label for="password">Password:</label>
                 <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                 @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
             </form>
         </div>
    </div>
   </div>
@endsection