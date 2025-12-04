<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>My Notifications - One Health</title>

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
            <li class="nav-item">
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
            <li class="nav-item active">
              <a class="nav-link" href="{{url('notifications')}}">Notifications</a>
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

  @if(session()->has('message'))

    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert"> x </button>
      {{session()->get('message')}}
    </div>

  @endif

  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5">My Notifications</h1>

      @if($notifications->count() > 0)
        <div class="row">
          @foreach($notifications as $notification)
            <div class="col-md-12 mb-3">
              <div class="card {{ $notification->read_at ? 'bg-light' : 'border-primary' }}">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                      @if($notification->data['type'] == 'appointment_scheduled')
                        <h5 class="card-title text-primary">
                          <i class="fas fa-calendar-check me-2"></i>
                          New Appointment Scheduled
                        </h5>
                        <p class="card-text mb-2">
                          <strong>Dr. {{ $notification->data['doctor_name'] }}</strong>
                          ({{ $notification->data['doctor_speciality'] }})
                          has scheduled an appointment with you.
                        </p>
                        <p class="card-text">
                          <strong>Date:</strong> {{ \Carbon\Carbon::parse($notification->data['appointment_date'])->format('F j, Y') }}<br>
                          <strong>Message:</strong> {{ $notification->data['message'] }}
                        </p>
                      @else
                        <h5 class="card-title">{{ $notification->type }}</h5>
                        <p class="card-text">{{ json_encode($notification->data) }}</p>
                      @endif
                    </div>
                    <div class="text-end">
                      <small class="text-muted">
                        {{ $notification->created_at->diffForHumans() }}
                      </small>
                      @if(!$notification->read_at)
                        <br>
                        <a href="{{ url('notification/read/' . $notification->id) }}" class="btn btn-sm btn-outline-primary mt-2">
                          Mark as Read
                        </a>
                      @else
                        <br>
                        <span class="badge bg-success mt-2">Read</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="d-flex justify-content-center">
          {{ $notifications->links() }}
        </div>
      @else
        <div class="text-center py-5">
          <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
          <h4 class="text-muted">No notifications yet</h4>
          <p class="text-muted">You'll receive notifications when doctors schedule appointments with you.</p>
        </div>
      @endif
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

</body>
</html>