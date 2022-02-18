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
                        @if ( session ('status') )
                            <div class="alert alert-success mb-3 text-center">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ session('status') }}
                                </div>
                            </div>
                            @endif
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>List Product</h3>
                            <a href="{{ url('/products/create') }}" class="icon-primary"><i class="fa fa-fw fa-plus"></i> Add Product</a>
                        </div>
                        <hr class="mt-3 mb-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($products as $key => $product)
                                <tr>
                                    <td class="align-middle">{{ $key + 1 }}</td>
                                    <td class="align-middle"><img src="https://source.unsplash.com/300x300/?{{ $product->category->slug }}" width="60"></td>
                                    <td class="align-middle">{{ $product->name }}</td>
                                    <td class="align-middle">{{ Str::limit($product->description, 15) }}</td>
                                    <td class="align-middle">{{ $product->stock }}</td>
                                    <td class="align-middle">Rp{{ $product->price }}</td>
                                    <td class="align-middle">{{ $product->location }}</td>
                                    <td class="align-middle">
                                        <a class="mr-3" href="{{ url('products/' . $product->id . '/edit') }}"><i class="fa fa-fw fa-pencil-square-o"></i> Ubah</a>
                                        <form action="{{ url('products/'. $product->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure want to delete the product?')">
                                                <i class="fa fa-fw fa-trash-o"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr >
                                        <td >No data!</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
