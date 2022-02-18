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
							<h3>Edit My Profile</h3>
							<p>Please fill all form.</p>
							<hr>
							<div class="row">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
								{{-- <div class="alert alert-danger mb-3 text-center">Lengkapi Profil Anda! Mulai dari Nama hingga Tanggal Lahir.</div> --}}
								<div class="col-md-8">
									<div class="billing-details">
										<form action="/account/edit" method="POST">
                                            @csrf
											<table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="150">Username</td>
													<td class="align-middle pl-4">{{ $user->username }}</td>
												</tr>
												<tr>
                                                        <td class="text-right align-middle text-gray">Full Name</td>
													    <td class="align-middle pl-4"><input type="text" class="input" name="full_name" value="{{ $user->profile->full_name }}" placeholder="Enter your full name"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Email</td>
													<td class="align-middle pl-4">{{ $user->email }} </td>
												</tr>
												<tr>
                                                    <td class="text-right align-middle text-gray">Phone Number</td>
													<td class="align-middle pl-4"><input type="text" class="input" name="phone_number" value="{{ $user->profile->phone_number }}" placeholder="Enter your phone number"></td>
												</tr>
												<tr>
                                                    <td class="text-right align-middle text-gray">Gender</td>
                                                    <td class="align-middle pl-4">
                                                        @if ($user->profile->gender == 'man')
                                                            <input type="radio" name="gender" value="man" checked> Man
                                                            <input type="radio" name="gender" value="woman"> Woman
                                                        @elseif ($user->profile->gender == 'woman')
                                                            <input type="radio" name="gender" value="man"> Man
                                                            <input type="radio" name="gender" value="woman" checked> Woman
                                                        @else
                                                            <input type="radio" name="gender" value="man"> Man
                                                            <input type="radio" name="gender" value="woman"> Woman
                                                        @endif
                                                    </td>
												</tr>
												<tr>
                                                    <td class="text-right align-middle text-gray">Birth Date</td>
                                                    <td class="align-middle pl-4"><input type="datetime" class="input" name="birth_date" value="{{ $user->profile->birth_date }}" placeholder="Enter your birth date"></td>
												</tr>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><button class="primary-btn" type="save">Save</button></td>
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
