@extends('admin')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content-admin')
    <div class="container mt-5">
        <h2>Thêm sản phẩm mới</h2>
        <form action="" method="POST">
            @csrf

            @include('alert')

            <div class="form-group">
                <label for="ten-danh-muc">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="ten-danh-muc" placeholder="Nhập tên sản phẩm" name="prod-name">
            </div>
            <div class="form-group">
                <label for="danh-muc-cha">Danh mục</label>
                <select class="form-control" id="danh-muc-cha" name="child_id">
                    @foreach ($childMenu as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ten-danh-muc">Giá</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group" onchange="uploadImage('upload','image_show')">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file" class="form-control" id="upload" name="prod-img">
                <div id="image_show-ctn">
                    <img src="" alt="" id="image_show" style="max-height:100px;max-width:100px;opacity:0.8">
                </div>
            </div>

            <div class="form-group">
                <label for="mo-ta">Mô tả:</label>
                <textarea class="form-control" id="editor1" rows="3" placeholder="Nhập mô tả" name="desc"></textarea>

            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 15px">Thêm</button>
        </form>
    </div>
@endsection
