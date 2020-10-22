@extends('layouts.main')
@section('title','Voucher')
@section('config')
@endsection
@section('content')
<div class="card border-0 shadow">
	<div class="card-body">
		<h5 class="mb-0">Voucher</h5>
		<hr>		
		<div class="row">
			<div class="col-lg-4 pr-4">

				<div class="card bg-warning mb-3">
					<div class="card-body text-white p-3">
						<span style="font-size: 14px;">Voucher Aktif</span>
						<h5 class="mb-0">{{ $count }}</h5>
					</div>
				</div>

				<div class="card bg-primary">
					<div class="card-body text-white p-3">
						<span style="font-size: 14px;">Voucher Aktif</span>
						<h5 class="mb-0">{{ $count }}</h5>
					</div>
				</div>

			</div>

			<div class="col-lg-8">
				<ul class="list-group">
					@foreach($data as $d)
					<li class="list-group-item" style="list-style: none;">
						<div class="d-flex" style="justify-content: space-between;">
							<span class="text-secondary">{{ $d->voucher }}</span>

							<div>
								@if($d->saldo > 0 )
								<span class="badge badge-success p-2">Aktif</span>
								@else
								<span class="badge badge-danger p-2">Habis</span>
								@endif
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection