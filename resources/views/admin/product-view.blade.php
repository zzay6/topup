@extends('layouts.main')
@section('title',$product->nama)
@section('content')
<div class="card border-0 shadow-sm">
	<div class="card-header bg-white">
		<span class="text-primary">{{ $product->nama }}</span>
	</div>
	<div class="card-body">
		
	</div>
</div>
@endsection
@section('config')
<style type="text/css">
	
.content-body {
	top: -250px;
}

.thumbnail {
	width: 180px;
	height: 180px;
	overflow: hidden;
	align-items: center;
}

</style>
@endsection