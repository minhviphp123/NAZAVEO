<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    @extends('layout.full')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://scontent.fhan1-1.fna.fbcdn.net/v/t1.6435-9/174078959_3191269934433668_5750438266251712570_n.jpg?stp=dst-jpg_s206x206&_nc_cat=109&ccb=1-7&_nc_sid=da31f3&_nc_ohc=thqImTXMrqkAX_Ny6LG&_nc_ht=scontent.fhan1-1.fna&oh=00_AfDfpH0KJG3q-0KkvSQTQrRyxxCWcLTWjBKgWt8S7AaFQw&oe=6449BD9F"
                        alt="be quynh cua anh">
                    {{-- <img src="data:image/jpeg;base64,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"
                        alt=""> --}}
                </div>
                <div class="col-md-8" style="">
                    <div class="list-user" style="margin:20px auto; width:fit-content; display:flex; align-items:center">
                        <div>Add User</div>
                        <button class="btn btn-primary" style="margin: 0 30px"><a href="go-to-add-user">Add
                                User</a></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('to.users.update', $item->id) }}" method="GET">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </form>
                                        {{--  --}}
                                        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Thêm các hàng dữ liệu khác tương tự ở đây -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
