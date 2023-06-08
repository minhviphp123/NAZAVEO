@extends('admin')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content-admin')
    <div class="container mt-5">
        <h2>Thêm danh mục mới</h2>


        <form action="" method="POST">
            @csrf

            @include('alert')

            <div class="form-group">
                <label for="ten-danh-muc">Tên danh mục:</label>
                <input type="text" class="form-control" id="ten-danh-muc" placeholder="Nhập tên danh mục" name="dm-name">
            </div>
            <div class="form-group">
                <label for="danh-muc-cha">Danh mục</label>
                <select class="form-control" id="danh-muc-cha" name="parent_id">
                    <option value="0">Danh mục cha</option>

                    @foreach ($parentMenu as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="mo-ta">Mô tả:</label>
                <textarea class="form-control" id="editor1" rows="3" placeholder="Nhập mô tả" name="desc"></textarea>

            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 15px">Thêm</button>
        </form>
    </div>
@endsection
