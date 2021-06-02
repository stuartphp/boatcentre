<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>BoatCentre / @yield('title', 'Home')</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="telephone=no" name="format-detection">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" href="/css/master.css?{{ md5(time()) }}">
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<!--[if lt IE 9 ]>
<script src="js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
<meta content="no" http-equiv="imagetoolbar">
<![endif]-->
@livewireStyles
</head>

<body class="page">
	<!-- Loader-->
	<div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
	<!-- Loader end-->
	<div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
		@livewire('site.top-search')
		<!-- ==========================-->
		<!-- MOBILE MENU-->
		<!-- ==========================-->
		<div data-off-canvas="mobile-slidebar left overlay">
			<ul class="navbar-nav">
				<li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item "><a class="nav-link" href="/Showroom">About</a></li>
                <li class="nav-item "><a class="nav-link" href="/accesories">Accesories</a></li>
                 <!-- <li class="nav-item "><a class="nav-link" href="/services">Services</a></li> -->
				<li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
				<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <li class="nav-item "><a class="nav-link" href="/register">Register</a></li>
			</ul>
		</div>
		<header class="header header-slider">
			<div class="top-bar">
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-auto">
							<div class="top-bar__item"><i class="fas fa-phone-square"></i> Phone: +27 83 230 3935 </div>
							<div class="top-bar__item"><i class="fas fa-envelope-square"></i> Email: info@boatcentre.co.za</div>
						</div>
						<div class="col-auto">
							<ul class="header-soc list-unstyled">
								{{-- <li class="header-soc__item"><a class="header-soc__link" href="#" target="_blank"><i class="ic fab fa-twitter"></i></a></li> --}}
								<li class="header-soc__item"><a class="header-soc__link" href="https://www.facebook.com/www.bassboats.co.za" target="_blank"><i class="ic fab fa-facebook-f"></i></a></li>
								{{-- <li class="header-soc__item"><a class="header-soc__link" href="#" target="_blank"><i class="ic fab fa-instagram"></i></a></li> --}}
								<li class="header-soc__item"><a class="header-soc__link" href="https://www.youtube.com/user/bassboatscentre" target="_blank"><i class="ic fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="header-main">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-auto">
							<a class="navbar-brand navbar-brand_light scroll" href="/"> <img class="normal-logo img-fluid" src="{{ asset('images/logo-light.png')}}" alt="logo"> </a>
							<a class="navbar-brand navbar-brand_dark scroll" href="/"><img class="normal-logo img-fluid" src="{{ asset('images/logo-dark.png')}}" alt="logo"></a>
						</div>
						<div class="col-auto d-xl-none">
							<!-- Mobile Trigger Start-->
							<button class="menu-mobile-button js-toggle-mobile-slidebar toggle-menu-button"><i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i></button>
							<!-- Mobile Trigger End-->
						</div>
						<div class="col-xl d-none d-xl-block">
							<nav class="navbar navbar-expand-lg justify-content-end" id="nav">
								<ul class="yamm main-menu navbar-nav">
									<li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'open' : '' }}" href="/">Home</a> </li>
                                    <li class="nav-item "><a class="nav-link" href="/showroom">Showroom</a> </li>
                                    <li class="nav-item "><a class="nav-link" href="/accesories">Accesories</a> </li>

									{{--<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#">Services</a>
										<div class="dropdown-menu">
                                            <a class="dropdown-item" href="listing.html">Boats Insurance</a>
                                            <a class="dropdown-item" href="listing-sidebar.html">Boats Loans</a>
                                            <a class="dropdown-item" href="details.html">Boats Transport</a>
                                            <a class="dropdown-item" href="details.html">Boats Warranty</a>
                                            <a class="dropdown-item" href="details.html">Boats Documentation</a>
                                        </div>
									</li>
                                     <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="tours.html">Our Tours</a>
										<div class="dropdown-menu">
                                            <a class="dropdown-item" href="tours.html">Tours Listing</a>
                                            <a class="dropdown-item" href="tour.html">Tour Details</a>
                                        </div>
									</li>
									<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#">News</a>
										<div class="dropdown-menu">
                                        <a class="dropdown-item" href="blog.html">Blog main</a>
                                        <a class="dropdown-item" href="blog-grid.html">Blog grid</a>
                                        <a class="dropdown-item" href="post.html">Blog post</a>
                                        </div>
									</li> --}}
									<li class="nav-item"><a class="nav-link {{ request()->is('contact-us') ? 'open' : '' }}" href="/contact-us">Contact  Us</a></li>
									@auth
                                        <li class="nav-item"><a class="nav-link " href="/admin/home">Admin</a></li>
                                    @else
                                        <li class="nav-item"><a class="nav-link {{ request()->is('login') ? 'open' : '' }}" href="/login">Login</a></li>
									    <li class="nav-item"><a class="nav-link {{ request()->is('register') ? 'open' : '' }}" href="/register">Register</a></li>
                                    @endauth

								</ul>
                                <button class="header-main__btn btn btn-secondary">Sell Your Boat</button>
								{{-- <span class="header-main__link btn_header_search"><i class="ic icon-magnifier"></i></span> --}}
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- end .header-->
 @yield('content')
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="footer-section">
							<a class="footer__logo" href="/"><img class="img-fluid" src="/images/logo-light.png" alt="Logo"></a>
							<div class="footer-info">
                                Established in 1998 , was borne with the passion of boating and fishing by the owner and CEO Shandon Hawman.
                            </div>
						</div>
						<section class="footer-section">
							<h3 class="footer-section__title footer-section__title_sm">Subscribe Newsletter</h3>
							<form class="footer-form">
								<div class="form-group">
									<input class="footer-form__input form-control" type="email" placeholder="your email"><i class="ic far fa-envelope-open"></i></div>
							</form>
						</section>
					</div>
					<div class="col-lg-3 col-md-6">
						<section class="footer-section footer-section_link pl-5">
							<h3 class="footer-section__title">Boat Services</h3>
							<ul class="footer-list list-unstyled">
								<li><a href="/showroom">Showroom</a></li>
								 <li><a href="/accesories">Accesories</a></li>
								{{--<li><a href="#">Yacht Party Event</a></li>
								<li><a href="#">Corporate Event</a></li>
								<li><a href="#">Fishing Cruiser</a></li>
								<li><a href="#">Overnight Stay</a></li>
								<li><a href="#">Birthday Party Yacht</a></li>
								<li><a href="#">Boar Rentals</a></li> --}}
							</ul>
						</section>
					</div>
					<div class="col-lg-3 col-md-6">
						<section class="footer-section footer-section_link footer-section_link_about">
							<h3 class="footer-section__title">About Us</h3>
							<ul class="footer-list list-unstyled">
								<li><a href="#"> Home</a></li>
								{{-- <li><a href="#">Services</a></li>
								<li><a href="#">About us</a></li>
								<li><a href="#">Boat Fleet</a></li>
								<li><a href="/asscesories">Accesories </a></li>
								<li><a href="#">Contact us</a></li>
								<li><a href="#">Buy or Sell Boats</a></li>
								<li><a href="#">Featured Vehicles</a></li> --}}
							</ul>
						</section>
					</div>
					<div class="col-lg-3 col-md-6">
						<section class="footer-section">
							<h3 class="footer-section__title">Get In Touch</h3>
							<div class="footer-contacts">
								<div class="footer-contacts__item"><i class="ic icon-location-pin"></i>16 Smith St, Rynfield, Benoni, Gauteng, South Africa 1501</div>
								<div class="footer-contacts__item"><i class="ic icon-envelope"></i><a href="mailto:info@boatcentre.co.za">info@boatcentre.co.za</a></div>
								<div class="footer-contacts__item"><i class="ic icon-earphones-alt"></i> Phone: <a class="footer-contacts__phone" href="tel:+27832303935">+27 83 230 3935</a> </div>
							</div>
							<ul class="footer-soc list-unstyled">
								{{-- <li class="footer-soc__item"><a class="footer-soc__link" href="#" target="_blank"><i class="ic fab fa-twitter"></i></a></li> --}}
								<li class="footer-soc__item"><a class="footer-soc__link" href="https://www.facebook.com/www.bassboats.co.za" target="_blank"><i class="ic fab fa-facebook-f"></i></a></li>
								{{-- <li class="footer-soc__item"><a class="footer-soc__link" href="#" target="_blank"><i class="ic fab fa-instagram"></i></a></li> --}}
								<li class="footer-soc__item"><a class="footer-soc__link" href="https://www.youtube.com/user/bassboatscentre" target="_blank"><i class="ic fab fa-youtube"></i></a></li>
							</ul>
                            {{-- <a class="btn btn-white" href="#">confirm booking</a> </section> --}}
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">&copy; 2020 BoatCentre. All rights reserved. Designed and hosted by <a href="https://itecassist.co.za" target="_blank">iTec Assist</a></div>
			</div>
		</footer>
		<!-- .footer-->
	</div>
	<!-- end layout-theme-->
	<!-- ++++++++++++-->
	<!-- MAIN SCRIPTS-->
	<!-- ++++++++++++-->
	<script src="/libs/jquery-3.3.1.min.js"></script>
	<script src="/libs/jquery-migrate-1.4.1.min.js"></script>
	<!-- Bootstrap-->
	<script src="/plugins/popever/popper.min.js"></script>
	<script src="/libs/bootstrap-4.1.3/js/bootstrap.min.js"></script>
	<!---->
	<!-- Color scheme-->
	<script src="/plugins/switcher/js/dmss.js"></script>
	<!-- Select customization & Color scheme-->
	<script src="/libs/bootstrap-select.min.js"></script>
	<!-- Pop-up window-->
	<script src="/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- Headers scripts-->
	<script src="/plugins/headers/slidebar.js"></script>
	<script src="/plugins/headers/header.js"></script>
	<!-- Mail scripts-->
	<script src="/plugins/jqBootstrapValidation.js"></script>
	<!-- Progress numbers-->
	<script src="/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="/plugins/rendro-easy-pie-chart/jquery.waypoints.min.js"></script>
	<!-- Animations-->
	<script src="/plugins/scrollreveal/scrollreveal.min.js"></script>
	<!-- Scale images-->
	<script src="/plugins/ofi.min.js"></script>
	<!-- Main slider-->
	<script src="/plugins/slider-pro/jquery.sliderPro.min.js"></script>
	<!-- Sliders-->
	<script src="/plugins/slick/slick.js"></script>
	<!-- Slider number-->
	<script src="/plugins/noUiSlider/wNumb.js"></script>
	<script src="/plugins/noUiSlider/nouislider.min.js"></script>
	<!-- User customization-->
	<script src="/js/custom.js"></script>
	@livewireScripts
    @yield('scripts')
</body>
</html>
