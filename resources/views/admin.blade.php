@extends('index')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Thanh sidebar -->
            <div class="col-2 bg-light fixed-top sidebar" style="border: 1px solid;">
                <nav class="nav flex-column">

                    <div style="padding: 2px 12px">ADMIN</div>
                    <div style="padding: 2px 12px">
                        <div style="width:83%;margin:0 auto">
                            {{ $adminName }}
                        </div>
                    </div>


                    <div class="dropdown1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('add-menu') }}">Thêm danh mục</a>
                            <a class="dropdown-item" href="{{ route('show-list') }}">Danh sách danh mục</a>
                        </div>

                    </div>
                    <div class="dropdown1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('add-product') }}">Thêm sản phẩm</a>
                            <a class="dropdown-item" href="{{ route('list-product') }}">Danh sách sản phẩm</a>
                        </div>
                    </div>

                </nav>
            </div>
            <div class="col-10 content">
                <header style="background: green;">
                    <h1>ADMIN </h1>
                </header>

                @yield('content-admin')

            </div>
        </div>
    </div>
@endsection
