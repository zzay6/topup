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
				<div class="input-group mb-3" style="width: 250px;">
					<input class="form-control form-control-sm rounded-sm search-input" placeholder="Cari pengguna">
					<div class="input-group-prepend">
						<a class="btn btn-primary btn-search p-0 d-flex rounded-sm ml-1 px-2" style="align-items: center; z-index: 0;">Cari</a>
					</div>
				</div>
				<span class="loader d-none ml-3 text-primary">Loading</span>
			</div>
			<div>
				<button class="btn btn-success btn-modal py-1">Tambahkan produk</button>
				<div class="modal">
					<div class="modal-content border-0 rounded-0">
						<form action="" method="post" enctype="multipart/form-data">
							@csrf	
							<div class="modal-header">
								<h6 class="text-primary">Tambah produk</h6>
							</div>
							<div class="modal-body">
								<small class="text-secondary">Gambar produk</small>
								<div class="input-group mb-3">
									<input type="file" name="product_image" class="@error('product_image') is-invalid @enderror">
								</div>
								<div class="d-none border image-preview"></div>
								<small class="text-secondary">Nama produk</small>
								<div class="input-group mb-3">
									<input type="text" name="product_name" class="form-control text-primary @error('product_name') is-invalid @enderror" placeholder="Nama produk" value="{{ old('product_name') }}">
								</div>
								<small class="text-secondary">Produk kode</small>
								<div class="input-group mb-3">
									<input type="text" name="product_code" class="form-control text-primary @error('product_code') is-invalid @enderror" placeholder="Kode produk" value="{{ old('product_code') }}">
								</div>
								<small class="text-secondary">Developer</small>
								<div class="input-group mb-3">
									<input type="text" name="developer" class="form-control text-primary @error('developer') is-invalid @enderror" placeholder="Developer" value="{{ old('developer') }}">
								</div>
								<small class="text-secondary">Variasi</small>
								<div class="input-group mb-2" id="item-list">
									<input type="text" class="form-control form-control-sm item-name text-primary" placeholder="Nama item">
								</div>
								<div class="input-group mb-2" id="item-list">
									<input type="text" class="form-control form-control-sm item-code text-primary" placeholder="Kode item">
								</div>
								<div class="input-group">
									<input type="text" class="form-control form-control-sm rounded-sm item-price text-primary" placeholder="Harga item">
									<div class="input-group-prepend">
										<span class="btn btn-primary py-0 rounded-sm btn-add-item ml-2">Tambah</span>
									</div>
								</div>
								<hr>
								<div class="modal-scroll">
									<div class="items-list"></div>
								</div>
							</div>
							<div class="modal-footer border-top-0 d-block bg-white"> 
								<span class="btn btn-secondary btn-modal">Batal</span>
								<button class="btn btn-success">Tambahkan</button>
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

		<div class="bg-secondary rounded-sm mb-2 text-white p-2">
			<span class="pl-4">Gambar</span>
			<span></span>
		</div>
		<div class="result">
			
			@foreach($product as $p)
			<div class="border rounded-sm p-2 mb-2 d-flex">
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
			@endforeach

		</div>
	</div>
</div>
<div class="blur d-none"></div>
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

	$('.btn-modal').click(function(){
			$('.modal').toggleClass('popup');
			$('.blur').toggleClass('d-none');
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