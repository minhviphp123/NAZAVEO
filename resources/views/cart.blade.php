@extends('main')
@section('content-main')
    {{-- @dd($cart) --}}
    @if (session()->has('cart'))
        <div class="container">

            {{-- @dd(session('cart')) --}}
            <div class="row">
                <div class="col-md-6">
                    <table id="table-cart" class="table table-striped">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>amount</td>
                                <td>change </td>
                                <td>price</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $key => $item)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $item['amount'] }}</td>
                                    <td>
                                        <button class="d{{ $key }} btn"
                                            onclick="changeNum('.d'+{{ $key }}, '.i'+{{ $key }}, '.amount'+{{ $key }}, '.total'+{{ $key }}, true
                                    )">-</button>
                                        <span class="amount{{ $key }}">{{ $item['amount'] }}</span>
                                        <button class="i{{ $key }} btn"
                                            onclick="changeNum('.d'+{{ $key }}, '.i'+{{ $key }}, '.amount'+{{ $key }}, '.total'+{{ $key }},false
                                )">+</button>
                                    </td>
                                    <td class="total{{ $key }} for-test">{{ $item['price'] }}</td>
                                </tr>
                            @endforeach

                        <tfoot>
                            <tr>
                                <td colspan="3" style="text-align:center">Total</td>
                                <td class="total-cart"> </td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6
                                    summary-cart">
                    <div style="width: 95%;padding-left:10px 200px;margin:0 auto;border:1px solid">
                        <div class="container title-cart-ctn">
                        </div>
                        <div class="container total-cart-ctn">
                        </div>
                        <div class="container">
                            <h3 style="margin:13px 0 20px 0">Thông tin khách hàng</h3>
                            <div class="row">
                                <div class="col-10" style="margin:0 auto">
                                    <form action="{{ route('order') }}" method="POST">
                                        @csrf
                                        <div class="form-group" style="margin-bottom: 20px">
                                            <input type="text" class="form-control" id="ten-danh-muc" placeholder="Name"
                                                name="username" value="">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 20px">
                                            <input type="text" class="form-control" id="ten-danh-muc" placeholder="Email"
                                                name="email" value="">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 20px">
                                            <input type="text" class="form-control" id="ten-danh-muc"
                                                placeholder="Address" name="address" value="">
                                        </div>

                                        <button type="submit" class="btn btn-primary"
                                            style="display:block;margin: 15px auto">Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="container">
            <h2>Giỏ hàng trống</h2>
        </div>
    @endif

    <script>
        const summaryTotal = document.querySelector('.total-cart');
        const totalArray = document.querySelectorAll('.for-test');

        let summaryTotalValue = null;

        for (let index = 0; index < totalArray.length; index++) {
            const element = totalArray[index];
            summaryTotalValue += parseInt(element.innerText);
        }
        summaryTotal.innerText = summaryTotalValue;

        function changeNum(dec, inc, amount1, total1, dOrI) {
            const decreaseButton = document.querySelector(dec);
            const increaseButton = document.querySelector(inc);
            let amount = document.querySelector(amount1);
            const total = document.querySelector(total1);
            const summaryTotal = document.querySelector('.total-cart');
            const totalArray = document.querySelectorAll('.for-test');
            let amountNum;

            if ((amount.innerText)) {
                amountNum = parseInt(amount.innerText);
            }

            let count = amountNum;

            let totalValue = parseInt(total.innerText);
            let originalTotalValue = totalValue / amountNum;

            if (dOrI) {
                count--;
                if (count < 1) {
                    count = 1;
                }

                if (count == 1) {
                    totalValue = originalTotalValue;
                } else {
                    totalValue -= originalTotalValue;
                }

                amount.innerText = count;
                total.innerText = totalValue;

            } else {
                count++;
                totalValue += originalTotalValue;
                amount.innerText = count;
                total.innerText = totalValue;
            }

            let summaryTotalValue = null;

            for (let index = 0; index < totalArray.length; index++) {
                const element = totalArray[index];
                summaryTotalValue += parseInt(element.innerText);
            }
            summaryTotal.innerText = summaryTotalValue;
        }
    </script>
@endsection
