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
										<form action="/account/edit" method="POST">
                                            @csrf
											<table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="150">Username</td>
													<td class="align-middle pl-4">{{ $user->username }}</td>
												</tr>
												<tr>
                                                        <td class="text-right align-middle text-gray">Nama</td>
													    <td class="align-middle pl-4"><input type="text" class="input" name="full_name" value="{{ $user->profile->full_name }}" placeholder="Masukan nama lengkap Anda"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Email</td>
													<td class="align-middle pl-4">{{ $user->email }} </td>
												</tr>
												<tr>
                                                    <td class="text-right align-middle text-gray">Nomor Telepon</td>
													<td class="align-middle pl-4"><input type="text" class="input" name="phone_number" value="{{ $user->profile->phone_number }}" placeholder="Masukan nomor telepon Anda"></td>
												</tr>
												<tr>
                                                    <td class="text-right align-middle text-gray">Jenis Kelamin</td>
                                                    <td class="align-middle pl-4">
                                                        @if ($user->profile->gender == 'men')
                                                            <input type="radio" name="gender" value="men" checked> Laki-laki
                                                            <input type="radio" name="gender" value="women"> Perempuan
                                                        @elseif ($user->profile->gender == 'women')
                                                            <input type="radio" name="gender" value="men"> Laki-laki
                                                            <input type="radio" name="gender" value="women" checked> Perempuan
                                                        @else
                                                            <input type="radio" name="gender" value="men"> Laki-laki
                                                            <input type="radio" name="gender" value="women"> Perempuan
                                                        @endif
                                                    </td>
												</tr>
												<tr>
                                                    <td class="text-right align-middle text-gray">Tanggal Lahir</td>
                                                    <td class="align-middle pl-4"><input type="datetime" class="input" name="birth_date" value="{{ $user->profile->birth_date }}" placeholder="Masukan tanggal lahir Anda"></td>
												</tr>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><button class="primary-btn" type="save">Simpan</button></td>
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
