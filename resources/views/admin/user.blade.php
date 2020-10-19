@extends('layouts.main')
@section('title','Pengguna')
@section('content')
<div class="row w-100 m-auto">
	<div class="col-md-6 col-lg-4 px-0 p-1">
		
		<div class="card bg-primary mb-3 shadow">
			<div class="card-body">
				<div class="text-white d-flex">
					<span>
					Pengguna ditemukan <br>
					<h2>{{ $result }}</h2>
					</span>
					<h1 class="ml-auto" style="font-size: 3em">
						<i class="fas fa-user"></i>
					</h1>
				</div>
			</div>
		</div>
	
	</div>
</div>

<div class="card border-0 shadow">
	<div class="card-header">
		<h6 class="text-primary mb-0">
			<i>Daftar pengguna</i>
		</h6>
	</div>
	<div class="card-body">
		<div class="d-flex">
			
		<div class="input-group mb-3" style="width: 250px;">
			<input class="form-control form-control-sm rounded-sm search-input" placeholder="Cari pengguna">
			<div class="input-group-prepend">
				<a class="btn btn-primary p-0 d-flex rounded-sm ml-1 px-2" style="align-items: center; z-index: 0;">Cari</a>
			</div>
		</div>
		<span class="loader d-none ml-3 text-primary">Loading</span>
		</div>
		<div class="result">
			
			@foreach($user as $u)
			<div class="border p-2 rounded-sm mb-2">
				<div class="d-flex" style="justify-content: space-between; align-items: center;">
					<input type="checkbox" class="mr-3" value="{{ $u->hash }}">
					<div class="">
						<span class="text-primary">
							{{ $u->name }}
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
</div>
<script type="text/javascript">
	$('.btn-primary').click(function() {
			$('.loader').removeClass('d-none');
			$.ajax({
					url:'{{ url("api/user/get") }}',
					type:'post',
					dataType:'json',
					data:{
							'key' : $('.search-input').val()
					},
					success : function(result) {
							$('.loader').addClass('d-none');
							let user = result;
							$('.result').html('');
							$.each(user, function(no, data){
									$('.result').append	(`
										<div class="border p-2 rounded-sm mb-2">
											<div class="d-flex" style="justify-content: space-between; align-items: center;">
												<input type="checkbox" class="mr-3" value="`+ data.hash +`">
												<div class="">
													<span class="text-primary">
														`+ data.name +`
													</span>
												</div>
												<div class="ml-auto">
													<form class="d-inline" method="post" action="{{ url('admin/user') }}/`+ data.hash +`">
														@csrf
														<button class="badge border-0 badge-warning text-white p-2 px-5">Lihat</button>
													</form>
												</div>
											</div>
										</div>
									`);
							});
					}
			});
	})
</script>
@endsection