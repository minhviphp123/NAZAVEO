<?php
use App\Helpers\HeaderHelper;
use App\Models\Menu;
// $menus = HeaderHelper::headerMenu();
// dd($menus);

$menus = Menu::all();

$processedMenu = HeaderHelper::headerMenu($menus);

// print_r(array_keys($processedMenu[0]['child']));
// dd($processedMenu);

?>

@extends('index')

@section('content')
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">My Site</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" style="border:1px solid;margin:0 200px">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('get-main-page') }}" style="color: green">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>

                        @foreach ($processedMenu as $item)
                            <li class="parentLI"><a href="#"
                                    style="display:block;margin:auto 0;  text-decoration: none;
                                }">{{ $item['parent'][1] }}</a>
                                <ul class="dropdown" style="background: none">
                                    @foreach ($item['child'] as $key => $ele)
                                        <li class="test"><a href="{{ route('group-product', ['id' => $ele[0]]) }}"
                                                class="nameOfChild">{{ $ele[1] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" style="border:1px solid;margin:0 200px">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('view-cart') }}" style="min-width:49px">
                                <i class="fa fa-shopping-cart" style=""></i>

                                @if (session('cart'))
                                    <span>{{ count(session('cart')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    @yield('content-main')
@endsection
