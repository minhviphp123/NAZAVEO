<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body>
    {{-- @if (Session::has('message'))
        <script>
            Swal("Message", "{{ Session::get('message') }}", "success", {
                button: true,
                button: "OK",
                timer: 3000
            })
        </script>
    @endif --}}
    <h1>Test Toast</h1>
    {{-- <form action="{{ route('show-toast') }}" method="post" >
        <button type="submit">GO</button>
    </form> --}}

    <script>
        swal({
            title: "oh?",
            text: "yeah",
            icon: "warning",
            buttons: true,
            dangerMode: false
        })
    </script>
</body>

</html>
