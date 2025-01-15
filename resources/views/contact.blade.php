<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Inter&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/glightbox.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Way of Peace Salvation Centre Worldwide. </title>
</head>
<style type="text/css">
    .image-container {
    width: 100%; /* Matches the column width */
    aspect-ratio: 1/1; /* Ensures images are square */
    overflow: hidden; /* Hides overflowing parts of the image */
    position: relative;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image fills the container while maintaining proportions */
}

</style>
<body >

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="{{ url('/') }}" class="logo m-0 float-left"><img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg" style="max-height: 80px; max-width: 100px; width: auto;" /></a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li ><a href="{{ url('sermons') }}">Sermons</a></li>
                    <li><a href="{{ url('ministry') }}">Ministries</a></li>
                    <li><a href="{{ url('events') }}">Events</a></li>
                    <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                    <li class="active"><a href="{{ url('contact') }}">Contact</a></li>
                    <li class="cta-button"><a href="{{ url('EDBTI') }}">EDBTI</a></li>
                    <li class="cta-button"><a href="{{ url('give') }}">Giving</a></li>
                </ul>

                

                <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

                
            </div>
        </div>
    </nav>
	
	<div class="hero overlay" style="background-image: url('images/landscape-1.jpg'); ">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-5 me-auto text-start pe-lg-5">
					<div class="intro-text">
						<div class="mb-4 mt-5 mt-sm-0"> 
							<h1 data-aos="fade-left" class="hero-heading">Get In Touch</h1>
						</div>
						<div class="">
							<p class="mb-5 opacity-5" data-aos="fade-left" data-aos-delay="200">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
							<p data-aos="fade-left" data-aos-delay="300"><a href="#" class="btn btn-primary">Go to sermons</a></p>
						</div>
					</div>
				</div>

				<div class="col-lg-7" data-aos="fade-left">
					<a href="https://www.youtube.com/watch?v=X9P4ceAn0dM" class="video-bg glightbox">
						<span class="icon"><span class="icon-play"></span></span>
						<img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736513391/WhatsApp_Image_2025-01-10_at_8.32.21_AM_1_vbcctt.jpg" alt="Image" class="img-fluid rounded">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container py-5" id="contact-section">
		<div class="row mb-5">
			<div class="col-lg-6"  data-aos="fade-up" data-aos-delay="0">
				<div class="heading-wrap">
					<h2 class="heading">Get In Touch</h2>
				</div>


			</div>

		</div>
		
		<div class="row">
			<div class="col-lg-6 mb-5 mb-lg-0"  data-aos="fade-up" data-aos-delay="100">
				<form class="contact-form">
					<div class="row">
						<div class="col-6">
							<div class="mb-3">
								<label class="text-black" for="fname">First name</label>
								<input type="text" class="form-control" id="fname">
							</div>
						</div>
						<div class="col-6">
							<div class="mb-3">
								<label class="text-black" for="lname">Last name</label>
								<input type="text" class="form-control" id="lname">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label class="text-black" for="email">Email address</label>
						<input type="email" class="form-control" id="email">
					</div>

					<div class="mb-3">
						<label class="text-black" for="message">Message</label>
						<textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
					</div>

					<button type="submit" class="btn btn-primary">Send Message</button>
				</form>
			</div>
			<div class="col-lg-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
				<div class="quick-contact-item d-flex align-items-center mb-4">
					<span class="icon-home"></span>
					<address class="text">
						HOUSE 25 LASISI DAUDA STR IGANDO LAGOS NIGERIA
					</address>
				</div>
				<div class="quick-contact-item d-flex align-items-center mb-4">
					<span class="icon-phone"></span>
					<address class="text">
						+234 802 358 8202
					</address>
				</div>
				<div class="quick-contact-item d-flex align-items-center mb-4">
					<span class="icon-envelope"></span>
					<address class="text">
						Wpsc2004@yahoo.com
					</address>
				</div>
			</div>
		</div>
	</div>


	<div id="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.750108646791!2d3.2275125741513997!3d6.553200193439848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b853b0c4bf7fb%3A0x869a01e69c7b0c08!2s25%20Lasisi%20Dauda%20St%2C%20Ikotun%2C%20Lagos%20102213%2C%20Lagos!5e0!3m2!1sen!2sng!4v1736525159023!5m2!1sen!2sng" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>

	<div class="section sec-cta bg-secondary">
		<div class="container">
			<div class="row align-items-center" data-aos="fade-up">
				<div class="col-lg-9 text-center text-md-start mb-4 mb-md-0">
					<h2 class="heading text-white">Support our mission by giving towards the spreading of our sermons.</h2>
				</div>		
				<div class="col-lg-3 text-center text-md-end" data-aos="fade-up" data-aos-delay="100">
					<a href="{{ url('give') }}" class="btn btn-primary py-3 px-5">Give Now</a>
				</div>

			</div>		
		</div>		
	</div>



	<div class="site-footer bg-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3>Contact</h3>
						<address>HOUSE 25 LASISI DAUDA STR IGANDO LAGOS NIGERIA</address>
						<ul class="list-unstyled links">
							<li><a href="tel://11234567890">+234 802 358 8202</a></li>
							<li><a href="mailto:wayofpeacesalvationcentreworld@gmail.com">wayofpeacesalvationcentreworld@gmail.com</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3>Sources</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Vision</a></li>
							<li><a href="#">Mission</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
						
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3>Links</h3>
						<ul class="list-unstyled links">
							<li><a href="#">Our Vision</a></li>
							<li><a href="#">About us</a></li>
							<li><a href="#">Contact us</a></li>
						</ul>

						<ul class="list-unstyled social">
							<li><a href="https://whatsapp.com/channel/0029VaxoYnf1NCrPmtzbyA0M"><span class="icon-whatsapp"></span></a></li>
							<li><a href="https://www.facebook.com/groups/241058822767669"><span class="icon-facebook"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
					<p class="mb-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed by <a href="https://africicl.com.ng">AfricTech</a>
					</p>
				</div>
			</div>
		</div> <!-- /.container -->
	</div> <!-- /.site-footer -->


	<!-- Preloader -->
	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border text-primary" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>




	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/glightbox.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/navbar.js"></script>
	<script src="js/counter.js"></script>
	<script src="js/custom.js"></script>

	
</body>
</html>