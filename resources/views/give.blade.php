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
                    <li><a href="{{ url('contact') }}">Contact</a></li>
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
							<h1 data-aos="fade-left" class="hero-heading">Online Giving</h1>
						</div>
						<div class="">
							<p class="mb-5 opacity-5" data-aos="fade-left" data-aos-delay="200">Each of you should give what you have decided in your heart to give, not reluctantly or under compulsion, for God loves a cheerful giver.</p>
							<p data-aos="fade-left" data-aos-delay="300"><a href="#give" class="btn btn-primary">Gve Now</a></p>
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
					<h2 class="heading">Online Giving</h2>
				</div>


			</div>

		</div>
		
		<div class="row" id="give">
			<div class="col-lg-6 mb-5 mb-lg-0"  data-aos="fade-up" data-aos-delay="100">
			<!-- Include Paystack Payment Script -->
				<script src="https://js.paystack.co/v1/inline.js"></script>
					<h2 class="heading">Pay With Paystack</h2>
				<form class="contact-form" id="payment-form">
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
	  			        <label class="text-black" for="email">Amount</label>
				        <input type="email" class="form-control" id="amount" required>
				    </div>

				    <div class="mb-3">
				        <label class="text-black" for="message">Giving For? (e.g Tithe, Offering, Thanksgiving etc)</label>
				        <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
				    </div>
				    <!-- Payment Button -->
				    <button type="button" class="btn btn-primary" id="payButton">Pay Now</button>
				</form>

			</div>
				<div class="col-lg-6 ml-auto" data-aos="fade-up" data-aos-delay="200" style="background-color: black; padding: 20px; color: white;">
				    <!-- Copy Button -->
				    <div class="quick-contact-item d-flex align-items-center mb-4">
				        <button onclick="copyAccountNumber()" class="btn btn-primary btn-sm" style="margin-right: 10px;">Copy Account</button>
				    </div>

				    <div class="quick-contact-item d-flex align-items-center mb-4">
				        <span class="icon-home" style="color: white;"></span>
				        <address class="text" style="color: white;">
				            Support our mission by giving generously through the following details:
				        </address>
				    </div>

				    <div class="quick-contact-item d-flex align-items-center mb-4">
				        <span class="icon-bank" style="color: white;"></span>
				        <address class="text" style="font-weight: bold; color: white;">
				            Church Account: <span id="account-number" style="font-weight: bold;">0008263992</span> <br/>
				            Stanbic IBTC <br/>
				            Account Name: <span style="font-weight: bold;">Kayode Emmanuel Aransiola</span>
				        </address>
				    </div>

				    <div class="quick-contact-item d-flex align-items-center mb-4">
				        <span class="icon-info-circle" style="color: white;"></span>
				        <address class="text" style="color: white;">
				            Thank you for supporting the work of the ministry!
				        </address>
				    </div>

				    <div class="quick-contact-item d-flex align-items-center mb-4">
				        <img src="https://www.westgate.co.ke/wp-content/uploads/2015/09/Stanbic-Bank-Logo.jpg" alt="Stanbic IBTC Logo" style="width: 100px;">
				    </div>
				</div>

				<script>
				    function copyAccountNumber() {
				        var accountNumber = document.getElementById("account-number").innerText;
				        navigator.clipboard.writeText(accountNumber)
				            .then(() => {
				                alert("Account number copied to clipboard!");
				            })
				            .catch(err => {
				                alert("Failed to copy: " + err);
				            });
				    }
				</script>

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
							<li><a href="mailto: Wpsc2004@yahoo.com">Wpsc2004@yahoo.com</a></li>
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


	<script type="text/javascript">
		document.getElementById('payButton').addEventListener('click', function (e) {
    e.preventDefault();

    // Get form details
    var firstName = document.getElementById('fname').value;
    var lastName = document.getElementById('lname').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var amount = document.getElementById('amount').value;

    // Initialize Paystack Payment Gateway
    var handler = PaystackPop.setup({
        key: 'pk_test_71abf441331c7a7800237d2d2e6172c3dd2a0fd6', // Replace with your Paystack public key
        email: email,
        amount: amount * 100, // Paystack accepts amount in kobo (multiply by 100)
        currency: 'NGN', // Currency: NGN (Naira)
        first_name: firstName,
        last_name: lastName,
        ref: 'order_' + Math.floor(Math.random() * 1000000), // Unique order reference
        callback: function (response) {
            // Payment was successful
            alert('Payment successful! Reference: ' + response.reference);
             window.location.href = '{{ url('thanks') }}';
        },
        onClose: function () {
            alert('Payment window closed.');
        }
    });

    // Open Paystack popup
    handler.openIframe();
});

	</script>

	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/glightbox.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/navbar.js"></script>
	<script src="js/counter.js"></script>
	<script src="js/custom.js"></script>

	
</body>
</html>