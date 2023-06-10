@extends('main')
@section('content-main')
    <div style="margin: 20px 40px">
        <span onclick="alert()">FILTER</span> <input id="myInput" type="text" placeholder="search" style="margin:0 20px">
    </div>
    <div class="container d-flex flex-wrap ctn1">
        {{-- @foreach ($products as $product)
            <a href="{{ route('get-prod-detail', ['id' => $product->id]) }}"
                style="display:block;margin:10px;width:fit-content">
                <div class="product" style="text-align: center">
                    <div style="display: none" class="pro-id">{{ $product->id }}</div>
                    <div style="">
                        <img class="img-product" src="{{ $product->thumb }}" alt="">
                    </div>
                    <div>{{ $product->name }}</div>
                </div>
            </a>
        @endforeach --}}
    </div>

    <div style="display:none" class="id">{{ $id }}</div>

    {{-- <a href="/test-ajax/1/minh">test-ajax</a> --}}

    <script>
        // var name = 'example';
        var id = document.querySelector('.id').innerText;
        const prodsCtn = document.querySelector('.ctn1');
        let products = [];
        let prods2 = [];
        // Tạo đối tượng XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Đăng ký hàm xử lý sự kiện khi nhận được kết quả trả về từ API
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Xử lý kết quả trả về
                products = JSON.parse(this.responseText).product;
                prods2 = products;
                // console.log(products[0]);

                for (let index = 0; index < products.length; index++) {
                    const element = products[index];
                    prodsCtn.innerHTML += `
                    <a href="/user/product-detail/${element.id}"
                        style="display:block;margin:10px;width:fit-content">
                        <div class="product" style="text-align: center">
                            <div style="display: none" class="pro-id">${element.id}</div>
                            <div style="">
                                <img class="img-product" src="${element.thumb}" alt="">
                            </div>
                            <div>${element.name}</div>
                        </div>
                    </a>
                    `
                }

            }
        };

        // Thiết lập các thông số của API
        xhr.open('GET', '/get-prods/' + id);

        // Gửi yêu cầu tới API
        xhr.send();

        /////


        var input = document.getElementById("myInput");
        input.addEventListener("input", function(event) {
            let prods3 = [];
            var value = event.target.value;



            for (let index = 0; index < prods2.length; index++) {
                let element = prods2[index].name.toLowerCase();

                if (element.includes(value) && value !== '') {
                    console.log(element);
                    prods3.push(prods2[index]);
                }
            }

            prodsCtn.innerHTML = '';
            for (let index = 0; index < prods3.length; index++) {
                const element = prods3[index];
                prodsCtn.innerHTML += `
                    <a href="/user/product-detail/${element.id}"
                        style="display:block;margin:10px;width:fit-content">
                        <div class="product" style="text-align: center">
                            <div style="display: none" class="pro-id">${element.id}</div>
                            <div style="">
                                <img class="img-product" src="${element.thumb}" alt="">
                            </div>
                            <div>${element.name}</div>
                        </div>
                    </a>
                    `
            }

            if (value == '') {
                // prodsCtn.innerHTML = '';

                for (let index = 0; index < products.length; index++) {
                    const element = products[index];
                    prodsCtn.innerHTML += `
                    <a href="/user/product-detail/${element.id}"
                        style="display:block;margin:10px;width:fit-content">
                        <div class="product" style="text-align: center">
                            <div style="display: none" class="pro-id">${element.id}</div>
                            <div style="">
                                <img class="img-product" src="${element.thumb}" alt="">
                            </div>
                            <div>${element.name}</div>
                        </div>
                    </a>
                    `
                }
                // prodsCtn.innerHTML = '<p>dkm</p>'

            }
        });
    </script>
@endsection
