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
							<h3>My Orders</h3>
							<hr>
							<!-- row -->
							<div class="row">
								<!-- section title -->
								<div class="col-md-12">
									<div class="section-title float-left">
										<div class="section-nav">
											<ul class="section-tab-nav tab-nav">
												<li class="active"><a data-toggle="tab" href="#all">All</a></li>
												<li><a data-toggle="tab" href="#tab1">Not yet paid</a></li>
												<li><a data-toggle="tab" href="#tab1">Packed</a></li>
												<li><a data-toggle="tab" href="#tab1">Sent</a></li>
												<li><a data-toggle="tab" href="#tab1">Done</a></li>
												<li><a data-toggle="tab" href="#tab1">Cancelled</a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /section title -->
								<br><br><br><br>
								<!-- Products tab & slick -->
								<div class="col-md-12">
									<div class="row">
										<div class="products-tabs">
											<!-- tab -->
											<div id="all" class="tab-pane active">
												<!-- order -->
												<div class="order-list my-2">
													<div class="order-col">
														<div class="order-row mt-2 hr pb-4">
															<div class="order-col">
																<b>E78S72MMADS9</b>
															</div>
															<div class="order-col text-right">
																<span class="text-primary">SELESAI</span>
															</div>
														</div>

														<a href="order-details.html" class="no-hover">
															<!-- Product -->
															<div class="order-row hr bg-silver pr-3">
																<div class="image">
																	<img src="./img/product01.png" alt="">
																</div>
																<div class="order-col">
																	<b  class="mt-4">Judul Produk</b>
																	1x
																</div>
																<div class="order-col text-right">
																	<p class="mt-5">Rp130.000</p>
																</div>
															</div>
															<!-- End Product -->

															<!-- Product -->
															<div class="order-row hr bg-silver pr-3">
																<div class="image">
																	<img src="./img/product02.png" alt="">
																</div>
																<div class="order-col">
																	<b  class="mt-4">Judul Produk</b>
																	1x
																</div>
																<div class="order-col text-right">
																	<p class="mt-5">Rp130.000</p>
																</div>
															</div>
															<!-- End Product -->
														</a>

														<div class="order-row align-items-center mt-3">
															<div class="order-col">
																<small><i>Produk belum dinilai.</i></small>
															</div>
															<div class="order-col align-items-end">
																<div class="total">
																	<span>Total Pesanan: <h3 class="d-inline-block text-primary">Rp260.000</h3></span>
																</div>
																<div class="button align-items-center">
																	<a href="" class="primary-btn-o m-2">Nilai</a>
																	<a href="" class="primary-btn m-2">Beli Lagi</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- end order -->
											</div>
											<!-- /tab -->
										</div>
									</div>
								</div>
								<!-- Products tab & slick -->
							</div>
							<!-- /row -->
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
