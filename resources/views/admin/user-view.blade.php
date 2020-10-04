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
			<a class="btn btn-warning text-white btn-modal">Kirim email</a>
		</div>
		<div class="modal d-flex">
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
					<a class="btn btn-secondary btn-modal">Batal</a>
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
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.btn-modal').click(function() {
			$('.blur').toggleClass('popup');
			$('.modal').toggleClass('popup');
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
</style>
@endsection