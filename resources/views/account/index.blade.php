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
							<h3>Profil Saya</h3>
							<p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun.</p>
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
										<form action="account/edit" method="get">
											<table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="150">Username</td>
													<td class="align-middle pl-4">{{ $user->username }}</td>
												</tr>
												<tr>
                                                    @if ($user->name)
                                                        <td class="text-right align-middle text-gray">Nama</td>
													    <td class="align-middle pl-4">{{ $user->name }}</td>
                                                    @else
                                                        <td class="text-right align-middle text-gray">Nama</td>
													    <td class="align-middle pl-4">Belum Ada</td>
                                                    @endif
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Email</td>
													<td class="align-middle pl-4">{{ $user->email }} <a href="account/change-email" class="ml-2"><i class="fa fa-fw fa-pencil-square-o"></i>Ubah</a></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Password</td>
													<td class="align-middle pl-4">********** <a href="account/change-password" class="ml-2"><i class="fa fa-fw fa-pencil-square-o"></i>Ubah</a></td>
												</tr>
												<tr>
                                                    @if ($user->profile->phone_number)
                                                    <td class="text-right align-middle text-gray">Nomor Telepon</td>
													<td class="align-middle pl-4">{{ $user->profile->phone_number }}</td>
                                                    @else
                                                    <td class="text-right align-middle text-gray">Nomor Telepon</td>
													<td class="align-middle pl-4">Belum Ada</td>
                                                    @endif
												</tr>
												<tr>
                                                    @if ($user->profile->gender)
                                                        <td class="text-right align-middle text-gray">Jenis Kelamin</td>
                                                        @if ($user->profile->gender == 'men')
                                                            <td class="align-middle pl-4">Laki-laki</td>
                                                        @else
                                                            <td class="align-middle pl-4">Perempuan</td>
                                                        @endif
                                                    @else
                                                        <td class="text-right align-middle text-gray">Jenis Kelamin</td>
													    <td class="align-middle pl-4">Belum Ada</td>
                                                    @endif
												</tr>
												<tr>
                                                    @if ($user->profile->birth_date)
                                                        <td class="text-right align-middle text-gray">Tanggal Lahir</td>
                                                        <td class="align-middle pl-4">{{ $user->profile->birth_date }}</td>
                                                    @else
                                                        <td class="text-right align-middle text-gray">Tanggal Lahir</td>
                                                        <td class="align-middle pl-4">Belum Ada</td>
                                                    @endif
												</tr>
                                                </form>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><a href="account/edit" class="primary-btn">Edit Akun</a></td>
												</tr>
											</table>
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
