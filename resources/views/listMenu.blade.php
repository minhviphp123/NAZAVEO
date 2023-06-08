<?php
use App\Helpers\MenuHelper;
?>

@extends('admin')

@section('content-admin')
    </table>

    <table style="margin: 20px auto">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>desc</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            {!! MenuHelper::menu($menus) !!}
        </tbody>
    </table>

    {{-- <div>{!! MenuHelper::menu() !!}</div> --}}
@endsection
