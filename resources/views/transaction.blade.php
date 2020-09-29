@extends('layouts.app')
@section('title','Riwayat Transaksi - TopupYuk')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/transactionn.css') }}">
@endsection
@section('content')
<div class="container mt-2">
	<h6 class="text-primary" style="text-shadow: 0 5px 7px #ddd; font-size: 20px;">Ringkasan</h6>
	<div class="row">
		<div class="col-md-6 col-lg-4 px-0 p-2">
			<div class="shadow-sm p-2 rounded-sm card border-primary border-0 pl-3">
				<div class="row">
					<div class="col-7">
						<span class="d-block text-secondary">Total Transaksi</span>
						<h5 class="mt-1 text-primary">6</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-4 px-0 p-2">
			<div class="shadow-sm p-2 rounded-sm card border-danger border-0 pl-3">
				<div class="row">
					<div class="col-7">
						<span class="d-block text-secondary">Transaksi Gagal</span>
						<h5 class="mt-1" style="color: #ff0000;">1</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-4 px-0 p-2">
			<div class="shadow-sm p-2 rounded-sm card border-success border-0 pl-3">
				<div class="row">
					<div class="col-7">
						<span class="d-block text-secondary">Transaksi Menunggu</span>
						<h5 class="mt-1" style="color: #21ff00;">5</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mt-4">
		<div class="bg-white shadow-sm rounded-sm p-3">
			<h6 class="text-primary" style="font-size: 15px; font-weight: 400;">Transaksi terakhir</h6>
			<div class="row mb-4 w-100 m-auto">
				@foreach($last as $l)
				<div class="col-4 px-0 p-1">
					<div class="p-3 rounded-sm border border">
						<h6 class="text-dark">{{ $l->nominal }} {{ $l->provider }}</h6>
					</div>
				</div>
				@endforeach
			</div>


			<h6 class="text-primary mt-3" style="font-size: 15px; font-weight: 400;">Semua Transaksi</h6>
			<div>
				@foreach($trans as $t)
				<div class="border p-3 rounded-sm mt-2">
					<h6 class="text-dark">{{ $t->nominal }}</h6>
				</div>
				@endforeach
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	// $('body').removeClass('bg-light');
</script>
@endsection