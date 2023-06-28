@extends('main')
@section('content-main')
    <div style="margin:30px 0">



        <div class="container d-flex flex-wrap" style="border:1px solid;position: relative;padding-bottom:70px">

            <div style="margin: 20px 0">
                <span class="minh">FILTER</span>
                <input type="text" class="ip">
            </div>

            <h2 style="width:100%">All Products</h2>
            <div>
                {{-- <span>All | </span> <span> New | </span> <span>Old</span> --}}

                <div class="container d-flex flex-wrap ctn1" id="product-list"
                    style="border:1px solid;width:fit-content;height:fit-content">
                    @foreach ($products as $product)
                        <a href="{{ route('get-prod-detail', ['id' => $product->id]) }}" style="margin:10px;">
                            <div class="product" style="text-align: center">
                                <div style="display: none" class="pro-id">{{ $product->id }}</div>
                                <div style="">
                                    {{-- @if ($product->thumb) --}}
                                    <img class="img-product" src="{{ $product->thumb }}" alt="">

                                </div>
                                <div>{{ $product->name }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <button id="load-more" class="btn btn-primary"
                    style="position:absolute;bottom:1px;left: 50%;
            transform: translate(-50%, -50%);">Load
                    More</button>
            </div>
            <p style="display: none" id="amount">{{ $amount }}</p>
        </div>

        <script>
            var productsCtn = document.getElementById('product-list');
            var xhr = new XMLHttpRequest();
            var page = 1; // Trang sản phẩm sẽ được tải
            var amount = document.querySelector('#amount').innerText;
            let prods2 = [];
            let amount2 = productsCtn.children.length;

            document.getElementById('load-more').addEventListener('click', function(e) {
                setTimeout(() => {
                    console.log(productsCtn.querySelectorAll('a').length);
                    amount2 = (productsCtn.querySelectorAll('a').length);
                }, 500);
                e.preventDefault();
                page++; // Tăng số trang lên 1
                xhr.open('GET', '/load-more-products?page=' + page);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.products.length > 0) {
                            var html = '';
                            response.products.forEach(function(product) {
                                html +=
                                    `<a href="/user/product-detail/${product.id}" style="margin:10px;">`;
                                html += `<div class="product" style="text-align: center">`;
                                html +=
                                    `<div style="display: none" class="pro-id">${product.id}</div>`;
                                html += `<div style="">`;
                                html +=
                                    `<img class="img-product" src="${product.thumb}" alt="">`;
                                html += `</div>`;
                                html += `<div>${product.name}</div>`;
                                html += `</div>`;
                                html += `</a>`;
                            });
                            document.getElementById('product-list').insertAdjacentHTML('beforeend',
                                html); // Thêm sản phẩm mới vào danh sách
                            //hide btn when loading more completed

                            if (productsCtn.children.length == amount) {
                                document.getElementById('load-more').style.display =
                                    'none';
                            }
                        } else {
                            document.getElementById('load-more').style.display =
                                'none'; // Ẩn button "Xem thêm" nếu không còn sản phẩm nào để tải
                        }
                    } else {
                        console.log('Lỗi khi tải sản phẩm.');
                    }
                };
                xhr.send();
            });

            //-----------------------------------------------------------------------------------
            //-----------------------------------------------------------------------------------
            var inputt = document.querySelector(".ip");
            const prodsCtn = document.querySelector('.ctn1');
            let products = [];

            // Tạo đối tượng XMLHttpRequest
            var xhr = new XMLHttpRequest();
            // Đăng ký hàm xử lý sự kiện khi nhận được kết quả trả về từ API
            xhr.open('GET', '{{ route('get-all-prods') }}', true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            // Xử lý kết quả trả về
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Xử lý dữ liệu trả về
                    products = JSON.parse(xhr.responseText).allProducts;

                    prods2 = products.slice(0, amount2);

                    console.log(prods2);
                } else {
                    console.log('Đã xảy ra lỗi: ' + xhr.status);
                }
            };

            // Gửi request
            xhr.send();

            inputt.addEventListener("input", function(event) {
                let prods3 = [];

                prods2 = [];
                prods2 = products.slice(0, amount2);

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
                    prods2 = [];
                    prods2 = products.slice(0, amount2);
                    for (let index = 0; index < prods2.length; index++) {
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

                if (productsCtn.children.length == 0) {
                    document.getElementById('load-more').style.display =
                        'none';
                } else {
                    document.getElementById('load-more').style.display =
                        'block';
                }

            });
        </script>
    @endsection
