@extends('main')
@section('content-main')
    <div style="margin:30px 0">

        <div class="container d-flex flex-wrap" style="border:1px solid;position: relative;padding-bottom:70px">

            <div style="width:100%;margin:10px 5px">
                <div style="width:fit-content;margin:0 auto">
                    <button class="btn btn-danger" onclick="search()">Search</button>
                    <button class="btn btn-warning" onclick="filter()">Filter</button>
                </div>
            </div>

            <div class="feature">
                <div class="search-ctn" style="margin: 20px 0;display:none">
                    <span class="minh">SEARCH</span>
                    <input type="text" class="ip">
                </div>

                <div style="display:none" class="filter-ctn">
                    <label for="color-filter">Lọc theo giá:</label>
                    <select id="price-filter">
                        <option value="all" selected>Tất cả</option>
                        <option value="1000">Dưới 1000</option>
                        <option value="1500">Trung bình</option>
                        <option value="2000">Trên 2000</option>
                    </select>
                </div>
            </div>

            <h2 style="width:100%">All Products</h2>
            <div>

                <div class="container d-flex flex-wrap ctn1" id="product-list"
                    style="border:1px solid;width:fit-content;height:fit-content">
                    @foreach ($products as $product)
                        <a href="{{ route('get-prod-detail', ['id' => $product->id]) }}"
                            style="margin:10px;text-decoration: none;">
                            <div class="product" style="text-align: center">
                                <div style="display: none" class="pro-id">{{ $product->id }}</div>
                                <div style="">
                                    {{-- @if ($product->thumb) --}}
                                    <img class="img-product" src="{{ $product->thumb }}" alt="">

                                </div>
                                <div style="">{{ $product->name }}</div>
                                <div>{{ $product->price }}</div>

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
                                    `<a href="/user/product-detail/${product.id}" style="margin:10px;text-decoration: none;">`;
                                html += `<div class="product" style="text-align: center">`;
                                html +=
                                    `<div style="display: none" class="pro-id">${product.id}</div>`;
                                html += `<div style="">`;
                                html +=
                                    `<img class="img-product" src="${product.thumb}" alt="">`;
                                html += `</div>`;
                                html += `<div>${product.name}</div>`;
                                html += `<div>${product.price}</div>`;
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
            let prodsCtn = document.querySelector('.ctn1');
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
                    let element = prods3[index];
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
                        let element = products[index];
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

                // if (productsCtn.children.length == 0) {
                //     document.getElementById('load-more').style.display =
                //         'none';
                // } else {
                //     document.getElementById('load-more').style.display =
                //         'block';
                // }

            });

            //-----------------------------------------------------------------------------------
            //-----------------------------------------------------------------------------------

            var feature = document.querySelector('.feature');
            let priceFilter = document.getElementById('price-filter');

            function search() {
                document.querySelector('.filter-ctn').style.display = 'none';
                document.getElementById('load-more').style.display =
                    'none';
                priceFilter.value = 'all';

                if (document.querySelector('.search-ctn').style.display == 'none') {
                    document.querySelector('.search-ctn').style.display = 'block';

                    prods2 = [];
                    prods2 = products.slice(0, amount2);

                    prodsCtn.innerHTML = '';
                    for (let index = 0; index < prods2.length; index++) {
                        let element = prods2[index];

                        prodsCtn.innerHTML += `
                                    <a href="/user/product-detail/${element.id}"
                                        style="display:block;margin:10px;width:fit-content">
                                        <div class="product" style="text-align: center">
                                            <div style="display: none" class="pro-id">${element.id}</div>
                                            <div style="">
                                                <img class="img-product" src="${element.thumb}" alt="">
                                            </div>
                                            <div>${element.name}</div>
                                            <div>${element.price}</div>

                                        </div>
                                    </a>
                                    `
                    }
                    // document.getElementById('load-more').style.display =
                    //     'block';
                } else {
                    document.querySelector('.search-ctn').style.display = 'none';
                    document.getElementById('load-more').style.display =
                        'block';
                    prods2 = [];
                    prods2 = products.slice(0, amount2);

                    prodsCtn.innerHTML = '';
                    for (let index = 0; index < prods2.length; index++) {
                        let element = prods2[index];

                        prodsCtn.innerHTML += `
                                    <a href="/user/product-detail/${element.id}"
                                        style="display:block;margin:10px;width:fit-content">
                                        <div class="product" style="text-align: center">
                                            <div style="display: none" class="pro-id">${element.id}</div>
                                            <div style="">
                                                <img class="img-product" src="${element.thumb}" alt="">
                                            </div>
                                            <div>${element.name}</div>
                                            <div>${element.price}</div>

                                        </div>
                                    </a>
                                    `
                    }
                }

            }

            function filter() {
                document.querySelector('.search-ctn').style.display = 'none';
                document.getElementById('load-more').style.display =
                    'none';
                inputt.value = '';

                if (document.querySelector('.filter-ctn').style.display == 'none') {
                    document.querySelector('.filter-ctn').style.display = 'block';
                    prods2 = [];
                    prods2 = products.slice(0, amount2);

                    prodsCtn.innerHTML = '';
                    for (let index = 0; index < prods2.length; index++) {
                        let element = prods2[index];

                        prodsCtn.innerHTML += `
                                    <a href="/user/product-detail/${element.id}"
                                        style="display:block;margin:10px;width:fit-content">
                                        <div class="product" style="text-align: center">
                                            <div style="display: none" class="pro-id">${element.id}</div>
                                            <div style="">
                                                <img class="img-product" src="${element.thumb}" alt="">
                                            </div>
                                            <div>${element.name}</div>
                                            <div>${element.price}</div>

                                        </div>
                                    </a>
                                    `
                    }

                } else {
                    document.querySelector('.filter-ctn').style.display = 'none';

                    document.getElementById('load-more').style.display =
                        'block';
                    prods2 = [];
                    prods2 = products.slice(0, amount2);

                    prodsCtn.innerHTML = '';
                    for (let index = 0; index < prods2.length; index++) {
                        let element = prods2[index];

                        prodsCtn.innerHTML += `
                                    <a href="/user/product-detail/${element.id}"
                                        style="display:block;margin:10px;width:fit-content">
                                        <div class="product" style="text-align: center">
                                            <div style="display: none" class="pro-id">${element.id}</div>
                                            <div style="">
                                                <img class="img-product" src="${element.thumb}" alt="">
                                            </div>
                                            <div>${element.name}</div>
                                            <div>${element.price}</div>

                                        </div>
                                    </a>
                                    `
                    }
                }
            }

            priceFilter.addEventListener('change', filterProducts);

            function filterProducts() {
                let selectedPrice = priceFilter.value;

                prods2 = [];
                prods2 = products.slice(0, amount2);

                if (selectedPrice != 'all') {
                    selectedPrice = (parseInt(selectedPrice));
                }

                switch (selectedPrice) {
                    case 'all':
                        prodsCtn.innerHTML = '';
                        for (let index = 0; index < prods2.length; index++) {
                            let element = prods2[index];

                            prodsCtn.innerHTML += `
                                    <a href="/user/product-detail/${element.id}"
                                        style="display:block;margin:10px;width:fit-content">
                                        <div class="product" style="text-align: center">
                                            <div style="display: none" class="pro-id">${element.id}</div>
                                            <div style="">
                                                <img class="img-product" src="${element.thumb}" alt="">
                                            </div>
                                            <div>${element.name}</div>
                                            <div>${element.price}</div>

                                        </div>
                                    </a>
                                    `
                        }
                        break;
                    case 1000:
                        prodsCtn.innerHTML = '';

                        for (let index = 0; index < prods2.length; index++) {
                            let element = prods2[index];
                            if (parseInt(element.price) < selectedPrice) {
                                prodsCtn.innerHTML += `
                                    <a href="/user/product-detail/${element.id}"
                                        style="display:block;margin:10px;width:fit-content">
                                        <div class="product" style="text-align: center">
                                            <div style="display: none" class="pro-id">${element.id}</div>
                                            <div style="">
                                                <img class="img-product" src="${element.thumb}" alt="">
                                            </div>
                                            <div>${element.name}</div>
                                            <div>${element.price}</div>
                                        </div>
                                    </a>
                                    `
                            }

                        }
                        break;
                    case 1500:
                        prodsCtn.innerHTML = '';

                        for (let index = 0; index < prods2.length; index++) {
                            let element = prods2[index];
                            if (parseInt(element.price) < 2000 && element.price > 1000) {
                                prodsCtn.innerHTML += `
                                <a href="/user/product-detail/${element.id}"
                                    style="display:block;margin:10px;width:fit-content">
                                    <div class="product" style="text-align: center">
                                        <div style="display: none" class="pro-  d">${element.id}</div>
                                        <div style="">
                                            <img class="img-product" src="${element.thumb}" alt="">
                                        </div>
                                        <div>${element.name}</div>
                                        <div>${element.price}</div>

                                    </div>
                                </a>
                                `
                            }

                        }
                        break;
                    case 2000:
                        prodsCtn.innerHTML = '';

                        for (let index = 0; index < prods2.length; index++) {
                            let element = prods2[index];
                            if (parseInt(element.price) > selectedPrice) {
                                prodsCtn.innerHTML += `
                                <a href="/user/product-detail/${element.id}"
                                    style="display:block;margin:10px;width:fit-content">
                                    <div class="product" style="text-align: center">
                                        <div style="display: none" class="pro-id">${element.id}</div>
                                        <div style="">
                                            <img class="img-product" src="${element.thumb}" alt="">
                                        </div>
                                        <div>${element.name}</div>
                                        <div>${element.price}</div>

                                    </div>
                                </a>
                                `
                            }

                        }
                        break;
                    default:
                        console.log('error');
                }
            }
        </script>
    @endsection
