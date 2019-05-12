<!DOCTYPE HTML>
<html>
	<head>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122302635-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-122302635-1');
		</script>


        <html lang="{{ app()->getLocale() }}">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- SEO METADATA -->
		<title>Hands On Art Gallery and Studio, bringing creativity to Cape Coral</title>
		<meta name="description" content="Hands On is Cape Coral's most creative art studio and gallery, offering workshops, parties and more!  We specialize in painting and teach people of all ages." />
		<meta name="robots" content="" />
		<meta name="keywords" content="cape coral, fort myers, naples, art, activity, project, paint, painting, walk-in, studio, party, gallery, wine, food, custom, creative, fun, unique, social, private" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- STYLE SHEETS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.css">
		<link rel="icon" href="{{ asset('images/logo.PNG')}}">
		<link rel="stylesheet" href="{{ asset('css/main.css')}}" />

		<!-- Scroll on click -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script>
			$(document).ready(function(){
			// Add smooth scrolling to all links
			$("a").on('click', function(event) {

				// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
				// Prevent default anchor click behavior
				event.preventDefault();

				// Store hash
				var hash = this.hash;

				// Using jQuery's animate() method to add smooth page scroll
				// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
				$('html, body').animate({
					scrollTop: $(hash).offset().top
				}, 800, function(){
			
					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
				} // End if
			});
			});
			</script>

		<!-- Back to top Button -->
			<style>
				.back-to-top {			
					background: none;			
					margin: 0;			
					position: fixed;			
					bottom: 0;			
					right: 0;			
					width: 70px;			
					height: 70px;			
					z-index: 100;			
					display: none;			
					text-decoration: none;			
					color: #e7e7e7;
					padding: 0.5em;			
				}
				.back-to-top i {			
					font-size: 4em;			
				}
			</style>
			<script>
				jQuery(document).ready(function() {			
					var offset = 250;			
					var duration = 800;			
					jQuery(window).scroll(function() {			
						if (jQuery(this).scrollTop() > offset) {			
							jQuery('.back-to-top').fadeIn(duration);			
						} else {			
							jQuery('.back-to-top').fadeOut(duration);			
						}			
					});
					jQuery('.back-to-top').click(function(event) {			
						event.preventDefault();			
						jQuery('html, body').animate({scrollTop: 0}, duration);			
						return false;			
					})			
				});		
			</script>
		
	</head>
	<body>

		<!-- Back to top Button -->
			<a href="#" class="back-to-top"> 
				<i class="fa fa-arrow-circle-up"></i>				 
			</a>

		<!-- Header -->
			<div id="page-wrapper">
				<div class="wrapper">
					<div class="inner">

						<!-- Header -->
							<header id="header">
								<img src="{{ asset('images/logo.PNG') }}" alt="logo" class="img-responsive" style="margin-right: 1rem; padding: 0.4rem; height: 3rem; width: 3rem;">
								<a href="{{ url('/') }}" class="logo" style="padding-top: 0.5rem; text-decoration: none;">
									<div style="font-family: Papyrus, fantasy; display: inline;">Hands On</div> <span>Art Gallery & Studio </span></a>
								<nav>
									<ul>
										<li style="padding-top: 0.5rem"><a href="#menu">Menu</a></li>
									</ul>
								</nav>
							</header>

						<!-- Nav -->
							<nav id="menu">
								<ul class="links">
                                    <li><a href="/">Info</a></li>
									<li><a href="{{ route('calendar') }}">Calendar</a></li>
									<li><a href="{{ url('gallery/all') }}">Gallery</a></li>

									<!-- Guests -->
                                    @if (Auth::guest())
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
									<!-- Users -->
                                    @else
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li class="dropdown">
										<a href="{{ route('logout_user') }}">
											Logout
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
                                        </li>
                                    @endif
									<li><a href="https://www.google.com/search?q=Hands%20On%20Art%20Gallery%20and%20Studio%20in%20Cape%20Coral#lrd=0x88db3f27a52cad61:0x528479ef28ac595b,3,,,">Review us</a></li>
									<center>
										<a href="https://www.facebook.com/handsonartgalleryandstudio/" target="_blank" style="border-bottom: none !important; cursor: inherit !important; text-decoration: none !important;">
											<button class="btn btn-default"><span class="icon fa-facebook"/></button>
										</a>
									</center>
								</ul>
							</nav>

						@yield('content')

						<!-- Footer -->
							<div class="wrapper">
								<div class="inner">

									<!-- Footer -->
										<footer id="footer">
											<ul class="contact-icons">
												<li class="icon fa-home">1625 SE 47th Terrace Cape Coral, FL 33904</li>
												<li class="icon fa-phone">(239) 233-5662</li>
												<li class="icon fa-envelope-o">HandsOnArtGalleryAndStudio@gmail.com</li>
											</ul>
											<br>
											<ul class="contact-icons">
												<li style="display: inline;"><a href="https://www.facebook.com/handsonartgallery/" target="_blank"><button class="btn btn-primary"><span class="icon fa-facebook"/></button></a></li>
											</ul>
											<p class="copyright">&copy; Hands On. All rights reserved.<br>Made by Matthew Bluestein</p>
										</footer>

								</div>
							</div>
						<!-- /Footer -->
					</div>
				</div>
			</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/skel.min.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.js"></script>
	<!-- Timepicker -->
	<script type="text/javascript">
        $(document).ready(function() {
            $('#timepicker_start').timepicker({
                showLeadingZero: false,
                timeFormat: 'h:mm p',
                interval: 15
            });
            $('#timepicker_end').timepicker({
                showLeadingZero: false,
                timeFormat: 'h:mm p',
                interval: 15
            });
        });
	</script>
</body>
</html>
