<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Doctor Details - {{ $doctor->name }}</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}"><span class="text-primary">One</span>-Health</a>

                <form action="#">
                    <div class="input-group input-navbar">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('doctor_view')}}">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('news')}}">News</a>
                        </li>

                        @if(Route::has('login'))

                        @auth

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('myappointments')}}">My Appointments</a>
                        </li>
                        <x-app-layout>
                        </x-app-layout>


                        @else

                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
                        </li>


                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
                        </li>

                        @endauth
                        @endif


                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Doctor Profile</h1>

            <div class="row mt-5">
                <!-- Doctor Photo and Basic Info -->
                <div class="col-lg-4 py-3 wow fadeInUp">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="{{ asset('doctorimage/' . $doctor->image) }}" alt="{{ $doctor->name }}" class="img-fluid rounded-circle shadow-lg" style="width: 250px; height: 250px; object-fit: cover; border: 4px solid #fff; box-shadow: 0 8px 16px rgba(0,0,0,0.1); cursor: pointer;" data-toggle="modal" data-target="#doctorImageModal">
                                <div class="position-absolute" style="bottom: 10px; right: 10px; background: #007bff; color: white; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                                    <i class="mai-check"></i>
                                </div>
                            </div>
                            <h4 class="card-title">{{ $doctor->name }}</h4>
                            <p class="text-primary font-weight-bold">{{ $doctor->speciality }}</p>
                            @if($doctor->experience_years)
                                <p class="text-muted">{{ $doctor->experience_years }} Years Experience</p>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Contact Info -->
                    <div class="card mt-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Contact Information</h5>
                            @if($doctor->phone)
                                <p><i class="mai-call text-primary"></i> {{ $doctor->phone }}</p>
                            @endif
                            @if($doctor->room)
                                <p><i class="mai-home text-primary"></i> Room {{ $doctor->room }}</p>
                            @endif
                            @if($doctor->address)
                                <p><i class="mai-map text-primary"></i> {{ $doctor->address }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Detailed Information -->
                <div class="col-lg-8 py-3 wow fadeInRight">
                    <!-- Biography -->
                    @if($doctor->biography)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="mai-person"></i> About Dr. {{ $doctor->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $doctor->biography }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Education & Qualifications -->
                    @if($doctor->education)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="mai-graduation-cap text-primary"></i> Education & Qualifications</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $doctor->education }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Certifications & Awards -->
                    <div class="row">
                        @if($doctor->certifications)
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="mai-certificate text-primary"></i> Certifications</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ $doctor->certifications }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($doctor->awards)
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="mai-trophy text-primary"></i> Awards & Recognition</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ $doctor->awards }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Languages & Working Hours -->
                    <div class="row">
                        @if($doctor->languages)
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="mai-chatbubbles text-primary"></i> Languages</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ $doctor->languages }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($doctor->working_hours)
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="mai-time text-primary"></i> Working Hours</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ $doctor->working_hours }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center mt-4">
                        <a href="{{ url('/appointment') }}" class="btn btn-primary btn-lg px-5 py-3 wow zoomIn">
                            <i class="mai-calendar"></i> Book Appointment
                        </a>
                        <a href="{{ url('/doctor_view') }}" class="btn btn-outline-primary btn-lg px-5 py-3 ml-3 wow zoomIn" data-wow-delay="200ms">
                            <i class="mai-arrow-back"></i> Back to Doctors
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="../assets/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                    <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Company</h5>
                    <ul class="footer-menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Editorial Team</a></li>
                        <li><a href="#">Protection</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>More</h5>
                    <ul class="footer-menu">
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Join as Doctors</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Our partner</h5>
                    <ul class="footer-menu">
                        <li><a href="#">One-Fitness</a></li>
                        <li><a href="#">One-Drugs</a></li>
                        <li><a href="#">One-Live</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Contact</h5>
                    <p class="footer-link mt-2">Nairobi, Kenya 00100</p>
                    <a href="#" class="footer-link">+254 712345678</a>
                    <a href="#" class="footer-link">healthcare@temporary.net</a>

                    <h5 class="mt-3">Social Media</h5>
                    <div class="footer-sosmed mt-3">
                        <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <hr>

            <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
        </div>
    </footer>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

    <!-- Doctor Image Modal -->
    <div class="modal fade" id="doctorImageModal" tabindex="-1" role="dialog" aria-labelledby="doctorImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="doctorImageModalLabel">{{ $doctor->name }} - Full Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('doctorimage/' . $doctor->image) }}" alt="{{ $doctor->name }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</body>
</html>