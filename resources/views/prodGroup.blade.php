@extends('main')
@section('content-main')
    <div class="container">
        @foreach ($products as $product)
            <a href="{{ route('get-prod-detail', ['id' => $product->id]) }}" style="margin:10px">
                <div class="product" style="text-align: center">
                    <div style="display: none" class="pro-id">{{ $product->id }}</div>
                    <div style="">
                        <img class="img-product" src="{{ $product->thumb }}" alt="">
                    </div>
                    <div>{{ $product->name }}</div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
