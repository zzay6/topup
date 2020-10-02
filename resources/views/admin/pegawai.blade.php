@extends('layouts.main')
@section('title','Pegawai')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/pegawai.css') }}">
@endsection
@section('content')
<div class="px-2">
	<div class="bg-white shadow-sm rounded-sm p-3">
		<div class="d-flex" style="align-items: center;">
			<h6 class="mb-0">
				<i>Daftar pegawai</i>
			</h6>
			<a class="btn btn-success d-block ml-auto modal-btn">
				Tambah pegawai
			</a>
		</div>
		<div class="modal d-flex">
			<form class="modal-content border-0" action="" method="post">
				<div class="modal-header bg-white">
					<h6 class="text-primary mb-0">Tambah pegawai</h6>
				</div>	
				<div class="modal-body">
					<label class="text-secondary">Nama</label>
					<div class="input-group mb-3">
						<input type="text" name="name" class="form-control">
					</div>
					<label class="text-secondary">Email</label>
					<div class="input-group mb-3">
						<input type="email" name="email" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn btn-secondary modal-btn">Batal</a>
					<button class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="blur"></div>
<script type="text/javascript">
	$('.modal-btn').on('click', function(){
			$('.modal').toggleClass('popup');
	});
</script>
@endsection