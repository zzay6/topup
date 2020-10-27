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
		<button class="submit btn btn-primary" onclick="submitFunction()">Lanjut</button>
	</div>

	<div class="response mt-3"></div>
</div>
@endsection
@section('config')
<script type="text/javascript">
	function submitFunction(){

			$('.submit').html(`Lanjut
				<div class="spinner-border text-white spinner-border-sm ml-2" role="status">
				  <span class="sr-only">Loading...</span>
				</div>
			`);

			$.ajax({
					url : '{{ url("/api/payment/payment") }}',
					type : 'post',
					dataType : 'json',
					data : {
							'order_id' : '{{ $data->order_id }}',
							'voucher' : $('.form-voucher').val()
					},
					success : function(result){
						$('.submit').html(`Lanjut`);
						// console.log(result);
						if (result.status == 'failed') {
							
							swal({
								title:result.message,
								text:'Harap coba lagi',
								icon:'warning',
								button:'Tutup'
							});
						
						} else if (result.status == 'success') {

							swal({
								title:result.status,
								text:result.message,
								icon:'success',
								button:'Tutup'
							}).then((v) => {
								window.location.href ="/";
							});

						}
						  
					}
			});
	}

</script>
@endsection