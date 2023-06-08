@extends('admin')


@section('content-admin')
    <div class="container mt-5">
        <h2>Edit Menu</h2>


        <form action="{{ route('post-edit-menu', ['id' => $menu->id]) }}" method="POST">
            @csrf

            @include('alert')

            <div class="form-group">
                <label for="ten-danh-muc">Tên danh mục:</label>
                <input type="text" class="form-control" id="ten-danh-muc" placeholder="Nhập tên danh mục" name="dm-name"
                    value="{{ $menu->name }}">
            </div>
            <div class="form-group">
                <label for="danh-muc-cha">Danh mục</label>
                <select class="form-control" id="danh-muc-cha" name="parent_id">
                    @if ($menu->parent_id == 0)
                        <option value="0" selected>Danh mục cha</option>
                    @else
                        <option value="0">Danh mục cha</option>
                    @endif

                    @foreach ($parentMenu as $item)
                        {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
                        @if ($item->id == $menu->parent_id)
                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                        @else
                            <option
                                value="{{ $item->id }}>{{ $item->name }}</option>
@endif
@endforeach


                </select>
            </div>
            <div class="form-group">
                                <label for="mo-ta">Mô tả:</label>
                                {{-- <textarea class="form-control" id="editor1" rows="3" placeholder="Nhập mô tả" name="desc">{{ $menu->desc }}</textarea> --}}

                                @isset($menu)
                                    <textarea class="form-control" id="editor1" rows="3" placeholder="Nhập mô tả" name="desc">{{ $menu->desc }}</textarea>
                                @else
                                    <textarea class="form-control" id="editor1" rows="3" placeholder="Nhập mô tả" name="desc"></textarea>
                                @endisset

            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 15px">Edit</button>
        </form>
    </div>
@endsection
