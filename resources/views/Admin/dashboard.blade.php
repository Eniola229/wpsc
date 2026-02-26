<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>WPSC - Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">
@include('components.admin-sidenav')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    @include('components.admin-nav')

    <div class="container-fluid py-4">

      {{-- Stats Cards --}}
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Students</p>
                    <h5 class="font-weight-bolder mb-0">{{ $studentCount }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Sermons</p>
                    <h5 class="font-weight-bolder mb-0">{{ $sermonCount }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Flash Messages --}}
      @if(session('message'))
        <div class="alert alert-success mt-3" style="color: white;">{{ session('message') }}</div>
      @elseif(session('error'))
        <div class="alert alert-danger mt-3" style="color: white;">{{ session('error') }}</div>
      @endif

      {{-- Students Table --}}
      <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row align-items-center">
                <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                  <h2 class="h5 text-dark mb-0">Students</h2>
                </div>

                {{-- ── Filter Controls ── --}}
                <div class="col-lg-6 col-12">
                  <form method="GET" action="{{ url('admin/dashboard') }}" class="d-flex flex-wrap gap-2 align-items-end justify-content-lg-end">

                    {{-- Year filter — built from matric numbers e.g. EDBTI/2026/001 --}}
                    <div>
                      <label class="text-xs text-secondary mb-1 d-block">Filter by Year</label>
                      <select name="year" class="form-control form-control-sm" style="min-width:130px;">
                        <option value="">All Years</option>
                        @foreach($matricYears as $year)
                          <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    {{-- Name / Matric search --}}
                    <div>
                      <label class="text-xs text-secondary mb-1 d-block">Search</label>
                      <input
                        type="text"
                        name="search"
                        class="form-control form-control-sm"
                        placeholder="Name or Matric No"
                        value="{{ request('search') }}"
                        style="min-width:180px;"
                      >
                    </div>

                    <div class="d-flex gap-2">
                      <button type="submit" class="btn btn-primary btn-sm mb-0">Filter</button>
                      <a href="{{ url('admin/dashboard') }}" class="btn btn-outline-secondary btn-sm mb-0">Reset</a>
                    </div>
                  </form>
                </div>
              </div>

              {{-- Active filter badge --}}
              @if(request('year') || request('search'))
                <div class="mt-2">
                  <span class="badge bg-gradient-info text-white px-3 py-2" style="font-size:12px;">
                    Showing
                    @if(request('year')) year <strong>{{ request('year') }}</strong> @endif
                    @if(request('search')) &nbsp;· search "<strong>{{ request('search') }}</strong>" @endif
                    &nbsp;·&nbsp; {{ $students->count() }} result(s)
                  </span>
                </div>
              @endif
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Is Admitted</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Matric No</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Added</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($students->isNotEmpty())
                      @foreach($students as $student)
                        <tr>
                          <td>
                            <img src="{{ $student->passport }}" width="70" alt="{{ $student->name }}">
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm">{{ $student->name }}</h6>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm">{{ $student->is_admitted }}</h6>
                          </td>
                          <td>
                            {{-- Highlight the year segment in the matric number --}}
                            @php
                              $parts = explode('/', $student->matric_no); // e.g. ['EDBTI', '2026', '001']
                            @endphp
                            @if(count($parts) === 3)
                              <h6 class="mb-0 text-sm">
                                {{ $parts[0] }}/<strong class="text-primary">{{ $parts[1] }}</strong>/{{ $parts[2] }}
                              </h6>
                            @else
                              <h6 class="mb-0 text-sm">{{ $student->matric_no }}</h6>
                            @endif
                          </td>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $student->created_at->format('F j, Y g:i A') }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <a href="{{ url('admin/view/student', ['id' => $student->id]) }}">
                                  <button class="btn btn-success btn-sm">View</button>
                                </a>
                              </div>
                            </div>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                @if ($student->is_admitted === 'NO')
                                  <a href="{{ url('admin/admit-student', ['id' => $student->id]) }}">
                                    <button class="btn btn-primary btn-sm">Admit</button>
                                  </a>
                                @else
                                  <span class="text-success" style="font-size:12px;">Already Admitted</span>
                                @endif
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="6" class="text-center py-4">
                          <p class="text-secondary mb-0">No students found.</p>
                        </td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}?v={{ time() }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
    }
  </script>
</body>
</html>