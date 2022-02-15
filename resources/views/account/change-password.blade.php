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
								<div class="d-flex flex-col">
									<h3>Ubah Password</h3>
									<p>Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</p>
								</div>
								<a href="/account" class="icon-primary"><i class="fa fa-fw fa-angle-left"></i> Kembali</a>
							</div>
							<hr>
                            @if (session('failed'))
                                <div class="alert alert-danger">
                                    {{ session('failed') }}
                                </div>
                            @endif
							<div class="row">
								<div class="col-md-8">
									<div class="billing-details">
										<form action="change-password" method="POST">
                                            @csrf
                                            <table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="180">Password Lama</td>
													<td class="align-middle pl-4"><input class="input" type="password" name="old_password" placeholder="Password Lama"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Password Baru</td>
													<td class="align-middle pl-4"><input class="input" type="password" name="new_password" placeholder="Password Baru"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Ulangi Password Baru</td>
													<td class="align-middle pl-4"><input class="input" type="password" name="new_password2" placeholder="Ulangi Password Baru"></td>
												</tr>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><button class="primary-btn" name="ubah" type="submit">Ubah</button></td>
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
