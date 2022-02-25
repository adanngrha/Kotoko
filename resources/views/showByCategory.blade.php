@extends('layouts.main')

@section('navigation')
    @include('partials.navigation')
@endsection

@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{ $title }}</h3>

                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <!-- product -->
                    @foreach( $products->sortByDesc('created_at') as $product )
                    <div class="col-md-3">
                        <div class="product">
                            <div class="product-img">
                                <img src="https://source.unsplash.com/300x300/?{{ $product->category->slug }}" alt="">
                                <div class="product-label">
                                    {{-- <span class="sale">-30%</span>
                                    <span class="new">NEW</span> --}}
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name }}</p>
                                <h3 class="product-name"><a href="{{url('show-product/'.$product->id)}}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">Rp{{ number_format($product->price, 2) }} {{--<del
                                        class="product-old-price">Rp990.00</del>--}}</h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                            class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                    cart</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /product -->
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
