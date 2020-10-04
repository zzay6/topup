@extends('layouts.main')
@section('title','Lihat')
@section('content')
<div class="card border-0 shadow">
	<div class="card-header">
		<h6 class="mb-0 text-primary">Profile pengguna</h6>
	</div>
	<div class="card-body">
		<div class="d-flex mb-3" style="justify-content: space-between; align-items: center;">
			<div>
			</div>
			<div>
				<a class="btn btn-success text-white">Transaksi</a>
				<a class="btn btn-warning text-white btn-modal-1">Kirim email</a>
			</div>
		</div>
		<div class="modal modal-1 d-flex">
			<form class="modal-content border-0 shadow" action="{{ url('admin/pegawai/add') }}" method="post">
				@csrf
				<div class="modal-header bg-white">
					<h6 class="text-primary mb-0">Buat pesan</h6>
				</div>	
				<div class="modal-body">
					<label class="text-secondary">Subjek</label>
					<div class="input-group mb-3">
						<input type="text" name="subject" class="form-control">
					</div>
					<div class="mt-3">
						<label class="text-secondary">Pesan</label>
						<textarea class="border w-100 p-2" style="height: 200px;"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<a class="btn btn-secondary btn-modal-1">Batal</a>
					<button class="btn btn-warning text-white px-4">Kirim</button>
				</div>
			</form>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-3 col-xl-2">
				
			</div>
			<div class="col-lg-9 col-xl-10">	
				<table class="table mb-0 border">
					<tbody class="">
						<tr>
							<td style="width: 190px;">Nama</td>
							<td>{{ $user->name }}</td>
						</tr>
						<tr>
							<td style="width: 190px;">Email</td>
							<td>{{ $user->email }}</td>
						</tr>
						<tr>
							<td style="width: 190px;">Daftar pada</td>
							<td>{{ $user->created_at }}</td>
						</tr>
						<tr>
							<td style="width: 190px;">Terakhir diubah</td>
							<td>{{ $user->updated_at }}</td>
						</tr>
					</tbody>
				</table>
				<a style="cursor: pointer;" class="badge badge-danger border-0 p-2 btn-modal-2 mt-2 ml-auto">Non aktifkan</a>
				<div class="modal modal-2 d-flex">
					<form class="modal-content border-0 shadow" action="" method="post">
						@csrf
						@method('delete')
						<div class="modal-header bg-white">
							<h6 class="text-primary mb-0">Peringatan</h6>
						</div>	
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<a class="btn btn-secondary btn-modal-2">Batal</a>
							<button class="btn btn-danger text-white px-4">Non aktifkan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="blur"></div>
<script type="text/javascript">
	$('.btn-modal-1').click(function() {
			$('.modal-1').toggleClass('popup');
	});

	$('.btn-modal-2').click(function() {
			$('.blur').toggleClass('popup');
			$('.modal-2').toggleClass('popup');
	});
</script>
@endsection
@section('config')
<style type="text/css">
.text-white.pl-4 {
	display: none;
}

.modal {
	position: fixed;
	top: -100%;
	transition: all 0.2s;
}

.modal-content {
	width: 100%;
	background: #fff;
	opacity: 100%!important;
}

.modal.popup, .blur.popup {
	top: 0;
}

textarea {
	outline: 0;
}

.blur {
	width: 100%;
	height: 100%;
	position: fixed;
	top: -100%;
	left: 0;
	background: #000;
	opacity: 0.2;
	z-index: 1;
}

.modal-2 {
	display: flex;
	justify-content: center;
	align-items: center;
}

.modal-2 .modal-content {
	width: 90%;
	max-width: 500px;
	height: auto;
}
</style>
@endsection