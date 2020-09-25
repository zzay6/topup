@extends('layouts.app')
@section('title','Akun - TopupYuk')
@section('content')
<div class="container">
	<div class="d-flex" style="align-items: center;">
		<span class="bg-primary pt-1 rounded px-4"></span>
	</div>
	<h5 class="py-2 text-secondary border-bottom">Akun</h5>
	<div class="row">
		<div class="col-12">
			<div class="bg-white shadow-sm rounded-sm p-3 mb-3">
				<div class="rounded-circle bg-primary m-auto">
					<h1 class="text-white mb-0">{{ substr(Auth::user()->name, 0, 1) }}</h1>
				</div>
				<h5 class="text-secondary text-center mt-3">{{ Auth::user()->name }}</h5>
				<div class="row mx-5 ">
					<div class="col-lg-4 px-2 text-center">
						<h3 class="text-warning mb-1 my-2">{{ $transactions }}</h3>
						<small class="text-secondary">Transaksi</small>
					</div>
					<div class="col-lg-4 px-2 text-center">
						<h3 class="text-warning mb-1 my-2">{{ $failed }}</h3>
						<small class="text-secondary">Transaksi gagal</small>
					</div>
					<div class="col-lg-4 px-2 text-center">
						<h3 class="text-warning mb-1 my-2">{{ $success }}</h3>
						<small class="text-secondary">Transaksi berhasil</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="bg-white shadow-sm rounded-sm p-3"></div>
		</div>
	</div>
</div>
@endsection
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/account.css') }}">
@endsection