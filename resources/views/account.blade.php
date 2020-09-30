@extends('layouts.app')
@section('title','Akun - TopupYuk')
@section('content')
<div class="container">
	<div class="d-flex" style="align-items: center;">
		<span class="bg-primary pt-1 rounded px-4"></span>
	</div>
	<h5 class="py-2 text-warning border-bottom">Akun</h5>
	<div class="row">
		<div class="col-12">
			<div class="bg-white shadow-sm rounded-sm p-3 mb-3">
				<div class="rounded-circle profile-image-large bg-primary m-auto">
					<h1 class="text-white mb-0">{{ substr(Auth::user()->name, 0, 1) }}</h1>
				</div>
				<h5 class="text-secondary text-center mt-3">{{ Auth::user()->name }}</h5>
				<div class="row mx-5">
					<div class="col-6 col-md-3 px-2 text-center m-auto">
						<h3 class="text-warning mb-1 my-2">{{ $transactions }}</h3>
						<small class="text-secondary">Transaksi</small>
					</div>
					<div class="col-6 col-md-3 px-2 text-center m-auto">
						<h3 class="text-warning mb-1 my-2">{{ $failed }}</h3>
						<small class="text-secondary">Transaksi gagal</small>
					</div>
					<div class="col-6 col-md-3 px-2 text-center m-auto">
						<h3 class="text-warning mb-1 my-2">{{ $pendding }}</h3>
						<small class="text-secondary">Menunggu pembayaran</small>
					</div>
					<div class="col-6 col-md-3 px-2 text-center m-auto">
						<h3 class="text-warning mb-1 my-2">{{ $success }}</h3>
						<small class="text-secondary">Transaksi berhasil</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="bg-white shadow-sm rounded-sm p-3">
				<div class="d-flex" style="justify-content: space-between; align-items: center;">
					<div class="d-flex" style="align-items: center;">
						<span class="bg-primary px-3 py-1 rounded"></span>
						<span class="text-secondary ml-2">Data pengguna</span>
					</div>
					<div>
						<button class="btn btn-outline-primary">Edit</button>
					</div>
				</div>
				<hr class="border-primary">
				<div class="row">
					<div class="col-lg-3">
						<div class="mb-4">
							<div class="rounded-circle profile-image-small bg-primary m-auto">
								<h1 class="text-white mb-0">{{ substr(Auth::user()->name, 0, 1) }}</h1>
							</div>
						</div>
					</div>
					<div class="col-11 m-auto col-lg-9">
						<div id="user-profile">
							<div class="mb-3">
								<small class="text-secondary">Nama pengguna</small>
								<h6 class="text-secondary d-inline mb-0 ml-2">{{ Auth::user()->name }}</h6>
							</div>
							<div class="mb-3">
								<small class="text-secondary">Email pengguna</small>
								<h6 class="text-secondary d-inline mb-0 ml-2">{{ Auth::user()->email }}</h6>
							</div>
							<div class="mb-3">
								<small class="text-secondary">Kata sandi</small>
								<h6 class="text-secondary d-inline mb-0 ml-2">
									<a href="">Ubah kata sandi disini!</a>
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.btn-outline-primary').click(function(){
			if($(this).html() == 'Edit'){
					$(this).html('Batal');
					$('#user-profile').html(`
							<form action="" method="post">
								@csrf
								<div class="mb-3">
									<small class="text-secondary">Nama pengguna</small>
									<input name="name" class="form-control" value="{{ Auth::user()->name }}"/>
								</div>
								<div class="mb-3">
									<small class="text-secondary">Email pengguna</small>
									<input name="email" class="form-control" value="{{ Auth::user()->email }}"/>
								</div>
								<div class="mb-3">
									<small class="text-secondary">Kata sandi</small>
									<h6 class="text-secondary d-inline mb-0 ml-2">
										<a href="">Ubah kata sandi disini!</a>
									</h6>
								</div>
								<button class="btn btn-primary">Simpan</button>
							</form>
					`);
			} else {
					$(this).html('Edit');
					$('#user-profile').html(`
							<div class="mb-3">
								<small class="text-secondary">Nama pengguna</small>
								<h6 class="text-secondary d-inline mb-0 ml-2">{{ Auth::user()->name }}</h6>
							</div>
							<div class="mb-3">
								<small class="text-secondary">Email pengguna</small>
								<h6 class="text-secondary d-inline mb-0 ml-2">{{ Auth::user()->email }}</h6>
							</div>
							<div class="mb-3">
								<small class="text-secondary">Kata sandi</small>
								<h6 class="text-secondary d-inline mb-0 ml-2">
									<a href="">Ubah kata sandi disini!</a>
								</h6>
							</div>
					`);
			}
	});
</script>
@endsection
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/account.css') }}">
@endsection