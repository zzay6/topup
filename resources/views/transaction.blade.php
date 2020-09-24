@extends('layouts.app')
@section('title','Riwayat transaksi')
@section('config')
<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/trasaction.css') }}">
@endsection
@section('content')
<div class="container">
	<?php if(Auth::user()){ ?>
	@foreach($data as $d)
	<div class="card">
		<div class="p-2">
			<h5 class="text-primary">{{ $d->email }}</h5>
		</div>
	</div>
	@endforeach
	<?php } else { ?>
		<h1>Harap login</h1>
	<?php } ?>
</div>
@endsection