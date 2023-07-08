@extends('main')
@section('content-main')
    <div class="container">
        <div class="row">
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="zoom-controls">
                        <div class="zoom">
                            <button id="zoom-in">+</button>
                            <button id="zoom-out">-</button>
                        </div>
                    </div>
                    <img id="modal-image" src="">
                </div>
            </div>
            <div class="col-md-6" style="border:1px solid">
                <div><img id="myImg" src="{{ $product->thumb }}" alt="" style="display: block;margin:0 auto">
                </div>
            </div>
            <div class="col-md-6" style="border:1px solid;text-align:center">
                <div class="right-detail">{{ $product->name }}</div>
                <div class="right-detail">{{ $product->price }}</div>
                <div class="right-detail">{{ $product->description }}</div>

                <div style="margin:15px auto">
                    <button class="decrease btn">-</button>
                    <span class="amount">1</span>
                    <button class="increase btn">+</button>
                </div>
                <div>
                    <form action="{{ route('add-to-cart') }}" method="post">
                        @csrf
                        <input type="text" value="{{ $product->id }}" name="prod-id" style="display:none">
                        <input type="text" class="amount2" name="amount" style="display:none">
                        <input type="text" class="price" name="price" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form>
                </div>
            </div>

            @if (session('alert1'))
                <div class="success" style="display:none">success</div>
            @endif

            @if (session('alert2'))
                <div class="error" style="display:none">error</div>
            @endif

        </div>
    </div>

    <script>
        const decreaseButton = document.querySelector(".decrease");
        const increaseButton = document.querySelector(".increase");
        const amount = document.querySelector(".amount");
        const numOfForm = document.querySelector(".amount2");
        const price = document.querySelector(".price");

        let count = 1;
        let priceNum = parseInt(price.value);
        let priceNum1 = priceNum;
        price.value = priceNum;

        numOfForm.value = count;
        decreaseButton.addEventListener("click", () => {
            count--;
            priceNum -= priceNum1;
            if (count < 1) {
                count = 1;
            }

            if (count == 1) {
                priceNum = priceNum1;
            }

            amount.innerText = count;
            numOfForm.value = count;
            price.value = priceNum;
        });

        increaseButton.addEventListener("click", () => {
            count++;
            priceNum += priceNum1;
            amount.innerText = count;
            numOfForm.value = count;
            price.value = priceNum;
        });

        numOfForm.value = amount.innerHTML;

        if (document.querySelector('.success')) {
            swal({
                title: "Success",
                text: "Da them vao gio",
                icon: "success",
                buttons: true,
                dangerMode: true
            })

            let successs = document.querySelectorAll('.success');
            setTimeout(() => {
                successs.forEach(function(success) {
                    success.remove();
                });
            }, 1000);
        }

        if (document.querySelector('.error')) {
            swal({
                title: "Error",
                text: "Them that bai",
                icon: "warning",
                buttons: true,
                dangerMode: false
            })

            let errors = document.querySelectorAll('.error');
            setTimeout(() => {
                errors.forEach(function(error) {
                    error.remove();
                });
            }, 1000);
        }

        //--------------------------------------------------------------------
        //--------------------------------------------------------------------

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("modal-image");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Zoom in and zoom out functionality
        var zoomInBtn = document.getElementById("zoom-in");
        var zoomOutBtn = document.getElementById("zoom-out");
        var currentZoom = 1;

        zoomInBtn.addEventListener("click", function() {
            currentZoom += 0.1;
            if (currentZoom < 1.2) {
                modalImg.style.transform = "scale(" + currentZoom + ")";
            } else {
                currentZoom = 1.2;
                modalImg.style.transform = "scale(" + currentZoom + ")";
            }
        });

        zoomOutBtn.addEventListener("click", function() {
            currentZoom -= 0.1;
            modalImg.style.transform = "scale(" + currentZoom + ")";
            if (currentZoom > 0.8) {
                modalImg.style.transform = "scale(" + currentZoom + ")";
            } else {
                currentZoom = 0.8;
                modalImg.style.transform = "scale(" + currentZoom + ")";
            }
        });
    </script>
@endsection
