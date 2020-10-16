@extends('layouts.main')
@section('title','Produk')
@section('content')
<div class="card border-0 shadow-sm">
	<div class="card-header">
		<h6 class="text-primary mb-0">
			<i>Daftar pengguna</i>
		</h6>
	</div>
	<div class="card-body">
		<div class="form-group">
			<div class="d-flex">	
				<div class="input-group mb-2" style="width: 250px;">
					<input class="form-control form-control-sm rounded-sm search-input" placeholder="Cari pengguna">
					<div class="input-group-prepend">
						<a class="btn btn-primary btn-search p-0 d-flex rounded-sm ml-1 px-2" style="align-items: center; z-index: 0;">Cari</a>
					</div>
				</div>
				<span class="loader d-none ml-3 text-primary">Loading</span>
			</div>
			<div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
				  Tambah produk
				</button>

				<!-- Modal -->
				<div class="modal fade" id="staticBackdrop">
				  	<div class="modal-dialog modal-dialog-scrollable">
						<form action="" method="post" enctype="multipart/form-data" class="w-100">
						    <div class="modal-content m-auto">
							    <div class="modal-header">
							      	<h6 class="modal-title" id="staticBackdropLabel">
							      		<i class="text-primary">Tambah produk</i>
							      	</h6>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          	<span aria-hidden="true">&times;</span>
							        </button>
							    </div>
						     	<div class="modal-body">
						     		@csrf

								    <label for="exampleFormControlInput1">Gambar</label>
								    <input type="file" name="product_image" class="mb-3">

								    <label for="exampleFormControlInput1">Nama produk</label>
								    <input type="text" name="product_name" class="form-control mb-3 @error('product_name') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('product_name') }}">

								    <label for="exampleFormControlInput1">Developer</label>
								    <input type="text" name="developer" class="form-control mb-3 @error('developer') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('product_name') }}">


								    <label for="exampleFormControlInput1">Kode Produk</label>
								    <input type="text" name="product_code" class="form-control mb-3 @error('product_code') is-invalid @enderror" placeholder="Kode Produk" value="{{ old('product_code') }}">

								    <hr>

								    <small class="text-secondary">Variasi</small>
								    <input type="text" class="form-control form-control-sm item-name mb-3 " placeholder="Nama item">
								    <input type="text" class="form-control form-control-sm item-code mb-3 " placeholder="Kode item">
								    <input type="text" class="form-control form-control-sm item-price mb-3 " placeholder="Harga item">
								    <span class="btn btn-primary btn-add-item py-1">Tambah</span>

								    <div class="items-list"></div>

						      	</div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button class="btn btn-primary">Unggah</button>
							    </div>
							</div>
						</form>
				  	</div>
				</div>
			</div>
		</div>
		@if(session('gagal'))
		<div class="alert alert-danger">
			<strong>Gagal!, </strong>
			<span>{{ session('gagal') }}</span>
		</div>
		@endif

		@if(session('success'))
		<div class="alert alert-success">
			<strong>Berhasil!, </strong>
			<span>{{ session('success') }}</span>
		</div>
		@endif

		<div class="result row w-100 m-auto">
			
			@foreach($product as $p)
			<div class="col-lg-6 px-0 p-1">
				<div class="border rounded-sm p-2 d-flex">
					<div class="thumbnail rounded">
						<img src="{{ url('/storage/images/products') }}/{{ $p->gambar }}" class="">
					</div>
					<div class="d-flex pl-3" style="align-items: center;">
						<div>
							<span class="text-dark" style="font-size: 18px; font-weight: 500;">{{ $p->nama }}</span>
							<br>
							<small class="text-secondary">Dibuat pada : {{ $p->created_at }}</small>
							<br>
							<div>
								<a href="{{ url('admin/product') }}/{{ $p->pulsa_op }}/view" class="badge badge-info py-1 px-3 border-0 text-white">Lihat</a>
								<form action="{{ url('admin/product') }}/{{ $p->pulsa_op }}/delete" method="post" class="d-inline">
									@csrf
									@method('delete')
									<button class="badge badge-danger border-0 py-1 px-3 border-0 text-white">Hapus</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</div>
<script type="text/javascript">
	$('.btn-search').click(function() {
			$('.loader').removeClass('d-none');
			$.ajax({
					url:'{{ url("api/product/get") }}',
					type:'post',
					dataType:'json',
					data:{
							'key' : $('.search-input').val()
					},
					success : function(result) {
							$('.loader').addClass('d-none');
							let product = result;
							$('.result').html('');
							$.each(product, function(no, data){
									$('.result').append	(`
										<div class="border rounded-sm p-2 mb-2 d-flex">
											<h4 class="text-primary d-flex mb-0 px-2 mr-2 border-right" style="align-items: center;">`+ no +`</h4>
											<div class="thumbnail rounded">
												<img src="{{ url('/storage/images/products') }}/`+ data.gambar +`" class="">
											</div>
											<div class="d-flex pl-3" style="align-items: center;">
												<div>
													<span class="text-dark" style="font-size: 18px; font-weight: 500;">`+ data.nama +`</span>
													<br>
													<small class="text-secondary">Dibuat pada : `+ data.created_at +`</small>
													<br>
													<div>
														<a href="{{ url('admin/product') }}/`+ data.id +`" class="badge badge-info py-1 px-3 border-0 text-white">Lihat</a>
													</div>
												</div>
											</div>
										</div>
									`);
							});
					}
			});
	});


	var no = 0;

	$('.btn-add-item').click(function() {
			let name = $('.item-name').val();
			let code = $('.item-code').val();
			let price = $('.item-price').val();

			var list = no++;

			$('.items-list').append(`
					<div class="mb-3 list border p-2 d-flex" id="list`+ list +`">
						<div>
							<input value="`+ name +`" class="border-0 border-bottom" name="item_name[]">
							<br>
							<input value="`+ code +`" class="border-0 border-bottom" name="item_code[]">
							<br>
							<input value="`+ price +`" class="border-0 border-bottom" name="item_price[]">
						</div>
						<div class="d-flex" style="align-items: flex-end;">
							<button class="remove-list remove-list-`+ list +`" type="button" onclick="removeList('`+ list +`')">Hapus</button>
						</div>
					</div>
					
			`);


	});
	
	function removeList(lists) {
			let list = document.getElementById('list'+lists);
			let itemsList = document.querySelector('.item-list');
			list.remove();
	}

	@error('product_name')
	$('.modal').toggleClass('popup');
	$('.blur').toggleClass('d-none');
	@enderror
	@error('product_code')
	$('.modal').toggleClass('popup');
	$('.blur').toggleClass('d-none');
	@enderror
	@error('developer')
	$('.modal').toggleClass('popup');
	$('.blur').toggleClass('d-none');
	@enderror
	@error('item_name')
	$('.modal').toggleClass('popup');
	$('.blur').toggleClass('d-none');
	@enderror
	@error('item_price')
	$('.modal').toggleClass('popup');
	$('.blur').toggleClass('d-none');
	@enderror
	@error('item_code')
	$('.modal').toggleClass('popup');
	$('.blur').toggleClass('d-none');
	@enderror

</script>
@endsection
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/product.css') }}">
@endsection