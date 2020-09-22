@extends('layouts.app')
@section('title',$produk->nama.' - TopupYuk')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/view.css') }}">
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 px-2">
			<div class="bg-white p-1 py-3 rounded-sm shadow-sm mb-3">
				<i>
					<h6 class="text-primary ml-3">Masukan id pemain</h6>
				</i>
				<div class="col-9 col-md-8">
					
					<form>
						<div class="input-group">
							<input type="" name="" class="form-control rounded-sm mr-1">
							<button class="btn btn-primary">Ok</button>
						</div>
					</form>
				
				</div>
			</div>
			<div class="bg-white p-2 px-4 rounded-sm shadow-sm mb-3">
				<i>
					<h6 class="text-primary">Pilih channel pembayaran</h6>
				</i>
				<div class="row">
					<div class="col-6 px-0 p-1">
						<div class="card payment" onclick="payment('voucher')">
							<div class="card-body">
								<h6 class="text-primary mb-0 card-title">Voucher</h6>
							</div>
						</div>
					</div>
					<div class="col-6 px-0 p-1">
						<div class="card payment" onclick="payment('indomaret')">
							<div class="card-body">
								<h6 class="text-primary mb-0 card-title">Indomaret</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 px-2">
			<div class="bg-white p-2 rounded-sm shadow-sm">
				<i>
					<h6 class="text-primary">Pilih denomisasi</h6>
				</i>
				<div class="input-group">
					<select class="form-control border-primary text-primary denomisasi">
						<option>Denomisasi</option>
					</select>
				</div>
				<div class="alert alert-info mt-2">
					Pilih channel pembayaran untuk menampilkan pilihan denomisasi
				</div>
				<button class="btn btn-primary w-100 btn-next">Lanjut</button>
				<div class="ordered mt-3"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function payment(channel){
			$.ajax({
					url:'{{ url("api/getitems") }}',
					type:'post',
					dataType:'json',
					data:{
							'product' : '{{ $produk->pulsa_op }}',
							'channel' : channel
					},
					success : function(result){
							$('.denomisasi').html('');
							$.each(result, function(i, data){
									$('.denomisasi').append(`
											<option value='`+ data.id +`' onclick='denomisasi("`+ data.id +`")'>`+ data.pulsa_nominal +`</option>
									`);
							});
					}
			});
	}

	$('.denomisasi').click(function(){
			$.ajax({
					url:'{{ url("api/getitem") }}',
					type:'post',
					dataType:'json',
					data:{
							'item' : $('.denomisasi').val()
					},
					success : function(result){
							console.log(result);
							document.querySelector('.nominal').innerHTML = result.pulsa_nominal;
					}
			});
	});

	$('.btn-next').click(function(){
			$('.ordered').html(`
					<div class="bg-light p-2 border">
						<div class="mb-3">
							<small class="text-secondary">Nama pemain</small>
							<h6 class="text-secondary nickname"></h6>
						</div>
						<div class="mb-3">
							<small class="text-secondary">Denomisasi</small>
							<h6 class="text-secondary nominal"></h6>
						</div>
					</div>
			`);
	});
</script>
@endsection