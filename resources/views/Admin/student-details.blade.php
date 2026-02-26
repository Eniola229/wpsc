<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>WPSC - Student Details</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet">

  <style>
    /* Accordion toggle button */
    .section-toggle {
      width: 100%;
      text-align: left;
      background: none;
      border: none;
      padding: 0;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
    }
    .section-toggle .toggle-icon {
      transition: transform 0.25s ease;
      font-size: 14px;
    }
    .section-toggle.collapsed .toggle-icon {
      transform: rotate(-90deg);
    }
    .card-header.bg-success,
    .card-header.bg-info,
    .card-header.bg-warning,
    .card-header.bg-secondary {
      cursor: pointer;
    }

    /* Result row hover effect */
    .results-table tbody tr:hover { background: #f0fff4; }

    /* Badge fix for Soft UI */
    .badge-success { background-color: #2dce89; color: white; padding: 4px 10px; border-radius: 20px; font-size: 11px; }
    .badge-danger  { background-color: #f5365c; color: white; padding: 4px 10px; border-radius: 20px; font-size: 11px; }
    .badge-info    { background-color: #11cdef; color: white; padding: 4px 10px; border-radius: 20px; font-size: 11px; }

    /* View result expand */
    .course-items-row td { background: #f8f9fa; }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
@include('components.admin-sidenav')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    @include('components.admin-nav')

    <div class="container my-5">

      {{-- Flash Message --}}
      @if(session('message'))
        <div class="alert alert-success text-white">{{ session('message') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger text-white">{{ session('error') }}</div>
      @endif

      {{-- Page Header --}}
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
          <h2 class="mb-0">{{ $student->name }}</h2>
          <small class="text-muted">{{ $student->matric_no }}</small>
        </div>
        <div class="d-flex gap-2">
          <a href="{{ route('admin.upload.result', $student->id) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-upload me-1"></i> Upload Result
          </a>
          @if($student->is_admitted === 'NO')
            <a href="{{ url('admin/admit-student', $student->id) }}" class="btn btn-success btn-sm">
              <i class="fa fa-check me-1"></i> Admit Student
            </a>
          @endif
        </div>
      </div>

      <div class="card shadow-lg">

        {{-- ═══════════════════════════════════════════════════
             SECTION 1 — Personal Information (open by default)
        ════════════════════════════════════════════════════ --}}
        <div class="card-header bg-success text-white" onclick="toggleSection('personal')">
          <button class="section-toggle" id="personal-btn">
            <span><i class="fa fa-user me-2"></i> Personal Information</span>
            <span class="toggle-icon">▼</span>
          </button>
        </div>
        <div id="personal-section">
          <div class="card-body p-0">
            <table class="table table-bordered mb-0">
              <tbody>
                <tr>
                  <th style="width:30%">Passport</th>
                  <td><img src="{{ $student->passport }}" alt="Passport" class="img-thumbnail" style="max-height:150px;"></td>
                </tr>
                <tr><th>Matriculation No</th><td>{{ $student->matric_no }}</td></tr>
                <tr><th>Full Name</th><td>{{ $student->name }}</td></tr>
                <tr><th>Date of Birth</th><td>{{ $student->dob }}</td></tr>
                <tr><th>Age</th><td>{{ $student->age }}</td></tr>
                <tr><th>Sex</th><td>{{ $student->sex }}</td></tr>
                <tr><th>Relationship Status</th><td>{{ $student->relationship }}</td></tr>
                <tr><th>Address</th><td>{{ $student->address }}</td></tr>
                <tr><th>State of Origin</th><td>{{ $student->state_of_origin }}</td></tr>
                <tr><th>Place of Birth</th><td>{{ $student->place_of_birth }}</td></tr>
                <tr><th>Nationality</th><td>{{ $student->nationality }}</td></tr>
                <tr><th>Type of Baptism</th><td>{{ $student->type_of_baptism }}</td></tr>
                <tr><th>Holy Ghost Baptism</th><td>{{ $student->holy_ghost_baptism ?? 'N/A' }}</td></tr>
                <tr>
                  <th>Admission Status</th>
                  <td>
                    @if($student->is_admitted === 'YES')
                      <span class="badge-success">Admitted</span>
                    @else
                      <span class="badge-danger">Not Admitted</span>
                    @endif
                  </td>
                </tr>
                <tr><th>Email</th><td>{{ $student->email }}</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        {{-- ═══════════════════════════════════════════════════
             SECTION 2 — Family Information (collapsed)
        ════════════════════════════════════════════════════ --}}
        <div class="card-header bg-warning text-white" onclick="toggleSection('family')">
          <button class="section-toggle collapsed" id="family-btn">
            <span><i class="fa fa-users me-2"></i> Family Information</span>
            <span class="toggle-icon">▼</span>
          </button>
        </div>
        <div id="family-section" style="display:none;">
          <div class="card-body p-0">
            <table class="table table-bordered mb-0">
              <tbody>
                <tr><th style="width:30%">Father's Name</th><td>{{ $student->father_name ?? 'N/A' }}</td></tr>
                <tr><th>Father's Address</th><td>{{ $student->father_address ?? 'N/A' }}</td></tr>
                <tr><th>Father's Mobile</th><td>{{ $student->father_mobile ?? 'N/A' }}</td></tr>
                <tr><th>Mother's Name</th><td>{{ $student->mother_name ?? 'N/A' }}</td></tr>
                <tr><th>Mother's Address</th><td>{{ $student->mother_address ?? 'N/A' }}</td></tr>
                <tr><th>Mother's Mobile</th><td>{{ $student->mother_mobile ?? 'N/A' }}</td></tr>
                <tr><th>Spouse's Name</th><td>{{ $student->spouse_name ?? 'N/A' }}</td></tr>
                <tr><th>Spouse's Address</th><td>{{ $student->spouse_address ?? 'N/A' }}</td></tr>
                <tr><th>Spouse's Mobile</th><td>{{ $student->spouse_mobile ?? 'N/A' }}</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        {{-- ═══════════════════════════════════════════════════
             SECTION 3 — Church Information (collapsed)
        ════════════════════════════════════════════════════ --}}
        <div class="card-header bg-secondary text-white" onclick="toggleSection('church')">
          <button class="section-toggle collapsed" id="church-btn">
            <span><i class="fa fa-church me-2"></i> Church Information</span>
            <span class="toggle-icon">▼</span>
          </button>
        </div>
        <div id="church-section" style="display:none;">
          <div class="card-body p-0">
            <table class="table table-bordered mb-0">
              <tbody>
                <tr><th style="width:30%">Church Name</th><td>{{ $student->church_name ?? 'N/A' }}</td></tr>
                <tr><th>Church Location</th><td>{{ $student->church_location ?? 'N/A' }}</td></tr>
                <tr><th>Pastor's Name</th><td>{{ $student->pastor_name ?? 'N/A' }}</td></tr>
                <tr><th>Pastor's Mobile</th><td>{{ $student->pastor_mobile ?? 'N/A' }}</td></tr>
                <tr><th>Commissioned</th><td>{{ $student->commissioned ?? 'N/A' }}</td></tr>
                <tr><th>Denomination</th><td>{{ $student->denomination ?? 'N/A' }}</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        {{-- ═══════════════════════════════════════════════════
             SECTION 4 — Academic Results (open by default)
        ════════════════════════════════════════════════════ --}}
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center" onclick="toggleSection('results')">
          <button class="section-toggle" id="results-btn" style="pointer-events:none;">
            <span><i class="fa fa-graduation-cap me-2"></i> Academic Results ({{ $results->count() }})</span>
            <span class="toggle-icon">▼</span>
          </button>
        </div>
        <div id="results-section">
          <div class="card-body px-0 pb-2">
            @if($results->count() > 0)
              <div class="table-responsive">
                <table class="table table-hover results-table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Session</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Score</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remark</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Uploaded</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($results as $res)
                      {{-- Main result row --}}
                      <tr>
                        <td class="ps-3"><strong>{{ $res->session }}</strong></td>
                        <td>{{ $res->level }}</td>
                        <td><strong class="text-success">{{ $res->total_score }}</strong></td>
                        <td><span class="badge-info">{{ $res->total_grade }}</span></td>
                        <td>{{ $res->total_remark }}</td>
                        <td>{{ $res->created_at->format('M d, Y') }}</td>
                        <td class="text-center">
                          <button
                            class="btn btn-sm btn-outline-info"
                            onclick="toggleCourses('courses-{{ $res->id }}')"
                            title="View Courses"
                          >
                            <i class="fa fa-list me-1"></i> Courses
                          </button>
                          <a href="{{ route('student.result', $res->id) }}" target="_blank" class="btn btn-sm btn-outline-success" title="Print Result Sheet">
                            <i class="fa fa-print me-1"></i> Print
                          </a>
                          @if(strtoupper(trim($res->level)) === '200 LEVEL')
                          <a href="{{ route('student.certificate', $res->id) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="View Testimonial">
                            <i class="fa fa-certificate me-1"></i> Cert
                          </a>
                          @endif
                        </td>
                      </tr>

                      {{-- Expandable course items row --}}
                      <tr id="courses-{{ $res->id }}" style="display:none;">
                        <td colspan="7" class="course-items-row p-3">
                          <strong class="d-block mb-2 text-dark">Course Breakdown — {{ $res->session }} {{ $res->level }}</strong>

                          {{-- Summary row --}}
                          <div class="d-flex gap-4 mb-3 flex-wrap">
                            @if($res->assignment_score)
                              <span class="badge bg-gradient-success text-white px-3 py-2">
                                Assignment: <strong>{{ $res->assignment_score }}</strong> ({{ $res->assignment_grade }}) — {{ $res->assignment_position }}
                              </span>
                            @endif
                            @if($res->test_score)
                              <span class="badge bg-gradient-warning text-white px-3 py-2">
                                Class Test: <strong>{{ $res->test_score }}</strong> ({{ $res->test_grade }}) — {{ $res->test_position }}
                              </span>
                            @endif
                            @if($res->class_size)
                              <span class="badge bg-gradient-info text-white px-3 py-2">
                                Class Size: {{ $res->class_size }} &nbsp;|&nbsp; Position: {{ $res->class_position }}
                              </span>
                            @endif
                          </div>

                          @if($res->items->count() > 0)
                            <table class="table table-sm table-bordered mb-0" style="background:white;">
                              <thead style="background:#f4f4f4;">
                                <tr>
                                  <th>#</th>
                                  <th>Course</th>
                                  <th>Code</th>
                                  <th>Score</th>
                                  <th>Grade</th>
                                  <th>Remark</th>
                                  <th>Position</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($res->items as $idx => $item)
                                  <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item->course_code ?? '—' }}</td>
                                    <td><strong>{{ $item->score }}</strong></td>
                                    <td>{{ $item->grade }}</td>
                                    <td>{{ $item->remark }}</td>
                                    <td>{{ $item->position_in_course ?? '—' }}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                          @else
                            <p class="text-muted mb-0">No course items found for this result.</p>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="text-center py-5">
                <i class="fa fa-folder-open fa-3x text-muted mb-3"></i>
                <p class="text-muted mb-0">No results uploaded yet.</p>
                <a href="{{ route('admin.upload.result', $student->id) }}" class="btn btn-primary btn-sm mt-3">
                  Upload First Result
                </a>
              </div>
            @endif
          </div>
        </div>

      </div>{{-- /card --}}
    </div>{{-- /container --}}
  </main>

  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}?v={{ time() }}"></script>

  <script>
    // ── Toggle a section open/closed ─────────────────────────────────
    function toggleSection(name) {
      var section = document.getElementById(name + '-section');
      var btn     = document.getElementById(name + '-btn');
      var isHidden = section.style.display === 'none';

      section.style.display = isHidden ? 'block' : 'none';
      if (isHidden) {
        btn.classList.remove('collapsed');
      } else {
        btn.classList.add('collapsed');
      }
    }

    // ── Toggle a result's course breakdown row ───────────────────────
    function toggleCourses(rowId) {
      var row = document.getElementById(rowId);
      row.style.display = (row.style.display === 'none') ? 'table-row' : 'none';
    }
  </script>

</body>
</html>