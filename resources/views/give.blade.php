<!doctype html>
<html lang="en">
<head>
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

    {{-- ✅ FIX 1: Correct Korapay script URL, loaded in <head> --}}
    <script src="https://korablobstorage.blob.core.windows.net/modal-bucket/korapay-collections.min.js"></script>

    <title>Way of Peace Salvation Centre Worldwide.</title>

    <style>
        .image-container {
            width: 100%;
            aspect-ratio: 1/1;
            overflow: hidden;
            position: relative;
        }
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* Loading state for pay button */
        #payButton:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .form-error {
            color: #dc3545;
            font-size: 13px;
            margin-top: 4px;
            display: none;
        }
    </style>
</head>
<body>

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
                <a href="{{ url('/') }}" class="logo m-0 float-left">
                    <img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg" style="max-height: 80px; max-width: 100px; width: auto;" />
                </a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('sermons') }}">Sermons</a></li>
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

    <div class="hero overlay" style="background-image: url('images/landscape-1.jpg');">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 me-auto text-start pe-lg-5">
                    <div class="intro-text">
                        <div class="mb-4 mt-5 mt-sm-0">
                            <h1 data-aos="fade-left" class="hero-heading">Online Giving</h1>
                        </div>
                        <div class="">
                            <p class="mb-5 opacity-5" data-aos="fade-left" data-aos-delay="200">Each of you should give what you have decided in your heart to give, not reluctantly or under compulsion, for God loves a cheerful giver.</p>
                            <p data-aos="fade-left" data-aos-delay="300"><a href="#give" class="btn btn-primary">Give Now</a></p>
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
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="0">
                <div class="heading-wrap">
                    <h2 class="heading">Online Giving</h2>
                </div>
            </div>
        </div>

        <div class="row" id="give">

            {{-- ── Payment Form ── --}}
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="heading">Pay With Korapay</h2>

                {{-- Success / Error alert area --}}
                <div id="pay-alert" class="alert d-none" role="alert"></div>

                <div class="contact-form" id="payment-form">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="text-black" for="fname">First name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fname" placeholder="John">
                                <div class="form-error" id="fname-error">Please enter your first name.</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="text-black" for="lname">Last name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lname" placeholder="Doe">
                                <div class="form-error" id="lname-error">Please enter your last name.</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="text-black" for="email">Email address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" placeholder="john@example.com">
                        <div class="form-error" id="email-error">Please enter a valid email address.</div>
                    </div>

                    <div class="mb-3">
                        <label class="text-black" for="amount">Amount (₦) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="amount" placeholder="e.g. 5000" min="100">
                        <div class="form-error" id="amount-error">Please enter an amount of at least ₦100.</div>
                    </div>

                    <div class="mb-3">
                        <label class="text-black" for="purpose">Giving For? <span class="text-muted" style="font-size:13px;">(e.g. Tithe, Offering, Thanksgiving)</span></label>
                        <textarea class="form-control" id="purpose" cols="30" rows="3" placeholder="e.g. Tithe"></textarea>
                    </div>

                    <button type="button" class="btn btn-primary w-100" id="payButton">
                        <span id="payButtonText">Pay Now</span>
                        <span id="payButtonSpinner" class="d-none">
                            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                            Processing...
                        </span>
                    </button>
                </div>
            </div>

            {{-- ── Bank Details ── --}}
            <div class="col-lg-6 ml-auto" data-aos="fade-up" data-aos-delay="200" style="background-color: black; padding: 20px; color: white;">
                <div class="quick-contact-item d-flex align-items-center mb-4">
                    <button onclick="copyAccountNumber()" class="btn btn-primary btn-sm" style="margin-right: 10px;">
                        Copy Account Number
                    </button>
                    <span id="copy-confirmation" style="color: #7effa0; font-size: 13px; display:none;">✓ Copied!</span>
                </div>

                <div class="quick-contact-item d-flex align-items-center mb-4">
                    <address class="text" style="color: white;">
                        Support our mission by giving generously through the following details:
                    </address>
                </div>

                <div class="quick-contact-item d-flex align-items-center mb-4">
                    <address class="text" style="color: white; line-height: 1.9;">
                        <strong style="color: #f0c040;">Church Account:</strong><br>
                        <span id="account-number" style="font-weight: bold; font-size: 20px; letter-spacing: 2px;">0008263992</span><br>
                        <strong>Bank:</strong> Stanbic IBTC<br>
                        <strong>Account Name:</strong> Kayode Emmanuel Aransiola
                    </address>
                </div>

                <div class="quick-contact-item d-flex align-items-center mb-4">
                    <address class="text" style="color: #ccc;">
                        Thank you for supporting the work of the ministry!
                    </address>
                </div>

                <div class="quick-contact-item d-flex align-items-center mb-2">
                    <img src="https://www.westgate.co.ke/wp-content/uploads/2015/09/Stanbic-Bank-Logo.jpg" alt="Stanbic IBTC Logo" style="width: 100px;">
                </div>
            </div>

        </div>
    </div>

    {{-- Footer --}}
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
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled float-start links">
                            <li><a href="{{ url('sermons') }}">Sermons</a></li>
                            <li><a href="{{ url('ministry') }}">Ministries</a></li>
                            <li><a href="{{ url('events') }}">Events</a></li>
                            <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                            <li><a href="{{ url('EDBTI') }}">EDBTI</a></li>
                            <li><a href="{{ url('give') }}">Giving</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Links</h3>
                        <ul class="list-unstyled links">
                            <li><a href="{{ url('contact') }}">Contact us</a></li>
                            <li><a href="{{ url('give') }}">Giving</a></li>
                        </ul>
                        <ul class="list-unstyled social">
                            <li><a href="https://youtube.com/@evangelistkayodeemmanuel493?si=qusRkd_rmcKjbJ1k"><span class="icon-youtube"></span></a></li>
                            <li><a href="https://whatsapp.com/channel/0029VaxoYnf1NCrPmtzbyA0M"><span class="icon-whatsapp"></span></a></li>
                            <li><a href="https://whatsapp.com/channel/0029VaVRDIyI1rcfnjgY3R0E"><span class="icon-whatsapp"></span></a></li>
                            <li><a href="https://www.facebook.com/messageoflife60?mibextid=ZbWKwL"><span class="icon-facebook"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="mb-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed by <a href="https://africicl.com.ng">AfricTech</a></p>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        // ── Helpers ────────────────────────────────────────────────────
        function showAlert(type, message) {
            var el = document.getElementById('pay-alert');
            el.className = 'alert alert-' + type;
            el.innerText = message;
            el.classList.remove('d-none');
            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        function hideAlert() {
            document.getElementById('pay-alert').classList.add('d-none');
        }

        function setFieldError(fieldId, show) {
            document.getElementById(fieldId + '-error').style.display = show ? 'block' : 'none';
            document.getElementById(fieldId).style.borderColor = show ? '#dc3545' : '';
        }

        function setButtonLoading(loading) {
            var btn     = document.getElementById('payButton');
            var text    = document.getElementById('payButtonText');
            var spinner = document.getElementById('payButtonSpinner');
            btn.disabled = loading;
            text.classList.toggle('d-none', loading);
            spinner.classList.toggle('d-none', !loading);
        }

        // ── Validation ─────────────────────────────────────────────────
        function validateForm() {
            var firstName = document.getElementById('fname').value.trim();
            var lastName  = document.getElementById('lname').value.trim();
            var email     = document.getElementById('email').value.trim();
            var amount    = parseFloat(document.getElementById('amount').value);
            var valid     = true;

            setFieldError('fname',  !firstName);  if (!firstName)  valid = false;
            setFieldError('lname',  !lastName);   if (!lastName)   valid = false;

            var emailOk = email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            setFieldError('email', !emailOk);     if (!emailOk)    valid = false;

            var amountOk = amount && amount >= 100;
            setFieldError('amount', !amountOk);   if (!amountOk)   valid = false;

            return valid;
        }

        // ── Copy Account Number ────────────────────────────────────────
        function copyAccountNumber() {
            var accountNumber = document.getElementById('account-number').innerText;
            navigator.clipboard.writeText(accountNumber)
                .then(function () {
                    var confirmation = document.getElementById('copy-confirmation');
                    confirmation.style.display = 'inline';
                    setTimeout(function () {
                        confirmation.style.display = 'none';
                    }, 2500);
                })
                .catch(function (err) {
                    alert('Could not copy: ' + err);
                });
        }

        // ── Pay Button ─────────────────────────────────────────────────
        document.getElementById('payButton').addEventListener('click', function () {
            hideAlert();

            if (!validateForm()) {
                showAlert('danger', 'Please fill in all required fields correctly.');
                return;
            }

            var firstName = document.getElementById('fname').value.trim();
            var lastName  = document.getElementById('lname').value.trim();
            var email     = document.getElementById('email').value.trim();
            var amount    = parseFloat(document.getElementById('amount').value);
            var purpose   = document.getElementById('purpose').value.trim() || 'Church Offering';

            // Unique reference using timestamp + random string
            var reference = 'WPSC-' + Date.now() + '-' + Math.random().toString(36).substr(2, 6).toUpperCase();

            setButtonLoading(true);

            // Use window.Korapay with correct script loaded above
            window.Korapay.initialize({
                key: "{{ config('services.korapay.public_key') }}", 
                reference: reference,
                amount: amount,       
                currency: "NGN",
                customer: {
                    name: firstName + " " + lastName,
                    email: email
                },
                narration: purpose,
                channels: ["card", "bank_transfer", "ussd"],

                onClose: function () {
                    // User closed the modal without completing payment
                    setButtonLoading(false);
                    showAlert('warning', 'Payment window closed. Your transaction was not completed.');
                },

                onSuccess: function (data) {
                    setButtonLoading(false);
                    // data.reference contains the Korapay transaction reference
                    showAlert('success', 'Payment successful! Reference: ' + data.reference + '. God bless you!');
                    // Clear the form
                    document.getElementById('fname').value   = '';
                    document.getElementById('lname').value   = '';
                    document.getElementById('email').value   = '';
                    document.getElementById('amount').value  = '';
                    document.getElementById('purpose').value = '';
                    // Redirect after 2 seconds
                    setTimeout(function () {
                        window.location.href = '{{ url("thanks") }}';
                    }, 2000);
                },

                onFailed: function (data) {
                    setButtonLoading(false);
                    showAlert('danger', 'Payment failed. Please try again or use the bank transfer option.');
                    console.error('Korapay payment failed:', data);
                }
            });
        });
    </script>

</body>
</html>