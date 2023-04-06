@extends('layout.client')
@section('content')
    <h1>UserList</h1>
    <div class="container">
        <h1>{{ $title }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <button class="btn btn-primary" style="margin-bottom: 30px"><a href="{{ route('users.addUsers') }}"
                style="text-decoration: none">Thêm người
                dùng</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersList as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="{{ route('users.getEditUsers', ['id' => $user->id]) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('users.destroy', ['id' => $user->id]) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                <!-- Thêm các dòng dữ liệu khác tương tự ở đây -->
            </tbody>
        </table>
    </div>
@endsection
