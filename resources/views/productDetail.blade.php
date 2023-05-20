<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Header Example</title>
    <!-- Link to Bootstrap CSS file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"
        style="border:1px solid; display:flex; align-items:center">
        <div class="container">
            <a class="navbar-brand" href="#">My Website</a>
            <div class="collapse navbar-collapse" id="navbarNav" style="border:1px solid">
                <ul class="navbar-nav me-auto ul-header">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>

                    @if (isset($categories))
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="user">
            @if (auth()->check())
                <div style="display:flex">
                    <i class="fa fa-shopping-cart" style="display:flex; align-items:center"><span
                            style="font-size: small">3</span></i>
                    @if (isset($user))
                        <p class="greeting" style="margin:auto 10px">Hello {{ $user->name }}</p>
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">LOGOUT</button>
                    </form>
                </div>
            @else
                <button class="btn btn-primary" id="loginBtn">LOGIN</button>
                <button class="btn btn-danger">SIGNUP</button>
            @endif
        </div>

        <div id="loginModal" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Login to your account</h2>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">

                        @if (session('name'))
                            <div class="alert alert-danger">
                                {{ session('name') }}
                            </div>
                        @endif

                        @if (session('password'))
                            <div class="alert alert-danger">
                                {{ session('password') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="form-login">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username"
                                    placeholder="Enter your username" name="name" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Enter your password" name="password" />
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div style="display:flex; justify-content:center">
                                <button type="submit" class="btn btn-primary btn-block" style="margin:10px auto">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    {{-- @if (isset($categories))
        <div
            style="border: 1px solid; 
        width:66%;margin:50px auto;display:flex;
        align-items:center;justify-content:center;
        padding:20px
        ">
            @foreach ($categories as $category)
                <div style="border:1px solid; width:fit-content;padding:5px;margin:10px;text-align:center">
                    {{ $category->name }}
                </div>
            @endforeach
        </div>
    @endif --}}

    @if (isset($allProducts))
        <div>
            <div class="container d-flex flex-wrap mx-auto">
                @foreach ($allProducts as $product)
                    <div class="p-2 flex-fill w-50">
                        <span>{{ $product['name'] }}</span>
                        <span style="border-left:1px solid;padding:5px">{{ $product['price'] }}</span>
                        <span>{{ $product['category_id'] }}</span>

                        {{-- <i class="fa fa-plus btn btn-primary"></a> --}}
                        <a href="@if ($product['category_id'] == 1) {{ route('detail-phone', ['id' => $product['id']]) }}
                                @elseif($product['category_id'] == 1) {{ route('detail-mouse', ['id' => $product['id']]) }}   
                                @else {{ route('detail-keyboard', ['id' => $product['id']]) }} @endif
                            "
                            class="btn btn-primary">Chi tiết</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif



    <!-- Link to Bootstrap JS file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    <script>
        // Get the modal
        var loginModal = document.getElementById("loginModal");

        // Get the button that opens the modal
        var loginBtn = document.getElementById("loginBtn");

        // Get the <span> element that closes the modal
        var closeBtn = document.getElementsByClassName("close")[0];

        const form = document.querySelector('.form-login');

        // When the user clicks on the button, open the modal
        loginBtn.onclick = function() {
            loginModal.style.display = "block";
        };

        // When the user clicks on <span> (x), close the modal
        closeBtn.onclick = function() {
            loginModal.style.display = "none";
            const alertDangers = document.querySelectorAll(".alert-danger");
            alertDangers.forEach((alertDanger) => {
                alertDanger.remove();
            });
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == loginModal) {
                loginModal.style.display = "none";
                const alertDangers = document.querySelectorAll(".alert-danger");
                alertDangers.forEach((alertDanger) => {
                    alertDanger.remove();
                });
            }

        };

        const alertDanger = document.querySelector('.alert-danger');

        if (alertDanger) {
            loginModal.style.display = "block";

        }
    </script>

</body>

</html>
