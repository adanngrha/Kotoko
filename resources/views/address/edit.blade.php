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
						@include('partials.asideWidget')
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div class="col-md-9">
						<div id="my-profile">
							<div class="d-flex justify-content-between align-items-center">
								<h3>Edit Address</h3>
								<a href="/address" class="icon-primary"><i class="fa fa-fw fa-angle-left"></i> Back</a>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-8">
									<div class="billing-details">
										<form action="/address/{{ $address->id }}" method="POST">
                                            @csrf
                                            @method('put')
											<table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="150">Receiver Name</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="receiver_name" placeholder="Receiver Name" value="{{ $address->receiver_name }}"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Phone Number</td>
													<td class="align-middle pl-4"><input class="input" type="number" min="0" name="receiver_phone_number" placeholder="Receiver Phone Number" value="{{ $address->receiver_phone_number }}"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Address</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="address_name" placeholder="Street Name, Building" value="{{ $address->address_name }}"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">City</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="city" placeholder="City" value="{{ $address->city }}"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Province</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="province" placeholder="Province" value="{{ $address->province }}"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Postal Code</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="postal_code" placeholder="Receiver Postal Code" value="{{ $address->postal_code }}"></td>
												</tr>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><button class="primary-btn" name="save" type="submit">Save</button></td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
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
