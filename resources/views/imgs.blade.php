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
        <div class="container">
            @foreach ($imgs as $img)
                <img src="{{ asset('storage/' . $img->image) }}" alt="Ảnh">
            @endforeach
            {{-- <img src="{{ asset('storage/image/REa0CKdQfHQWLHy2Mu08fsgTkCq0RgBuZZvaxIV3.jpg') }}" alt="Ảnh"> --}}
        </div>
    @endsection
</body>

</html>
