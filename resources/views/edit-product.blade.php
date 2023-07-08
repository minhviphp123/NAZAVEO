@extends('admin')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content-admin')
    <div class="container mt-5">
        <h2>Update product</h2>
        @if (isset($product))
            <form action="{{ route('update-product', ['id' => $product->id]) }}" method="POST">
                @csrf

                @include('alert')

                <div class="form-group">
                    <label for="ten-danh-muc">Tên sản phẩm:</label>
                    <input type="text" class="form-control" id="ten-danh-muc" placeholder="Nhập tên sản phẩm" name="prod-name"
                        value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="danh-muc-cha">Danh mục</label>
                    <select class="form-control" id="danh-muc-cha" name="child_id">

                        @foreach ($childMenu as $item)
                            @if ($item->id == $product->child_id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ten-danh-muc">Giá</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                </div>
                <div class="form-group" onchange="uploadImage('upload2','image_show2')" style="padding: 15px 0">
                    <label for="">Ảnh sản phẩm</label>
                    <br>
                    <label for=""><img src="{{ $product->thumb }}" alt="" id="image_show2"
                            style="max-height:100px;max-width:100px;opacity:0.8">
                    </label>
                    <label for="upload2" class="btn btn-primary">
                        Update IMG
                    </label>
                    <input type="file" class="form-control" id="upload2" name="prod-img" style="display:none">

                </div>

                <div class="form-group">
                    <label for="mo-ta">Mô tả:</label>
                    <textarea class="form-control" id="editor1" rows="3" placeholder="Nhập mô tả" name="desc">{{ $product->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-prim   ary" style="margin-top: 15px">Edit</button>
            </form>
        @endif
    </div>
@endsection
