@extends('layouts.main')

@section('content')
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						@include('partials.asideWidget')
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div class="col-md-9">
						<div id="my-profile">
							<h3>My Wishlist</h3>
							<p>Information about all your wishlisted products.</p>
                            @if (session('success'))
                                <div class="alert alert-success">
                                        {{ session('success') }}
                                </div>
                            @endif
							<hr>
							<!-- store products -->
							<div class="row">
                                @forelse ($products as $product)
                                <!-- product -->
								<div class="col-md-4 col-xs-6">
									<div class="product">
										<div class="product-img">
											<img src="https://source.unsplash.com/300x300/?{{ $product->product->category->name }}" alt="">
											<div class="product-label">
												<!-- <span class="sale">-30%</span>
												<span class="new">NEW</span> -->
												<button class="add-to-wishlist active"><i class="fa fa-heart"></i><span class="tooltipp"><a class="" href="/wishlist/delete/{{ $product->product->id }}">Hapus Favorit</ac></span></button>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">{{ $product->product->category->name }}</p>
											<h3 class="product-name"><a href="{{ url('show-product/'.$product->product->id) }}">{{ $product->product->name }}</a></h3>
											<h4 class="product-price">IDR {{ number_format($product->product->price, 2) }}{{-- <delclass="product-old-price">$990.00</del> --}}</h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i style="color: black;font-style: normal;"> (17)</i>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
								</div>
								<!-- /product -->
                                @empty
                                <div class="col-md-4 col-xs-6">
                                    <br>
                                    <tr>
                                        <td class="text-center"><h4>Nothing.</h4></td>
                                    </tr>
                                </div>
                                @endforelse
							</div>
							<!-- /store products -->
						</div>
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
