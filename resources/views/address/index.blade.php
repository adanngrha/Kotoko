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
								<h3>My Addresses</h3>
								<a href="/address/create" class="icon-primary"><i class="fa fa-fw fa-plus"></i> Add an Address</a>
							</div>

							<!-- Start Address -->
                            @forelse ($addresses as $address)
                                @if ($address->main == 1)
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td width="130" class="text-gray text-right">Receiver Name</td>
                                                <td><b>{{ $address->receiver_name }}</b> <span class="label-new">Main</span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray text-right">Receiver Phone Number</td>
                                                <td>{{ $address->receiver_phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray text-right">Receiver Address</td>
                                                <td >{{ $address->address_name }} <br>
                                                {{ $address->city }} <br>
                                                {{ $address->province }} <br>
                                                {{ $address->postal_code }} <br>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <button><a href="/address/{{ $address->id }}/edit"><i class="fa fa-fw fa-pencil-square-o"></i> Edit</a></button>
                                    </div>
                                </div>

                                @else
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td width="130" class="text-gray text-right">Receiver Name</td>
                                                <td><b>{{ $address->receiver_name }}</b></td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray text-right">Receiver Phone Number</td>
                                                <td>{{ $address->receiver_phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray text-right">Receiver Address</td>
                                                <td >{{ $address->address_name }} <br>
                                                {{ $address->city }} <br>
                                                {{ $address->province }} <br>
                                                {{ $address->postal_code }} <br>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <td class="align-bottom" width="90" rowspan="2"><button><a href="/address/{{ $address->id }}/edit"><i class="fa fa-fw fa-pencil-square-o"></i> Edit</a></button></td>
                                            <form action="/address/{{ $address->id }}" class="d-inline" method="POST">
                                                @method('delete')
                                                @csrf
                                                <td class="align-bottom" width="90" rowspan="2"><button type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash-o"></i> Hapus</button> </td>
                                                <td colspan="2"><a href="/address-main/{{ $address->id }}" class="primary-btn mt-5">Set to Main Address</a></td>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                @endif
                                @empty
                                <table class="table table-borderless">
                                    <br>
                                    <tr>
                                        <td class="text-center"><h4>No data! Add your address now.</h4></td>
                                    </tr>
                                </table>
                            @endforelse
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
