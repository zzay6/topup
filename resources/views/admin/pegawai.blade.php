@extends('layouts.main')
@section('title','Pegawai')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/pegawai.css') }}">
@endsection
@section('content')
<div class="px-2">
	<div class="bg-white shadow rounded-sm px-0" style="overflow: hidden;">
		<div class="d-flex border-bottom px-3 py-2" style="align-items: center;">
			<h6 class="mb-0">
				<i>Daftar pegawai</i>
			</h6>
			<a class="btn btn-success d-block ml-auto modal-btn">
				Tambah pegawai
			</a>
		</div>
		<div class="modal d-flex">
			<form class="modal-content border-0 shadow" action="{{ url('admin/pegawai/add') }}" method="post">
				@csrf
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
					<label class="text-secondary">Hak akses</label>
					<select class="form-control" name="roll">
						<option>Admin</option>
						<option>Customer Service</option>
						<option>Administrasi</option>
						<option>Devops</option>
					</select>
				</div>
				<div class="modal-footer">
					<a class="btn btn-secondary modal-btn">Batal</a>
					<button class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>

		<div class="mt-2 p-3">
			<div class="d-flex">


				<div class="input-group ml-auto" style="width: 250px;">
					<input type="text" name="key" class="form-control form-control-sm key rounded-sm" placeholder="Cari pegawai">
					<div class="input-group-prepend">
						<span class="btn btn-primary text-white py-0 d-flex rounded-sm ml-2" style="align-items: center; z-index: 0">Cari</span>
					</div>
				</div>
			</div>

			<div style="overflow: auto; width: 100%; max-height: 300px;">
				
				<table class="table mt-2 border">
					<thead class="bg-success text-white">
						<th>#</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Jabatan</th>
						<th>Status</th>
						<th>Aksi</th>
					</thead>
					<tbody>

						@forelse($pegawai as $p)
						<tr class="text-primary">
							<td>{{ $p->id }}</td>
							<td>{{ $p->name }}</td>
							<td>{{ $p->email }}</td>
							<td>{{ $p->roll }}</td>
							<td>{{ $p->status }}</td>
							<td>
								@if($p->status == 'Pendding')
								<form class="d-inline" action="{{ url('admin/pegawai/accept') }}" method="post">
									@csrf
									<input type="hidden" name="pegawai" value="{{ $p->id }}" readonly>
									<button class="badge badge-warning text-white border-0 p-2">Terima</button>
								</form>
								@else
								<a href="" class="badge badge-warning text-white border-0 p-2">Lihat</a>
								@endif
								<form class="d-inline" action="{{ url('admin/pegawai/delete') }}" method="post">
									@csrf
									<input type="hidden" name="pegawai" value="{{ $p->id }}" readonly>
									<button class="badge badge-danger border-0 p-2">Hapus</button>
								</form>
							</td>
						</tr>
						@empty

						<div class="alert aert-warning">
							<strong>Data tidak di temukan</strong>
						</div>

						@endforelse


					</tbody>
				</table>
			
			</div>
		</div>
	</div>
</div>
<div class="blur"></div>
<script type="text/javascript">
	$('.modal-btn').on('click', function(){
			$('.blur').toggleClass('popup');
			$('.modal').toggleClass('popup');
	});


	$('.btn-primary').click(function() {
			$.ajax({
					url:'{{ url("api/pegawai/get") }}',
					type:'post',
					dataType:'json',
					data:{
							'key' : $('.key').val()
					},
					success: function(result) {
							$('tbody').html('');
							let pegawai = result;
							$.each(pegawai, function(index, data) {
									$('tbody').append(`
											<tr class="text-primary">
												<td>`+ index +`</td>
												<td>`+ data.name +`</td>
												<td>`+ data.email +`</td>
												<td>`+ data.roll +`</td>
												<td>`+ data.status +`</td>
												<td>
													<a href="" class="badge badge-warning text-white p-2">Edit</a>
													<form class="d-inline" action="{{ url('admin/pegawai/delete') }}" method="post">
														@csrf
														<input type="hidden" name="pegawai" value="{{ $p->id }}" readonly>
														<button class="badge badge-danger border-0 p-2">Hapus</button>
													</form>
												</td>
											</tr>
									`);
							});
					}
			});
	});
</script>
@endsection