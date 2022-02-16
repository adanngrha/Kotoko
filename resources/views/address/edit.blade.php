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
								<h3>Tambah Alamat</h3>
								<a href="/address/{{ $address->id }}" class="icon-primary"><i class="fa fa-fw fa-angle-left"></i> Kembali</a>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-8">
									<div class="billing-details">
										<form action="/address" method="POST">
											<table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="150">Nama Penerima</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="receiver_name" placeholder="Nama Penerima"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Nomor Telepon</td>
													<td class="align-middle pl-4"><input class="input" type="number" min="0" name="receiver_phone_number" placeholder="Nomor Telepon Penerima"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Alamat</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="address_name" placeholder="Nama Jalan, Gedung, No Rumah"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Kabupaten/Kota</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="city" placeholder="Kabupaten atau Kota Penerima"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Provinsi</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="province" placeholder="Provinsi Penerima"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Kode Pos</td>
													<td class="align-middle pl-4"><input class="input" type="text" name="postal_code" placeholder="Kode Pos Penerima"></td>
												</tr>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><button class="primary-btn" name="save" type="submit">Tambah</button></td>
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
