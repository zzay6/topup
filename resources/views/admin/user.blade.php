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
		<div class="input-group mb-3" style="width: 250px;">
			<input class="form-control form-control-sm rounded-sm" placeholder="Cari pengguna">
			<div class="input-group-prepend">
				<a class="btn btn-primary p-0 d-flex rounded-sm ml-1 px-2" style="align-items: center;">Cari</a>
			</div>
		</div>
		@foreach($user as $u)
		<div class="border p-2 rounded-sm mb-2">
			<div class="d-flex" style="justify-content: space-between; align-items: center;">
				<input type="checkbox" class="mr-3" value="{{ $u->hash }}">
				<div class="">
					<span class="text-primary">
						{{ $u->email }}
					</span>
				</div>
				<div class="ml-auto">
					@if($u->status == 'Active')
					<a class="badge badge-success mr-2">{{ $u->status }}</a>
					@else
					<a class="badge badge-danger mr-2">{{ $u->status }}</a>
					@endif
					<form class="d-inline" method="post" action="{{ url('admin/user') }}/{{ $u->hash }}">
						@csrf
						<button class="badge border-0 badge-warning text-white p-2 px-5">Lihat</button>
					</form>
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