@extends('layouts.app')
@section('title','Pembayaran - TopupYuk')
@section('content')
<style type="text/css">
	.navbar {
		display: none;
	}

	.footer {
		margin-bottom: 0;
	}

	.breadcrumb {
		display: none;
	}

	.container {
		min-height: 60vh;
		padding-top: 10px;
	}

	.content, .response {
		width: 95%;
		max-width: 500px;
		margin: auto;
	}

	.form-control {
		text-align: center;
	}
</style>
<div class="container">
	<h3 class="text-primary text-center mb-3">TopupYuk Voucher</h3>
	<div class="bg-white p-3 content m-auto shadow-sm rounded">
		<div class="alert alert-info">
			<span>Pembayaran untuk <h6 class="d-inline">{{ $data->nominal.' '.$data->provider }}</h6></span>
			<br>
			<small>Item akan dikirim setelah pembayaran berhasil</small>
		</div>
		<div class="form-group">
			<h6 class="text-secondary">Kode Voucher</h6>

			<div class="input-group">
				<input type="number" class="form-voucher form-control">
			</div>
		</div>
		<button class="sumbit btn btn-primary" onclick="submitFunction()">Lanjut</button>
	</div>

	<div class="response mt-3"></div>
</div>
@endsection
@section('config')
<script type="text/javascript">
	function submitFunction(){
			$.ajax({
					url : '{{ url("/api/payment/payment") }}',
					type : 'post',
					dataType : 'json',
					data : {
							'order_id' : '{{ $data->order_id }}',
							'voucher' : $('.form-voucher').val()
					},
					success : function(result){
						  console.log(result);
						  const response = document.querySelector('.response');
						  if(result.status == 'Berhasil'){

								response.innerHTML = 	`
										  <div class="bg-white rounded-sm p-3 shadow-sm">
												<h6 class="border-bottom mx-2 mb-2 pb-2">Laporan transaksi</h6>
												<div class="alert alert-success">
													<span class="">Pembelian untuk <h6 class="d-inline">`+ result.data.item+' '+ result.data.provider +`</h6> Berhasil di lakukan</span>
												</div>
												<div class="mt-1 bg-light p-2 border rounded-sm">
													<div class="text-dark mb-2">
														<span>Denomisasi :</span>
														<h6>`+ result.data.item +`</h6>
													</div>
													<div class="text-dark mb-2">
														<span>Provider :</span>
														<h6>`+ result.data.provider +`</h6>
													</div>
													<div class="text-dark mb-2">
														<span>Nama pemain :</span>
														<h6>`+ result.data.nickname +`</h6>
													</div>
													<div class="row border-top w-100 mx-2 m-auto">
														<div class="col-6 text-center">
															<span>Harga total</span>
															<h6>Rp `+ result.data.harga +`</h6>
														</div>
														<div class="col-6 text-center">
															<span>Sisa voucher</span>
															<h6>Rp `+ result.data.saldo_voucher +`</h6>
														</div>
													</div>
												</div>
												<a href="{{ url('/') }}" class="badge badge-info mt-1 px-3 py-2">Beranda</a>
											</div>
								`;
						  } else if(result.status == 'Gagal'){
							  response.innerHTML = `
								<div class="bg-white p-3 rounded-sm shadow-sm">
									<h6 class="border-bottom mx-2 mb-2 pb-2">Laporan transaksi</h6>
									<div class="alert alert-danger">`+ result.message +`</div>
									<a href="{{ url('/') }}" class="badge badge-info mt-1 px-3 py-2">Beranda</a>
								</div>
							  `;
						  }
					}
			});
	}

</script>
@endsection