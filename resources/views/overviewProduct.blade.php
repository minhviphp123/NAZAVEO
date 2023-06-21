@extends('main')
@section('content-main')
    <div style="margin:30px 0">
        <div class="container d-flex flex-wrap">
            <h2 style="width:100%">All Products</h2>
            <div>
                {{-- <span>All | </span> <span> New | </span> <span>Old</span> --}}
            </div>
            <div class="container d-flex flex-wrap">
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

        </div>
    </div>
@endsection
