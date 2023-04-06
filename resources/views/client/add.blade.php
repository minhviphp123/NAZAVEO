@extends('layout.client')
@section('content')
    <h1>{{ $title }}</h1>
    <form action="/them-san-pham" method="post">
        @csrf

        @error('msg')
            <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror

        <label for="">Thêm sản phẩm</label>
        <input type="text" class="form-control rounded-pill" class="@error('name') is-invalid @enderror" name="name"
            placeholder="Enter your product name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="">Giá sản phẩm</label>
        <input type="text" class="form-control rounded-pill" class="@error('price') is-invalid @enderror" name="price"
            placeholder="Enter your product price">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn" type="submit">Go</button>
    </form>
@endsection
