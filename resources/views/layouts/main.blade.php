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

		<nav class="navbar navbar-expand-dark bg-white w-100 shadow">
			<h6 class="navbar-brand mb-0 text-primary">Website name</h6>
			<div class="ml-auto">
				<div class="navbar-nav d-flex" style="justify-content: flex-end;">
					<span class="rounded btn btn-white py-0 sidebar-toggle">
						<i class="text-primary fas fa-bars" style="font-size: 20px;"></i>
					</span>
				</div>
			</div>
		</nav>


		<div class="content">
			
			<div class="sidebar bg-white shadow-lg">
				<div class="sidebar-menu px-3">
			
					<h6 class="text-secondary mb-3" style="opacity: 0.7;">Menu</h6>

					<div class="accordion mb-4" id="accordionExample">
					  <h2 class="mb-0">
					   <button class="btn btn-block text-left text-secondary dropdown-toggle p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					   		<span>
					      	<i class="far fa-file sidebar-icon"></i>
									<a class="sidebar-title d-inline text-secondary">Halaman</a>
					   		</span>
					    </button>
					  </h2>
					 	<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
					    <div class="border-left my-2 mb-4 ml-2">	
								<a class="sidebar-item" href="{{ url('admin/dashboard') }}">
									<span class="text-secondary py-2 pl-3">Dashboard</span>
								</a>
								<a class="sidebar-item" href="profile.html">	
									<span class="text-secondary py-2 pl-3">Umpan balik</span>
								</a>
								<a class="sidebar-item" href="">	
									<span class="text-secondary py-2 pl-3">Jadwal</span>
								</a>
							</div>
					  </div>
					

					  <br>


					  <h2 class="mb-0">
					   <button class="btn btn-block text-left text-secondary dropdown-toggle p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					   		<span>
					      	<i class="fas fa-user sidebar-icon"></i>
									<a class="sidebar-title d-inline text-secondary">Pribadi</a>
					   		</span>
					    </button>
					  </h2>
					 	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					    <div class="border-left my-2 mb-4 ml-2">	
								<a class="sidebar-item" href="index.html">
									<span class="text-secondary py-2 pl-3">Profile</span>
								</a>
								<a class="sidebar-item" href="profile.html">	
									<span class="text-secondary py-2 pl-3">Notifikasi</span>
								</a>
								<a class="sidebar-item" href="">	
									<span class="text-secondary py-2 pl-3">Aktifitas</span>
								</a>
							</div>
					  </div>

					  <br>


					  <h2 class="mb-0">
					   <button class="btn btn-block text-left text-secondary dropdown-toggle p-0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					   		<span>
					      	<i class="fas fa-database sidebar-icon"></i>
									<a class="sidebar-title d-inline text-secondary">Database</a>
					   		</span>
					    </button>
					  </h2>
					 	<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					    <div class="border-left my-2 mb-4 ml-2">	
								<a class="sidebar-item" href="index.html">
									<span class="text-secondary py-2 pl-3">Produk</span>
								</a>
								<a class="sidebar-item" href="profile.html">	
									<span class="text-secondary py-2 pl-3">Pengguna</span>
								</a>
								<a class="sidebar-item" href="">	
									<span class="text-secondary py-2 pl-3">Transaksi</span>
								</a>
							</div>
					  </div>



					  <br>


					  <h2 class="mb-0">
					   <button class="btn btn-block text-left text-secondary dropdown-toggle p-0" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					   		<span>
					      	<i class="fas fa-chart-bar sidebar-icon"></i>
									<a class="sidebar-title d-inline text-secondary">Website</a>
					   		</span>
					    </button>
					  </h2>
					 	<div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					    <div class="border-left my-2 mb-4 ml-2">	
								<a class="sidebar-item" href="index.html">
									<span class="text-secondary py-2 pl-3">Aktifitas</span>
								</a>
								<a class="sidebar-item" href="profile.html">	
									<span class="text-secondary py-2 pl-3">Log table</span>
								</a>
								<a class="sidebar-item" href="">	
									<span class="text-secondary py-2 pl-3">Transaksi</span>
								</a>
							</div>
					  </div>


					</div>
				</div>
			</div>
			<div></div>
			<div class="w-100 part">
				

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