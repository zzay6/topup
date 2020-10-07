@extends('layouts.main')
@section('title','Pengguna')
@section('content')
<div class="card border-0 shadow-sm">
	<div class="card-header">
		<h6 class="text-primary mb-0">
			<i>Daftar pengguna</i>
		</h6>
	</div>
	<div class="card-body">
		<div class="d-flex" style="justify-content: space-between;">
			<div class="d-flex">	
				<div class="input-group mb-3" style="width: 250px;">
					<input class="form-control form-control-sm rounded-sm search-input" placeholder="Cari pengguna">
					<div class="input-group-prepend">
						<a class="btn btn-primary p-0 d-flex rounded-sm ml-1 px-2" style="align-items: center; z-index: 0;">Cari</a>
					</div>
				</div>
				<span class="loader d-none ml-3 text-primary">Loading</span>
			</div>
			<div>
				<button class="btn btn-success py-1">Tambahkan produk</button>
			</div>
		</div>

		<div class="bg-secondary rounded-sm mb-3 text-white p-2">
			<span class="px-2">#</span>
			<span class="pl-4">Gambar</span>
			<span></span>
		</div>
		<div class="result">
			
			@foreach($product as $p)
			<div class="border rounded-sm p-2 mb-2 d-flex">
				<h4 class="text-primary d-flex mb-0 px-2 mr-2 border-right" style="align-items: center;">{{ $p->id }}</h4>
				<div class="thumbnail rounded">
					<img src="{{ url('/storage/images') }}/{{ $p->gambar }}" class="">
				</div>
				<div class="d-flex pl-3" style="align-items: center;">
					<div>
						<span class="text-dark" style="font-size: 18px; font-weight: 500;">{{ $p->nama }}</span>
						<br>
						<small class="text-secondary">Dibuat pada : {{ $p->created_at }}</small>
						<br>
						<div>
							<a href="{{ url('admin/product') }}/{{ $p->id }}" class="badge badge-info py-1 px-3 border-0 text-white">Lihat</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</div>
<script type="text/javascript">
	$('.btn-primary').click(function() {
			$('.loader').removeClass('d-none');
			$.ajax({
					url:'{{ url("api/user/get") }}',
					type:'post',
					dataType:'json',
					data:{
							'key' : $('.search-input').val()
					},
					success : function(result) {
							$('.loader').addClass('d-none');
							let user = result;
							$('.result').html('');
							$.each(user, function(no, data){
									$('.result').append	(`
										<div class="border p-2 rounded-sm mb-2">
											<div class="d-flex" style="justify-content: space-between; align-items: center;">
												<input type="checkbox" class="mr-3" value="`+ data.hash +`">
												<div class="">
													<span class="text-primary">
														`+ data.name +`
													</span>
												</div>
												<div class="ml-auto">
													<form class="d-inline" method="post" action="{{ url('admin/user') }}/`+ data.hash +`">
														@csrf
														<button class="badge border-0 badge-warning text-white p-2 px-5">Lihat</button>
													</form>
												</div>
											</div>
										</div>
									`);
							});
					}
			});
	})
</script>
@endsection
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/product.css') }}">
@endsection