@extends('main')
@section('content-main')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="border:1px solid">
                <div><img src="{{ $product->thumb }}" alt="" style="display: block;margin:0 auto"></div>
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
        // console.log(1);
        // function changeAmount(dec, inc, amount, price, amount2) {
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
                // priceNum = priceNum1;
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

        /////alert


        if (document.querySelector('.success')) {
            swal({
                title: "Success",
                text: "Dat hang thanh cong",
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
                text: "Dat hang that bai",
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
    </script>
@endsection
