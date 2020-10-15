@extends('layouts.main')
@section('title',$product->nama)
@section('content')
<div class="card border-0 shadow">
	<div class="card-header bg-white">
		<span class="text-primary">{{ $product->nama }}</span>
	</div>
	<div class="card-body">
		<div class="thumbnail d-flex rounded mb-4">
			<img class="w-100" src="{{ url('storage/images/products') }}/{{ $product->gambar }}">
		</div>
		<div class="">
			<ul class="list-group mb-4">
				<h6 class="text-primary">Rincian</h6>
			  <li class="list-group-item">
			  	<h6 class="text-dark mb-0">{{ $product->nama }}</h6>
			  </li>
			  <li class="list-group-item">Terjual : {{ $selled }}</li>
			  <li class="list-group-item">Pengunjung : {{ $visitor }}</li>
			  <li class="list-group-item">Dibuat pada : {{ $product->created_at }}</li>
			  <li class="list-group-item">Terakhir diubah : {{ $product->updated_at }}</li>
			</ul>


			<ul class="list-group mb-4">
				<h6 class="text-primary">Variasi</h6>
				@foreach($items as $i)
			  <li class="list-group-item">{{ $i->pulsa_nominal }}</li>
			  @endforeach
			</ul>
		</div>
 	</div>
</div>
@endsection
@section('config')
<style type="text/css">

.list-group > * {
	font-family: arial;
}

.content-body {
	top: -250px;
}

.thumbnail {
	width: 180px;
	height: 180px;
	overflow: hidden;
	align-items: center;
}

.card-body {
	display: grid;
	grid-template-columns: 180px 1fr;
	grid-gap: 20px;
}


@media (max-width: 768px){
	.card-body {
		display: block;
	}
}

</style>
@endsection