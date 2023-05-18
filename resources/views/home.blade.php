<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Header Example</title>
    <!-- Link to Bootstrap CSS file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border:1px solid">
        <div class="container">
            <a class="navbar-brand" href="#">My Website</a>
            <div class="collapse navbar-collapse" id="navbarNav" style="border:1px solid">
                <ul class="navbar-nav me-auto ul-header">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>


            </div>
        </div>
        <div class="user">


            @if (auth()->check())
                <p>Người dùng đã đăng nhập</p>
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
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
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

            // form.innerHTML = `
        //  <form method="POST" action="{{ route('login') }}" class="form-login">
        //             @csrf
        //             <div class="form-group">
        //                 <label for="username">Username</label>
        //                 <input type="text" class="form-control" id="username"
        //                     placeholder="Enter your username" name="name" />

        //             </div>
        //             <div class="form-group">
        //                 <label for="password">Password</label>
        //                 <input type="password" class="form-control" id="password"
        //                     placeholder="Enter your password" name="password" />
        //             </div>
        //             <button type="submit" class="btn btn-primary btn-block">
        //                 Login
        //             </button>
        //         </form>
        // `

        };

        // if (loginModal.style.display == "none") {
        //     const alertDangers = document.querySelectorAll(".alert-danger");
        //     alertDangers.forEach((alertDanger) => {
        //         alertDanger.remove();
        //     });
        // }


        const alertDanger = document.querySelector('.alert-danger');

        if (alertDanger) {
            loginModal.style.display = "block";

        }
    </script>

</body>

</html>
