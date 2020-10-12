<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="aplication:name" content="TopupYuk">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="TopupYuk merupakan platform sebagai tempat topup game populer yang tepat. Buktian seberapa gamer anda, dengan mengikuti beberapa event yang akan dilaksanakan oleh pihak TopupYuk">
		<meta name="copyright" content="&copy; {{ date('Y') }} by TopupYuk">
		<meta name="theme-color" content="#007bff">
		<meta name="title" content="@yield('title')">


		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Coda&display=swap" rel="stylesheet">



		<!-- css fonts -->
		<link rel="stylesheet" type="text/css" href="{{ url('/assets/fonts/fonts.css') }}">



		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ url('/assets/fontawesome/css/all.css') }}">
		<link rel="stylesheet" href="{{ url('/assets/bootstrap/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/main.css') }}">
		@yield('config')

		<link rel="icon" href="{{ url('/assets/images/pubgmobile.jpg') }}">

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<title>@yield('title') - TopupYuk</title>
</head>

<script src="{{ url('/assets/js/jquery-3.4.1.js') }}"></script>

<body class="bg-light">


	<div class="container-fluid px-0">
		<div class="content">
			
			<div class="sidebar bg-white shadow-lg">
				<div class="sidebar-menu pt-5">
					<a class="sidebar-item text-secondary pl-3 mb-4" href="{{ url('/admin/dashboard') }}">	
						<i class="fas fa-home sidebar-icon"></i>
						<span class="sidebar-title pl-3">Dashboard</span>
					</a>
					<a class="sidebar-item text-secondary pl-3 mb-4" href="{{ url('/admin/dashboard') }}">	
						<i class="fas fa-home sidebar-icon"></i>
						<span class="sidebar-title pl-3">Laporan</span>
					</a>
				</div>
			</div>
			<div></div>
			<div class="w-100 part">
				<nav class="navbar navbar-expand-dark bg-primary shadow-sm">
					<h6 class="navbar-brand mb-0 text-white">TopupYuk</h6>
					<div class="ml-auto">
						<div class="navbar-nav d-flex" style="justify-content: flex-end;">
							<span class="rounded btn btn-white py-0 sidebar-toggle">
								<h2 class="text-white">=</h2>
							</span>
						</div>
					</div>
				</nav>

				<div class="jumbotron rounded-0">
				</div>

				<h4 class="text-white pl-4" style="position: relative; top: -300px;">@yield('title')</h4>

				<div class="content-body px-3">

					@yield('content')

				</div>	
			</div>
		
		</div>
	</div>


	<!-- Optional JavaScript -->
	<script src="{{ url('/assets/js/popper.min.js') }}"></script>
	<script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/js/main.js') }}"></script>
</body>
</html>