@extends('layouts.app')
@section('title',$produk->nama.' - TopupYuk')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/view.css') }}">
@endsection
@section('content')
<div class="container-fluid px-0">
	<div class="alert-primary jumbotron"></div>
	<div class="row w-100 justify-content-center m-auto">
		<div class="col-lg-5 col-xl-4 px-2">
			<div class="bg-white p-1 py-3 rounded-sm shadow-sm mb-3">
				<i>
					<h6 class="text-primary ml-3">Masukan id pemain</h6>
				</i>
				<div class="col-9 col-md-7">
					
					<form>
						<div class="input-group">
							<input type="" name="" class="form-control rounded-sm mr-1 form-control-id">
							<button class="btn btn-primary btn-checkgameid" type="button">Ok</button>
						</div>
					</form>
					<div class="player"></div>
				
				</div>
			</div>
			<div class="bg-white p-2 px-4 rounded-sm shadow-sm mb-3">
				<i>
					<h6 class="text-primary">Pilih channel pembayaran</h6>
				</i>
				<div class="row">
					<div class="col-12 px-0 p-1">
						<div class="card payment" onclick="payment('voucher')">
							<div class="card-body">
								<h6 class="text-primary mb-0 card-title">Voucher</h6>
							</div>
						</div>
					</div>
				</div>
				<small class="text-secondary">Channel pembayaran saat ini hanya tersedia metode voucher</small>
			</div>
		</div>
		<div class="col-lg-7 col-xl-6 px-2">
			<div class="bg-white p-2 rounded-sm shadow-sm">
				<i>
					<h6 class="text-primary">Pilih denomisasi</h6>
				</i>
				<div class="alert alert-info mt-2">
					<small>Pilih channel pembayaran untuk menampilkan pilihan denomisasi</small>
				</div>
				<div class="denomisasi row w-100 m-auto">
				</div>
				<div class="form-group px-1 border-top mt-3 pt-2">
					<i>
						<h6 class="text-secondary pl-1">Alamat email</h6>
					</i>
					<input type="email" name="email" class="form-control form-control-email" placeholder="Email aktif">
				</div>
				<div class="my-3">
					
					<span class="d-flex" style="align-items: flex-end; height: 25px;">
						<small class="text-secondary">Total harga</small>
						<h6 class="text-primary price d-inline mb-0 ml-2" style="font-size: 20px;"></h6>
					</span>
				</div>
				<button class="btn btn-primary w-100 btn-next">Lanjut</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$('.btn-checkgameid').click(function(){
			$.ajax({
					url:'{{ url("/api/checkgameid") }}',
					type:'post',
					dataType:'json',
					data:{
							'player_id' : $('.form-control-id').val()
					},
					success : function(result) {
							$('.player').html(`
									<div class="alert alert-info rounded-0 p-2 mt-2" style="width: auto; max-width: 400px;">
										<small class="text-info">ID pemain   : `+ result.player_id +`</small>
										<br>
										<small class="text-info">Nama pemain : <span class="nickname">`+ result.nickname +`</span></small>
									</div>
							`);
					}
			});
	});

	var paymentChannel;
	function payment(channel){
			paymentChannel = channel;
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
										<div class="col-6 px-0 p-1">
											<div class="card" onclick="denomisasi('`+ data.id +`','`+ data.pulsa_price +`')">
												<div class="card-body p-2">
													<h6 class="text-primary mb-1">`+ data.pulsa_nominal +`</h6>
													<small class="text-secondary">Rp`+ data.pulsa_price +`</small>
												</div>
											</div>
									`);
							});
					}
			});
	}

	var itemSelected;
	function denomisasi(item, price){
			itemSelected = item;
			$('.price').html('Rp'+price);
	}

	$('.btn-next').click(function(){
			$.ajax({
					url:'{{ url("/api/payment/request") }}',
					type:'post',
					dataType:'json',
					data:{
							'payment' : paymentChannel,
							'item' : itemSelected,
							'player_id' : $('.form-control-id').val(),
							'player_zona' : $('.form-control-zona').val(),
							'nickname' : $('.nickname').html(),
							'email' : $('.form-control-email').val()
					},
					success : function(result) {
							window.location.href = result.url;
					}
			});
	});
</script>
@endsection