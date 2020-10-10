@extends('layouts.main')
@section('title',$product->nama)
@section('content')
<div class="card border-0 shadow-sm">
	<div class="card-header bg-white">
		<span class="text-primary">{{ $product->nama }}</span>
	</div>
	<div class="card-body">
		<div class="" style="display: grid; grid-template-columns: 200px 1fr;">
			<div>
				
				<div class="thumbnail rounded-sm">
					<img src="{{ url('/storage/images/products') }}/{{ $product->gambar }}" class="w-100">
				</div>
			</div>
			<div class="pl-4">

				<h4 class="text-dark">{{ $product->nama }}</h4>


				<div class="mt-3">
					
					<small class="text-secondary">Aktifitas</small>
					<div class="d-flex mt-2 justify-content-center">
						<div class="col-md-4 px-0 text-center">
							<h2 class="text-primary">{{ $visitor }}</h2>
							<small class="text-secondary">Pengunjung</small>
						</div>
						<div class="col-md-4 px-0 text-center">
							<h2 class="text-primary">{{ $visitor }}</h2>
							<small class="text-secondary">Pengunjung</small>
						</div>
						<div class="col-md-4 px-0 text-center">
							<h2 class="text-primary">{{ $visitor }}</h2>
							<small class="text-secondary">Pengunjung</small>
						</div>
					</div>
				
				</div>

				<div class="mt-5">
					
					<small class="text-secondary">Aktifitas</small>
					<div class="d-flex mt-2 justify-content-center">
						<div class="col-md-4 px-0 text-center">
							<h2 class="text-primary">{{ $visitor }}</h2>
							<small class="text-secondary">Pengunjung</small>
						</div>
						<div class="col-md-4 px-0 text-center">
							<h2 class="text-primary">{{ $visitor }}</h2>
							<small class="text-secondary">Pengunjung</small>
						</div>
						<div class="col-md-4 px-0 text-center">
							<h2 class="text-primary">{{ $visitor }}</h2>
							<small class="text-secondary">Pengunjung</small>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
@section('config')
<style type="text/css">
	
.content-body {
	top: -250px;
}

.thumbnail {
	width: 180px;
	height: 180px;
	overflow: hidden;
	align-items: center;
}

</style>
@endsection