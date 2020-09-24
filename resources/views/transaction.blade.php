@extends('layouts.app')
@section('title','Riwayat transaksi')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/transactionn.css') }}">
@endsection
@section('content')
<div class="container-fluid">
	<?php if (Auth::user()) { ?>
	<div class="row">
		<div class="col-lg-4 ml-auto">
			<div class="card shadow-sm border-0 mb-3">
				<div class="card-header bg-primary p-2 text-white">Transaksi</div>
				<div class="card-body">
					<div class="mb-2" style="display: flex; align-items:  flex-end; justify-content: space-between;">
						<span class="text-secondary">Total transaksi</span>
						<h2 class="text-warning mb-0 ml-2">{{ $dataNum }}</h2>
					</div>
					<div style="display: flex; align-items:  flex-end; justify-content: space-between;">
						<span class="text-secondary">Total transaksi selesai</span>
						<h2 class="text-warning mb-0 ml-2">{{ $success }}</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-7 m-auto transaction">
			<div class="">
				
				@foreach($data as $d)
				<?php 
				if($d->status == 'success'){

						$status = 'badge-success';

				} else if ($d->status == 'pendding') {

						$status = 'badge-warning';
				
				} else if ($d->status == 'failed') {

						$status = 'badge-danger';
				
				}
				?>
				<div class="card mb-2 rounded-0">
					<div class="card-header d-flex p-2">
						<form class="d-inline" action="{{ url('transaction/delete') }}/{{ $d->order_id }}" method="post">
							@csrf
							<button class="d-inline border-0 text-danger" style="background: none;">Hapus</button>
							<span class="badge {{ $status }} text-white">{{ $d->status }}</span>
						</form>
						<span class="text-dark">Subtotal <h6 class="d-inline">Rp{{ $d->harga }}</h6></span>
					</div>
					<div class="card-body">
						<h6 class="text-dark mb-0">
							<span class="">{{ $d->nominal }}</span>
						</h6>
						<small class="text-primary">{{ $d->provider }}</small>

						<div class="border-top mt-3 pt-3">
							<div class="col-12 col-lg-11 m-auto">
								
								<div class="d-flex transactions-detail mb-2" style="align-items: flex-end;">
									<span class="text-primary">Player ID</span>
									<h5 class="text-secondary d-inline">{{ $d->player_id }}</h5>
								</div>
								<div class="d-flex transactions-detail" style="align-items: flex-end;">
									<span class="text-primary">Pembayaran</span>
									<h5 class="text-secondary d-inline">{{ $d->pembayaran }}</h5>
								</div>

							</div>
						</div>

					</div>
					<small class="text-secondary p-2 ml-auto">Di lakukan pada {{ $d->created_at }}</small>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<?php } else { ?>
	<div class="d-grid">

		<div class="border bg-white rounded-0 col-lg-5 m-auto text-center">
			<h5 class="text-danger mt-2 pb-2 border-bottom">Peringatan!</h5>

			<div class="p-3">
				

				<div class="alert alert-warning" style="text-align: left;">
					Sepertinya anda belum masuk..<br>
					<small>Masuk sekarang untuk melihat riwayat transaksi</small>
				</div>
				
				<a href="{{ url('/login') }}" class="btn btn-warning">
					<h5 class="text-white mb-0">Masuk sekarang</h5>
				</a>

			</div>
		</div>
	</div>
	<?php } ?>
</div>
@endsection