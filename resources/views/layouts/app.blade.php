<!DOCTYPE html>
<html lang="en">
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
		<link rel="stylesheet" type="text/css" href="{{ url('/assets/css/app.css') }}">

		<link rel="icon" href="{{ url('/assets/images/pubgmobile.jpg') }}">

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<title>@yield('title')</title>
	</head>

	<script src="{{ url('/asset/fontawesome/js/all.js') }}"></script>
	<script src="{{ url('/assets/js/jquery-3.4.1.js') }}"></script>
	@yield('config')

	<body class="bg-light" id="top">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8MCFTJ"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->


		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light w-100 py-2 shadow-sm">
			<div>
				<a class="btn border border-0 mr-2 btn-search text-primary p-0 pb-1" onclick="btn_search()"><i class="fas fa-search"></i></a>
				<a class="navbar-brand text-primary NanumGothic-700" href="{{ url('/') }}">TopupYuk</a>
			</div>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-secondary Coda-400" href="{{ url('/') }}">
						<div class="icon"><i class="fas fa-home"></i></div>
						<span>Beranda</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-secondary Coda-400" href="{{ url('/transaction') }}">
						<div class="icon"><i class="fas fa-clock"></i></div>
						<span>Riwayat</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-secondary Coda-400" href="{{ url('/account') }}">
						<div class="icon"><i class="fas fa-user"></i></div>
						<span>Akun</span>
					</a>
				</li>
			</ul>
			<div class="d-flex" style="align-items: center;">
				@guest
				<div class="user-profile mr-4">
			        <li class="nav-item mr-2">
			          <a class="nav-link btn btn-primary" href="{{ route('login') }}">{{ __('Masuk') }}</a>
			        </li>
			        @if (Route::has('register'))
			        <li class="nav-item">
			          <a class="nav-link btn btn-primary" href="{{ route('register') }}">{{ __('Daftar') }}</a>
			        </li>
			        @endif
				</div>
      			@else
		      	<div class="user-profile mr-4">
			        <li class="nav-item mr-2">
			          <a class="nav-link btn btn-primary">{{ substr(Auth::user()->name, 0, 5) }}</a>
			        </li>
			        <li class="nav-item">
			        	<form class="d-inline" action="{{ route('logout') }}" method="post">
			        		@csrf
			          	<button class="nav-link btn btn-danger">{{ __('Keluar') }}</button>
			        	</form>
			        </li>
		      	</div>
		      	@endguest
				<i class="text-primary fas fa-bars ml-4 sidebar-toggle" style="font-size: 20px;"></i>

				

			</div>
		</nav>



		<div class="p-2 sidebar-menu shadow bg-white">
			<div class="cross-toggle rounded ml-2 bg-danger sidebar-toggle">
				<span class="bg-white toggle"></span>
				<span class="bg-white toggle"></span>
			</div>
			<nav>
				<ul style="list-style: none;">
					<li class="mb-4">
						<a>
							<span></span>
							<span><a href="{{ url('/login') }}">Masuk</a> / <a href="{{ url('/register') }}">Daftar</a></span>
						</a>
					</li>
					<li class="mb-4">
						<a href="">
							<span></span>
							<span>Bantuan / Hubungi</span>
						</a>
					</li>
					<li class="mb-4">
						<a href="">
							<span></span>
							<span>Riwayat Transaksi</span>
						</a>
					</li>
					<li class="mb-4">
						<a href="">
							<span></span>
							<span>Event oleh TopupYuk</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>


		<div class="mt-5 pt-3"></div>
		@yield('content')



		<div class="bg-white border-top p-3 mt-5 text-dark px-4">
			<div class="row" style="position: static;">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 px-0">
					<div class="border-0">
						<div class="card-body" style="position: static;">
							<h5 class="card-title">Games</h5>
							<span class="d-block text-secondary">Pubg Mobile</span>
							<span class="d-block text-secondary">Free Fire</span>
							<span class="d-block text-secondary">Mobile Legend</span>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 px-0">
					<div class="border-0">
						<div class="card-body" style="position: static;">
							<h5 class="card-title">Hubungi kami</h5>
							<span class="d-block text-secondary">
								<a href="" class="text-secondary">Email : support@topupyuk.com</a>
							</span>
							<span class="d-block text-secondary">
								<a href="" class="text-secondary">WhatsApp : +62 8810 247 33250 (Zacky)</a>
							</span>
							<span class="d-block text-secondary"></span>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 px-0">
					<div class="border-0">
						<div class="card-body" style="position: static;">
							<h5 class="card-title">Media Sosial</h5>
							<span class="d-block text-secondary">Pubg Mobile</span>
							<span class="d-block text-secondary">Free Fire</span>
							<span class="d-block text-secondary">Mobile Legend</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer border-top text-secondary p-2" id="footer" style="background: #eee;">
			<small class="">&copy; Copyright 2020 - {{ date('Y') }} | <b>TopupYuk</b> - PT IskandarMahfudzJaya</small>
		</div>



		<!-- Optional JavaScript -->
		<script src="{{ url('/assets/js/popper.min.js') }}"></script>
		<script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript">

			$(window).scroll(function(){
				$('.breadcrumb').removeClass('d-block');
				$('.breadcrumb').addClass('d-none');
			});


			$('.sidebar-toggle').click(function(){
				$('.sidebar-menu').toggleClass('slide');
			});

			
			function btn_search(){
				const navbar_brand = document.querySelector('.navbar-brand');
				if(navbar_brand.innerHTML == 'TopupYuk'){
					navbar_brand.innerHTML = `<form action="{{ url('/result') }}" method="get"><input class="form-control form-control-sm border-primary" type="search" name="result"></form>`;
					navbar_brand.removeAttribute('href');
					document.querySelector('.btn-search').innerHTML = '<i class="fas fa-times"></i>';
				} else if(navbar_brand.innerHTML == `<form action="{{ url('/result') }}" method="get"><input class="form-control form-control-sm border-primary" type="search" name="result"></form>`){
					navbar_brand.innerHTML = 'TopupYuk';
					navbar_brand.setAttribute('href','{{ url("/") }}');
					document.querySelector('.btn-search').innerHTML = '<i class="fas fa-search"></i>';
				}
			}
		</script>
	</body>
</html>