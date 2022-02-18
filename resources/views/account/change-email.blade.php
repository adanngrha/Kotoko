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
									<h3>Change Email</h3>
									<p>For the security of your account, please do not share your email with other person.</p>
								</div>
								<a href="/account" class="icon-primary"><i class="fa fa-fw fa-angle-left"></i> Back</a>
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
										<form action="change-email" method="POST">
                                            @csrf
											<table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="100">Old Email</td>
													<td class="align-middle pl-4"><input class="input" type="email" name="old_email" placeholder="Old Email" value=""></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">New Email</td>
													<td class="align-middle pl-4"><input class="input" type="email" name="new_email" placeholder="New Email" value=""></td>
												</tr>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><button class="primary-btn" name="ubah" type="submit">Confirm</button></td>
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
