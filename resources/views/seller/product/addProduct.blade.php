@extends('layouts.main')

@section('content')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- STORE -->
					<div class="col-md-9">
                        <div id="my-profile">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Tambah Produk</h3>
                                <a href="{{ url('/products') }}" class="icon-primary"><i
                                        class="fa fa-fw fa-angle-left"></i> Kembali</a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="billing-details">
                                        <form action="/products" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td class="text-right align-middle text-gray" width="150">Nama</td>
                                                    <td class="align-middle pl-4"><input class="input" type="text"
                                                            name="name" placeholder="Nama Produk"
                                                            value="">
                                                        <div class="m-2">
                                                            <small
                                                                class="text-left text-danger"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right align-middle text-gray">Harga </td>
                                                    <td class="align-middle pl-4"><input class="input" type="number" min="0"
                                                            name="price" placeholder="Harga"
                                                            value="">
                                                        <div class="m-2">
                                                            <small
                                                                class="text-left text-danger"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right align-middle text-gray">Stok </td>
                                                    <td class="align-middle pl-4"><input class="input" type="number" min="0"
                                                            name="stock" placeholder="Jumlah Stok"
                                                            value="">
                                                        <div class="m-2">
                                                            <small
                                                                class="text-left text-danger"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right align-middle text-gray">Kategori </td>
                                                    <td class="align-middle pl-4">
                                                        <select class="form-control selectric" name="category_id">
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="m-2">
                                                            <small
                                                                class="text-left text-danger"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right align-middle text-gray">Deskripsi</td>
                                                    <td class="align-middle pl-4">
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Deskripsi Barang"></textarea>

                                                        <div class="m-2">
                                                            <small
                                                                class="text-left text-danger"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right align-middle text-gray">Lokasi</td>
                                                    <td class="align-middle pl-4"><input class="input" type="text"
                                                            name="location" placeholder="Nama Kota"
                                                            value="">
                                                        <div class="m-2">
                                                            <small
                                                                class="text-left text-danger"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right align-middle text-gray">Unggah Gambar</td>
                                                    <td class="align-middle pl-4">
                                                        <input class="input" type="file" name="picture">
                                                        <div class="m-2">
                                                            <small
                                                                class="text-left text-danger"></small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="align-middle pl-4"><button class="primary-btn"
                                                            type="submit">Tambah</button></td>
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