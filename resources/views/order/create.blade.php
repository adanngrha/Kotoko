@extends('layouts.main')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success mb-3 text-center">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('status') }}
                </div>
            </div>
            @endif
            <form action="/orders" method="post">
            @csrf
            <div id="my-profile">
                <h3>Shopping Cart</h3>
                <hr class="mb-0">
                <!-- Product -->
                <table class="table table-borderless">
                    <thead>
                        <tr class="hr text-center">
                            <td class="text-left" colspan="2">Product</td>
                            <td class="text-gray">Unit Price</td>
                            <td class="text-gray">Quantity</td>
                            <td class="text-gray">Total Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                            $total = 0;
                        @endphp
                        @foreach($carts as $key => $cart)
                        <tr class="hr text-center">
                            <td width="60">
                                <a href="order-details.html" class="no-hover">
                                    <img src="https://source.unsplash.com/300x300/?{{ $cart->category->slug }}" width="100" alt="">
                                </a>
                            </td>
                            <td class="align-middle" width="400">{{ $cart->name }}</td>
                            <td class="align-middle">IDR {{ number_format($pr=$cart->price, 2) }}</td>
                            <td class="align-middle" width="100">
                                <div class="add-to-cart">
                                    <div class="qty-label">
                                        {{ $qty = $cart->pivot->quantity }}
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">IDR {{ number_format($p = $pr * $qty, 2) }}</td>
                        </tr>
                        @php
                            $total += $p;
                            $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <!-- End Product -->
                <div class="d-flex flex-col align-items-end mt-4">
                    <table class="table table-borderless">
                        <tr>
                            <td class="align-middle text-right">Total {{ sizeof($carts) }} Product :</td>
                            <td class="align-middle text-right" width="200">
                                <h3 class="d-inline-block text-primary m-0">IDR {{ number_format($total, 2) }}</h3>
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex flex-row align-items-center">
                        {{-- <a href="" class="primary-btn-o mx-2">Update</a> --}}
                        <button class="primary-btn mx-2" type="submit">place order</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
