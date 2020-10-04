@extends('layouts.main')
@section('title','Pengguna')
@section('content')
<div class="card border-0 shadow">
	<div class="card-header">
		<h6 class="text-primary mb-0">
			<i>Daftar pengguna</i>
		</h6>
	</div>
	<div class="card-body">
		@foreach($user as $u)
		<div class="border rounded-sm p-2">
			<div class="d-flex">
				<div class="d-flex px-2 mr-3" style="align-items: center;">
					<h5 class="text-primary mb-0">
						{{ $u->id }}
					</h5>
				</div>
				<div class="">
					<small class="text-secondary d-block">{{ $u->email }}</small>
					<small class="text-secondary">{{ $u->created_at }}</small>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/user.css') }}">
@endsection