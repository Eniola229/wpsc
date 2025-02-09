<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

  <title>WPSC - Admin</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet">

  <!-- Nepcha Analytics -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('components.admin-sidenav')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin-nav')
    <!-- End Navbar -->
     <div class="container my-5">
        <h2 class="text-center mb-4">Student Details</h2>

        <!-- Student Information Table -->
        <div class="card shadow-lg">
            <div class="card-header bg-success text-white">
                <h4 class="card-title">Personal Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Passport</th>
                            <td><img src="{{ asset($student->passport) }}" alt="Passport Image" class="img-thumbnail" style="max-height: 150px;"></td>
                        </tr>
                        <tr>
                        <th scope="row">Matriculation Number</th>
                            <td>{{ $student->matric_no }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Date of Birth</th>
                            <td>{{ $student->dob }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sex</th>
                            <td>{{ $student->sex }}</td>
                        </tr>
                        <tr>
                            <th scope="row">State of Origin</th>
                            <td>{{ $student->state_of_origin }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Place of Birth</th>
                            <td>{{ $student->place_of_birth }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Age</th>
                            <td>{{ $student->age }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Relationship</th>
                            <td>{{ $student->relationship }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{ $student->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nationality</th>
                            <td>{{ $student->nationality }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Type of Baptism</th>
                            <td>{{ $student->type_of_baptism }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Holy Ghost Baptism</th>
                            <td>{{ $student->holy_ghost_baptism ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-header bg-success text-white">
                <h4 class="card-title">Family Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Father's Name</th>
                            <td>{{ $student->father_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Father's Address</th>
                            <td>{{ $student->father_address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Father's Mobile</th>
                            <td>{{ $student->father_mobile }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mother's Name</th>
                            <td>{{ $student->mother_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mother's Address</th>
                            <td>{{ $student->mother_address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mother's Mobile</th>
                            <td>{{ $student->mother_mobile }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Spouse's Name</th>
                            <td>{{ $student->spouse_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Spouse's Address</th>
                            <td>{{ $student->spouse_address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Spouse's Mobile</th>
                            <td>{{ $student->spouse_mobile ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-header bg-success text-white">
                <h4 class="card-title">Church Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Church Name</th>
                            <td>{{ $student->church_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Church Location</th>
                            <td>{{ $student->church_location }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pastor's Name</th>
                            <td>{{ $student->pastor_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pastor's Mobile</th>
                            <td>{{ $student->pastor_mobile ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Commissioned</th>
                            <td>{{ $student->commissioned }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Denomination</th>
                            <td>{{ $student->denomination }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $student->email }}</td>
                        </tr>
                      
                        <tr>
                            <th scope="row">Admitted</th>
                            <td>{{ $student->is_admitted }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  </main>
  <!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}?v={{ time() }}"></script>

</body>

</html>