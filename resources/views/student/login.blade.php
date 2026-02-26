<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>Student Portal - Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet">
  <style>
      body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
      .login-card { max-width: 400px; width: 100%; margin: 0 auto; border-radius: 15px; overflow: hidden; }
  </style>
</head>
<body>
    <div class="login-card card">
        <div class="card-header text-center pt-5 pb-3 bg-white">
            <h3 class="font-weight-bolder">Student Portal</h3>
            <p class="mb-0 text-sm">Emmanuel Discipleship Bible Institute</p>
        </div>
        <div class="card-body px-4 pb-4 pt-0">
            @if(session('error'))
                <div class="alert alert-danger text-white text-sm mt-3">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('student.login.post') }}" class="mt-3">
                @csrf
                <div class="form-group mb-3">
                    <label class="text-xs font-weight-bold">Matric Number</label>
                    <input type="text" name="matric_no" class="form-control" placeholder="Enter Matric No" required>
                </div>
                <div class="form-group mb-3">
                    <label class="text-xs font-weight-bold">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100 mt-2">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
</body>
</html>