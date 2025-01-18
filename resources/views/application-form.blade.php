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
                            <h1 data-aos="fade-left" class="hero-heading">Apply for EDBTI</h1>
                        </div>
                        <div class="">
                            <p class="mb-5 opacity-5" data-aos="fade-left" data-aos-delay="200">EEDBTI (Emmanuel Discipleship Bible Training Institute.) is a Bible school dedicated to equipping individuals with a deeper understanding of God's Word and preparing them for ministry and spiritual growth. The institute offers a range of biblical and theological studies designed to empower students with the knowledge and skills needed to serve effectively in various capacities.</p>
                          
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <a href="https://www.youtube.com/watch?v=HHlxwYF0wBU" class="video-bg glightbox">
                        <span class="icon"><span class="icon-play"></span></span>
                        <img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736523127/WhatsApp_Image_2025-01-09_at_4.06.57_PM_xniozo.jpg" alt="Image" class="img-fluid rounded">
                    </a>
                </div>
            </div>
        </div>
    </div>

     <!-- Error Alert -->
    <div id="errorAlert" class="alert alert-danger" style="display:none;">
        <strong>Error!</strong> Something went wrong.
    </div>

    <!-- Success Alert -->
    <div id="successAlert" class="alert alert-success" style="display:none;">
        <strong>Success!</strong> Application completed successfully.
    </div>

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        // Check if there's a success message in the session
        @if(session('success'))
            document.getElementById('successAlert').style.display = 'block';
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session("success") }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    <div class="container py-5" id="contact-section">
        <div class=" mb-5">
            <div class="col-lg-12"  data-aos="fade-up" data-aos-delay="0">
                <div class="heading-wrap">
                    <h2 class="heading">Application  Form</h2>
                </div>

                <div class="container my-5">
                 <form action="{{ url('admission') }}" method="POST" class="border p-4 rounded" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-center mb-4">Application Form</h3>
                        
                        <h5>Section A</h5>
                        <div class="mb-3">
                            <label for="passport" class="form-label">Passport</label>
                            <input type="file" class="form-control " id="passport" name="passport" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name of Student</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sex" class="form-label">Sex</label>
                                <select class="form-select" id="sex" name="sex" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="relationship" class="form-label">Relationship Status</label>
                                <input type="text" class="form-control" id="relationship" name="relationship" value="{{ old('relationship') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                            </div>
                        </div>
                        <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="state_of_origin" class="form-label">State of Origin</label>
                            <input type="text" class="form-control" id="state_of_origin" name="state_of_origin" value="{{ old('state_of_origin') }}" required>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="place_of_birth" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}" required>
                        </div>
                        </div>
                         <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" value="{{ old('nationality') }}" required>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="type_of_baptism" class="form-label">Type of Baptism</label>
                            <select class="form-select" id="type_of_baptism" name="type_of_baptism" required>
                                <option value="" disabled selected>Select</option>
                                <option value="Immerse" {{ old('type_of_baptism') == 'Immerse' ? 'selected' : '' }}>Immerse</option>
                                <option value="Under Cross" {{ old('type_of_baptism') == 'Under Cross' ? 'selected' : '' }}>Under Cross</option>
                                <option value="Sprinkle" {{ old('type_of_baptism') == 'Sprinkle' ? 'selected' : '' }}>Sprinkle</option>
                                <option value="None" {{ old('type_of_baptism') == 'None' ? 'selected' : '' }}>None</option>
                            </select>
                        </div>
                       </div>
                        <div class="mb-3">
                            <label for="holy_ghost_baptism" class="form-label">Holy Ghost Baptism</label>
                            <input type="text" class="form-control" id="holy_ghost_baptism" name="holy_ghost_baptism" value="{{ old('holy_ghost_baptism') }}">
                        </div>

                        <h5>Section B</h5>
                         <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="father_name" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="father_address" class="form-label">Father's Address</label>
                            <input type="text" class="form-control" id="father_address" name="father_address" value="{{ old('father_address') }}" required>
                        </div>
                    </div>
                         <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="father_mobile" class="form-label">Father's Mobile</label>
                            <input type="number" class="form-control" id="father_mobile" name="father_mobile" value="{{ old('father_mobile') }}" required>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="mother_name" class="form-label">Mother's Name</label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="mother_address" class="form-label">Mother's Address</label>
                            <input type="text" class="form-control" id="mother_address" name="mother_address" value="{{ old('mother_address') }}" required>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="mother_mobile" class="form-label">Mother's Mobile</label>
                            <input type="text" class="form-control" id="mother_mobile" name="mother_mobile" value="{{ old('mother_mobile') }}" required>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="spouse_name" class="form-label">Wife/Husband's Name (Optional)</label>
                            <input type="text" class="form-control" id="spouse_name" name="spouse_name" value="{{ old('spouse_name') }}">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="spouse_address" class="form-label">Wife/Husband's Address (Optional)</label>
                            <input type="text" class="form-control" id="spouse_address" name="spouse_address" value="{{ old('spouse_address') }}">
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="spouse_mobile" class="form-label">Wife/Husband's Mobile (Optional)</label>
                            <input type="text" class="form-control" id="spouse_mobile" name="spouse_mobile" value="{{ old('spouse_mobile') }}">
                        </div>
                    </div>
                        <h5>Section C</h5>
                          <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="church_name" class="form-label">Church Name</label>
                            <input type="text" class="form-control" id="church_name" name="church_name" value="{{ old('church_name') }}" required>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="pastor_name" class="form-label">Pastor's Name</label>
                            <input type="text" class="form-control" id="pastor_name" name="pastor_name" value="{{ old('pastor_name') }}" required>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="commissioned" class="form-label">Are you currently ordained, licensed or commission for ministry? Yes..... No.... If yes name of ordained or licensing denomination</label>
                            <input type="text" class="form-control" id="commissioned" name="commissioned" value="{{ old('commissioned') }}" required>
                        </div>

                       
                         <div class="col-md-6 mb-3">
                            <label for="denomination" class="form-label">Are you in good standing with this denomination? Yes.... No. (If No please explain)</label>
                            <input type="text" class="form-control" id="denomination" name="denomination" value="{{ old('denomination') }}" required>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="church_location" class="form-label">Church Location</label>
                            <input type="text" class="form-control" id="church_location" name="church_location" value="{{ old('church_location') }}" required>
                        </div>

                        <h5>Login Details</h5>
                         <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>

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
                        
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-4 -->
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