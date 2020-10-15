@extends('layouts.main')
@section('title','Dashboard')
@section('config')
<style type="text/css">
	
.card-icon {
	font-size: 50px;
	display: flex;
	align-items: center;
}

.table-data {
	overflow-x: auto;
}

.datatable {
	scrollx: true;
}


</style>
@endsection
@section('content')
<div class="row w-100 m-auto">
	<div class="col-lg-6 col-xl-4 px-2">
		<div class="card shadow rounded-sm mb-4 border-0">
			<div class="card-header d-flex" style="align-items: center;">
				<h6 class="text-primary mb-0">Riwayat aktifitas</h6>
				<a href="" class="ml-auto"><small>Lihat selengkapnya</small></a>
			</div>
			<div class="card-body px-4" style="height: 250px; overflow: auto;">


				@foreach($aktifity as $a)
				<div class="d-flex" style="justify-content">
					<div class="d-flex mr-3" style="align-items: center;">
						@if($a->subjek == 'Pengguna baru')
						<div class="rounded-circle bg-primary" style="width: 10px; height: 10px;"></div>
						@elseif($a->subjek == 'Transaksi baru')
						<div class="rounded-circle bg-warning" style="width: 10px; height: 10px;"></div>
						@elseif($a->subjek == 'Transaksi berhasil')
						<div class="rounded-circle bg-success" style="width: 10px; height: 10px;"></div>
						@endif
					</div>
					<div class="text-secondary">
						{{ $a->subjek }}, <span class="text-warning">{{ $a->object }}</span> {{ $a->content }}
						<small class="text-secondary" style="font-size: 11px;">pada : {{ $a->created_at }}</small>
					</div>
				</div>
				<div class="mb-2"></div>
				@endforeach
									
				</div>
			</div>
		</div>
	</div>
				
	<h5 class="text-primary ml-2">Website</h5>	
	<div class="row w-100 m-auto">
		<div class="col-md-6 col-xl-4 px-0 p-2">
			<div class="card bg-warning text-white shadow">
				<div class="card-body d-flex px-4" style="justify-content: space-between; align-items: center;">
					<div class="">
						<h6 class="card-title mb-0" style="color: rgb(250, 240, 100);">Jumlah pengguna</h6>
						<h5 class="mb-0 mt-2">{{ $user }} Pengguna</h5>
					</div>
					<i class="fas fa-users card-icon"></i>
				</div>
				<div class="card-footer border-top-0">
					<a href="{{ url('admin/user') }}" class="text-white">
						<small>Lihat pengguna</small>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4 px-0 p-2">
			<div class="card bg-success text-white shadow">
				<div class="card-body d-flex px-4" style="justify-content: space-between; align-items: center;">
					<div>
						<h6 class="card-title mb-0" style="color: rgb(40, 220, 100);">Jumlah pegawai</h6>
						<h5 class="mb-0 mt-2">{{ $pegawai }} Pegawai</h5>
					</div>
					<i class="card-icon fas fa-headset"></i>
				</div>
				<div class="card-footer border-top-0">
					<a href="{{ url('admin/pegawai') }}" class="text-white">
						<small>Lihat pegawai</small>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4 px-0 p-2">
			<div class="card bg-primary text-white shadow">
				<div class="card-body d-flex px-4" style="justify-content: space-between; align-items: center;">
					<div>
						<h6 class="card-title mb-0" style="color: rgb(0, 223, 255);">Jumlah produk</h6>
						<h5 class="mb-0 mt-2">{{ $product }} Produk</h5>
					</div>
					<i class="card-icon fas fa-box"></i>
				</div>
				<div class="card-footer border-top-0">
					<a href="{{ url('admin/product') }}" class="text-white">
						<small>Lihat produk</small>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4 px-0 p-2">
			<div class="card bg-danger text-white shadow">
				<div class="card-body d-flex px-4" style="justify-content: space-between; align-items: center;">
					<div>
						<h6 class="card-title mb-0" style="color: rgb(290, 83, 129);">Pendapatan(Bulan ini)</h6>
						<h5 class="mb-0 mt-2">Rp1000,000</h5>
					</div>
					<i class="card-icon fas fa-dollar-sign"></i>
				</div>
			<div class="card-footer border-top-0">
				<a href="" class="text-white">
					<small>Lihat riwayat</small>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="row w-100 m-auto pt-5">
	<div class="col px-1">
		
		<div class="card shadow">
			<div class="card-header">
				<i class="text-primary">Transaksi</i>
			</div>

			<div class="card-body table-data w-100">
				<table class="datatable table border nowrap">
					<thead class="bg-light">
						<th>Order ID</th>
						<th>Games</th>
						<th>Items</th>
						<th>Harga Total</th>
						<th>Pembayaran</th>
						<th>Dibuat</th>
						<th>Status</th>
					</thead>
					<tbody>
						@foreach($transactions as $t)
						<tr>
							<td>{{ $t->order_id }}</td>
							<td>{{ $t->provider }}</td>
							<td>{{ $t->nominal }}</td>
							<td>{{ $t->harga }}</td>
							<td>{{ $t->pembayaran }}</td>
							<td>{{ $t->created_at }}</td>
							<td>{{ $t->status }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>

	</div>
</div>
<script type="text/javascript">
	$('.table-data input').addClass('form-control');
</script>
@endsection