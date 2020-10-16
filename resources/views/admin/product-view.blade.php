@extends('layouts.main')
@section('title',$product->nama)
@section('content')
<div class="card border-0 shadow">
	<div class="card-header bg-white">
		<span class="text-primary">{{ $product->nama }}</span>
	</div>
	<div class="card-body">
		<div class="thumbnail d-flex rounded mb-4">
			<img class="w-100" src="{{ url('storage/images/products') }}/{{ $product->gambar }}">
		</div>
		<div class="">
			<ul class="list-group mb-4">
				<h6 class="text-primary">Rincian</h6>
			  <li class="list-group-item">
			  	<h6 class="text-dark mb-0">{{ $product->nama }}</h6>
			  </li>
			  <li class="list-group-item">Terjual : {{ $selled }}</li>
			  <li class="list-group-item">Pengunjung : {{ $visitor }}</li>
			  <li class="list-group-item">Dibuat pada : {{ $product->created_at }}</li>
			</ul>


			<ul class="list-group mb-4">
				<h6 class="text-primary">Variasi</h6>
				<div class="row w-100 m-auto">	
					@foreach($items as $i)
					<div class="col-md-6 px-0 p-1">
					    <li class="list-group-item">
					    	<div class="d-flex" style="justify-content: space-between; align-items: center;">	
					    		<span>
					    			{{ $i->pulsa_nominal }}<br>
					    			<small>{{ 'Rp'.number_format($i->pulsa_price) }}</small>
					    		</span>
					    		<small>
					    			<a class="mr-2 edit_item" data-id="{{ $i->id }}" data-toggle="modal" data-target="#exampleModal">Edit</a>
					    			<a class="drop_item" data-id="{{ $i->id }}" data-toggle="modal" data-target="#exampleModal">Hapus</a>
					    		</small>
					    	</div>
					    </li>
					</div>
				    @endforeach
				</div>
			</ul>
		</div>
 	</div>


 	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>





<script type="text/javascript">
	$('.edit_item').click(function() {
		$('.modal-body').html(`
			<div class="text-center">
				<div class="spinner-border text-primary" role="status">
				</div>
			</div>
		`);

		$.ajax({
			url:'{{ url("api/getitem") }}',
			type:'post',
			dataType:'json',
			data:{
				'item' : $(this).data('id')
			},
			success : function(response){
				$('.modal-dialog').html(`
					<form action="{{ url('admin/update') }}/`+ response[0].id +`" method="post">
						<div class="modal-content">
						  <div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						      <span aria-hidden="true">&times;</span>
						    </button>
						  </div>
						  <div class="modal-body">
						    @csrf
						    @method('put')
						  	<input type="text" name="item_code" class="form-control mb-3" placeholder="Kode item" value="`+ response[0].pulsa_code +`">
						  	<input type="text" name="item_nominal" class="form-control mb-3" placeholder="Nominal item" value="`+ response[0].pulsa_nominal +`">
						  	<input type="text" name="item_price" class="form-control" placeholder="Harga item" value="`+ response[0].pulsa_price +`">
						  </div>
						  <div class="modal-footer">
						    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						    <button class="btn btn-primary">Simpan</button>
						  </div>
						</div>
					</form> 
				`);
			}
		});
	});


	$('.drop_item').click(function(){
		 $('.modal-body').html(`
			<div class="text-center">
				<div class="spinner-border text-primary" role="status">
				</div>
			</div>
		`);

		 $('.modal .btn-primary').hide();

		 $.ajax({
			 	url:'{{ url("api/deleteitem") }}',
			 	type:'post',
			 	dataType:'json',
			 	data: {
			 		'item' : $(this).data('id')
			 	},
			 	success : function(response){
			 		$('.modal-body').html(`
			 			<h6 class="text-success text-center">Item berhasil di hapus</h6>
			 		`);


			 		$('.btn-secondary').click(function(){
			 			window.location.href = "";
			 		});
			 	}
		 });
	});


</script>
@endsection
@section('config')
<style type="text/css">

.list-group > * {
	font-family: arial;
}

.content-body {
	top: -250px;
}

.thumbnail {
	width: 180px;
	height: 180px;
	overflow: hidden;
	align-items: center;
}

.card-body {
	display: grid;
	grid-template-columns: 180px 1fr;
	grid-gap: 20px;
}


@media (max-width: 768px){
	.card-body {
		display: block;
	}
}

</style>
@endsection