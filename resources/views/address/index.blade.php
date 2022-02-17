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
                            @if (session('success'))
                                <div class="alert alert-success">
                                        {{ session('success') }}
                                </div>
                            @endif

							<div class="d-flex justify-content-between align-items-center">
								<h3>Alamat Saya</h3>
								<a href="/address/create" class="icon-primary"><i class="fa fa-fw fa-plus"></i> Tambah Alamat</a>
							</div>

							<!-- Start Address -->
                            @foreach ($addresses as $address)
                                @if ($address->main == 1)
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="130" class="text-gray text-right">Nama Penerima</td>
                                        <td><b>{{ $address->receiver_name }}</b> <span class="label-new">Utama</span></td>
                                        <td class="align-bottom" width="90" rowspan="2"><button><a href="/address/{{ $address->id }}/edit"><i class="fa fa-fw fa-pencil-square-o"></i> Ubah/Edit</a></button></td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray text-right">Telepon Penerima</td>
                                        <td>{{ $address->receiver_phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray text-right">Alamat Penerima</td>
                                        <td >{{ $address->address_name }} <br>
                                        {{ $address->city }} <br>
                                        {{ $address->province }} <br>
                                        {{ $address->postal_code }} <br>
                                        </td>
                                    </tr>
                                </table>
                                @else
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="130" class="text-gray text-right">Nama Penerima</td>
                                        <td><b>{{ $address->receiver_name }}</b></td>
                                        <td class="align-bottom" width="90" rowspan="2"><button><a href="/address/{{ $address->id }}/edit"><i class="fa fa-fw fa-pencil-square-o"></i> Ubah/Edit</a></button></td>
                                        <form action="/address/{{ $address->id }}" class="d-inline" method="POST">
                                            @method('delete')
                                            @csrf
                                            <td class="align-bottom" width="90" rowspan="2"><button type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash-o"></i> Hapus</button> </td>
                                        </form>
                                    </tr>
                                    <tr>
                                        <td class="text-gray text-right">Telepon Penerima</td>
                                        <td>{{ $address->receiver_phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray text-right">Alamat Penerima</td>
                                        <td >{{ $address->address_name }} <br>
                                        {{ $address->city }} <br>
                                        {{ $address->province }} <br>
                                        {{ $address->postal_code }} <br>
                                        </td>
                                        <td colspan="2"><a href="/address-main/{{ $address->id }}" class="primary-btn">Atur Sebagai Utama</a></td>
                                    </tr>
                                </table>
                                @endif
                            @endforeach
							<!-- End Address -->

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
