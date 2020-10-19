@extends('layouts.main')
@section('title','Permintaan HTTP')
@section('config')
<style type="text/css">
	.logging-parent .card-body {
		max-height: 80vh;
		overflow-y: auto;
	}
</style>
@endsection
@section('content')
<div class="row">
	<div class="col-xl-8">
		
		<div class="card border-0 shadow logging-parent">
			<div class="card-header text-primary bg-white">
				Permintaan HTTP
			</div>
			<div class="card-body">
				<div class="text-center">Memuat...</div>
			</div>
		</div>


	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$.getJSON('{{ url("http/get") }}', function(result){
			$.each(result, function(i, data){
				$('.logging-parent .card-body').append(`
					<div class="card mb-2 logging">
						<div class="card-body">
							<span class="text-dark">
								<span class="badge badge-info">POST</span>
								http://localhost:8000/admin/user/843895d21372b13a2d76089dcbb4e0b85f4dcc3b5aa765d61d8327deb882cf99
							</span>
							<br>
							<small class="text-secondary">2020-10-04 10:02:23</small>
						</div>
					</div>
				`);
			});
		});

	});
</script>
@endsection