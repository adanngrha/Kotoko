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
							<h3>My Favourites</h3>
							<p>Information about all your favourites products.</p>
							<hr>
							<!-- store products -->
							<div class="row">
								<!-- product -->
								<div class="col-md-4 col-xs-6">
									<div class="product">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
											<div class="product-label">
												<!-- <span class="sale">-30%</span>
												<span class="new">NEW</span> -->
												<button class="add-to-wishlist active"><i class="fa fa-heart"></i><span class="tooltipp">Hapus Favorit</span></button>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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

								<!-- product -->
								<div class="col-md-4 col-xs-6">
									<div class="product">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
											<div class="product-label">
												<!-- <span class="sale">-30%</span>
												<span class="new">NEW</span> -->
												<button class="add-to-wishlist active"><i class="fa fa-heart"></i><span class="tooltipp">Hapus Favorit</span></button>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
											<div class="product-rating">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
								</div>
								<!-- /product -->

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
