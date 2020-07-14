
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Hanamaster</title>
	<meta content="" name="descriptison">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="/assets/img/logo.png" rel="icon">
	<link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="/assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/5088649f40.js" crossorigin="anonymous"></script>
	<!-- Template Main CSS File -->
	<link href="/assets/css/style.css" rel="stylesheet">
	<link href="/assets/css/custom.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp - v2.0.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top " >
		<div class="container d-flex align-items-center justify-content-between" style="height: 70px">

			{{-- <h1 class="logo"><a href="index.html">Gp<span>.</span></a></h1> --}}
			{{-- Uncomment below if you prefer to use an image logo --}}
			<a href=""  style="height: 50px;">
				<img src="assets/img/logo.png" alt="" style="height: 66px; width: 158px" >
			</a>

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li class="active"><a href="#hero" >Home</a></li>
					<li class="drop-down"><a href="#about" >About Us</a>
						<ul>
							<li><a href="#company_profile" >Company Profile</a></li>
							<li><a href="#who_we_are" >Who We Are</a></li>
							<li><a href="#our_values" >Our Values</a></li>
							<li><a href="#iso_section" >ISO certification</a></li>
						</ul>
					</li>
					<li ><a href="#services" >Our Services</a></li>
					<li><a href="#market" >Our Market</a></li>
					<li><a href="#careers" >Careers</a></li>
					<li><a href="#contact_us" >Contact Us</a></li>

				</ul>
			</nav><!-- .nav-menu -->
		</div>
	</header><!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center justify-content-center">
		<div class="container" data-aos="fade-up">

			<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
				<div class="col-xl-6 col-lg-8">
					<h1>Delivering values for your innovation.</h1>
					<h2 style="font-size:18px">PT Hana Master Jaya (HMJ) is an established Indonesian Electronic Manufacturing Service (EMS) company, specializing in manufacturing of auto insert, Surface Mount Technology (SMT) Process, printed circuit boards (PCB) assembly, transformer assembly and metal stamping for the electronic industry. The company has been active in this market since 1996.</h2>
					<br>
					<a  href="#who_we_are" class="btn btn-outline-light"><h4 style="margin-bottom: 0px">Learn More</h4></a>
				</div>
			</div>
		</div>
	</section><!-- End Hero -->

	<main id="main">
		<!-- ======= Company Profile ======= -->
		
		@include('section.about_us')
		<!-- ======= Services Section ======= -->
		<section id="" class="services">
			<div class="container" data-aos="fade-up">

				<div class="section-title">
					<h2>Our Services</h2>

				</div>

				<div class="row">
					<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
						<div class="icon-box">
							<div class="icon"><i class="bx bxl-dribbble" style="color: white;"></i></div>
							<h4><a href="">Surface Mount Technology (SMT)</a></h4>
							<p>State-of-the-art equipment for SMT, plant's utilities that was enhanced with clean environment, and plenty experience.</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
						<div class="icon-box">
							<div class="icon"><i class="bx bx-file" style="color: white;"></i></div>
							<h4><a href="">Metal Stamping</a></h4>
							<p>Over 5 years experience in custom manufacturing in steel, aluminum, copper, and other metals.</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="300">
						<div class="icon-box">
							<div class="icon"><i class="bx bx-tachometer" style="color: white;"></i></div>
							<h4><a href="">Wire Harness</a></h4>
							<p>Complete solutions including prototyping, validation and manufacturing of wiring harnesses for electrical and electronic equipment.</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="400">
						<div class="icon-box">
							<div class="icon"><i class="bx bx-world" style="color: white;"></i></div>
							<h4><a href="">Power Transformer Assembly</a></h4>
							<p>Our power transformers are built with copper windings in a circular configuration and are continuous disc and/or helical in design which  helps to ensure quality and reliability throughout the internal structure of the transformer.</p>
						</div>
					</div>
				</div>
			</div>
		</section><!-- End Services Section -->

		<!-- ======= our Services Section ======= -->
		@include("section.our_services")
		<!-- End Our Services Section -->

		@include("section.market")

		<!-- ======= Team Section ======= -->
		@include("section.careers")
		<!-- ======= Contact Section ======= -->
		@include("section.contact_us")
		

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-3 col-md-6">
						<div class="footer-info">
							<h3>Hanasmaster<span>.</span></h3>
							<p>
								Jl. Cibingbin, No. 99 Desa Laksana Mekar, RT 03/RW03, Laksanamekar, Padalarang, Kabupaten Bandung Barat,Jawa Barat 40553,Indonesia
								<strong>Phone:</strong> +62 22 6865432<br>
								<strong>Email:</strong> info@hanamaster.co.id<br>
							</p>
							<div class="social-links mt-3">
								<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
								<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
								<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
								<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
								<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Our Services</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Our Market</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Careers</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>

		<div class="container">
			<div class="copyright">
				&copy; Copyright 2020. PT. Hana Master Jaya
			</div>
			<div class="credits">

			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="/assets/vendor/jquery/jquery.min.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="/assets/vendor/php-email-form/validate.js"></script>
	<script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="/assets/vendor/venobox/venobox.min.js"></script>
	<script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="/assets/vendor/counterup/counterup.min.js"></script>
	<script src="/assets/vendor/aos/aos.js"></script>

	<!-- Template Main JS File -->
	<script src="/assets/js/main.js"></script>
	<script src="/assets/js/custom.js"></script>
</body>
</html>

@if(\Session::has('alert-success'))
<input type="hidden" id="isError" >
<div class="modal fade" id="errorMessageModal" tabindex="-1" role="dialog" aria-labelledby="errorMessageModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Notification</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="error_message">
					{{ Session::get('alert-success') }}
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><!-- End .content-->
@endif
