@extends('layout.mainLayout')
@section('header')
@include('layout.header')
@endsection
@section('content')
<div class="container">
    <div class="row">
         <div class="col-4" style="margin: 100px auto">
             <h2>Add User - SignUp</h2>
             @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
             @endif
             @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
             @endif
             <form method="POST" action="{{route('post-user')}}">
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
               <div class="form-group">
                 <label for="role">Role:</label>
                 <select class="form-control" id="role" name="role">
                   <option value="admin">Admin</option>
                   <option value="user">User</option>
                 </select>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
             </form>
         </div>
    </div>
   </div>
@endsection