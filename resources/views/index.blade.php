@extends('layouts.app')
@section('title','TopupYuk')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/index.css') }}">
@endsection
@section('content')
<div class="container">
	<div class="row justify-content-center">

		@foreach($produk as $p)
		<div class="col-6 col-sm-6 col-md-4 col-lg-3 px-0 p-2">
			<a href="{{ url('games') }}/{{ $p->pulsa_op }}">
				<div class="card rounded-sm shadow-sm border-0">
					<div class="card-image">
						<img src="{{ url('storage/images') }}/{{ $p->gambar }}" class="w-100">
					</div>
					<div class="card-body">
						<h5 class="card-title text-secondary mb-1">{{ $p->nama }}</h5>
						<small class="text-primary">{{ $p->developer }}</small>
					</div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>
@endsection