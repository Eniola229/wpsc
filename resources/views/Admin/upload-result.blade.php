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

  <style>
    /* ── Overlay popup ── */
    #ajax-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.55);
      z-index: 9999;
      justify-content: center;
      align-items: center;
    }
    #ajax-overlay.show { display: flex; }

    .ajax-popup {
      background: white;
      border-radius: 12px;
      padding: 40px 50px;
      text-align: center;
      min-width: 280px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.3);
      animation: popIn 0.2s ease;
    }
    @keyframes popIn {
      from { transform: scale(0.85); opacity: 0; }
      to   { transform: scale(1);    opacity: 1; }
    }

    .ajax-popup .popup-icon { font-size: 48px; margin-bottom: 12px; }
    .ajax-popup .popup-title { font-size: 18px; font-weight: 700; margin-bottom: 6px; }
    .ajax-popup .popup-msg   { font-size: 14px; color: #666; margin-bottom: 20px; }

    /* spinner */
    .spinner-ring {
      width: 52px; height: 52px;
      border: 5px solid #e0e0e0;
      border-top-color: #5e72e4;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
      margin: 0 auto 16px;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
@include('components.admin-sidenav')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    @include('components.admin-nav')

    {{-- ── Ajax Overlay Popup ── --}}
    <div id="ajax-overlay">
      <div class="ajax-popup" id="ajax-popup-inner">
        {{-- content injected by JS --}}
      </div>
    </div>

    <div class="container-fluid py-4">
        @if(session('message'))
            <div class="alert alert-success" style="color: white;">{{ session('message') }}</div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="mb-0">Upload Result for: <span class="text-primary">{{ $student->name }}</span></h4>
                    </div>
                    <div class="card-body">
                        {{-- action & method kept — JS takes over, but form still works without JS --}}
                        <form id="result-form" action="{{ route('admin.store.result', $student->id) }}" method="POST">
                            @csrf

                            {{-- ── Section 1: Header Info ── --}}
                            <h5 class="text-dark mb-3">Report Header</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Session <span class="text-danger">*</span></label>
                                        <input type="text" name="session" class="form-control" placeholder="e.g. 2023/24" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Level <span class="text-danger">*</span></label>
                                        <input type="text" name="level" class="form-control" placeholder="e.g. 100 LEVEL" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Number in Class</label>
                                        <input type="number" name="class_size" class="form-control" placeholder="e.g. 13">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Position in Class</label>
                                        <input type="text" name="class_position" class="form-control" placeholder="e.g. 1ST">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Certificate / Testimonial Date</label>
                                        <input type="date" name="certificate_date" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <hr class="my-3">

                            {{-- ── Section 2: Course Rows ── --}}
                            <h5 class="text-dark mb-3">Course Details</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle" id="course-table">
                                    <thead class="text-center" style="font-size:12px;">
                                        <tr>
                                            <th style="width:28%">Course Title</th>
                                            <th style="width:8%">Code</th>
                                            <th style="width:10%">Mark</th>
                                            <th style="width:8%">Grade</th>
                                            <th style="width:14%">Remark</th>
                                            <th style="width:12%">Position in Course</th>
                                            <th style="width:8%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="courses[0][name]" class="form-control form-control-sm" placeholder="e.g. Bible Doctrine" required></td>
                                            <td><input type="text" name="courses[0][code]" class="form-control form-control-sm" placeholder="011"></td>
                                            <td><input type="number" name="courses[0][score]" class="form-control form-control-sm" step="0.01" required></td>
                                            <td><input type="text" name="courses[0][grade]" class="form-control form-control-sm" placeholder="A1" required></td>
                                            <td><input type="text" name="courses[0][remark]" class="form-control form-control-sm" placeholder="EXCELLENT" required></td>
                                            <td><input type="text" name="courses[0][position_in_course]" class="form-control form-control-sm" placeholder="1ST"></td>
                                            <td class="text-center">—</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-info btn-sm mb-3" onclick="addRow()">+ Add Course Row</button>

                            <hr class="my-3">

                            {{-- ── Section 3: Summary ── --}}
                            <h5 class="text-dark mb-3">Summary (Assignment / Test / Overall)</h5>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Assignment Score</label>
                                        <input type="number" name="assignment_score" class="form-control" step="0.01" placeholder="e.g. 93.68">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Assignment Grade</label>
                                        <input type="text" name="assignment_grade" class="form-control" placeholder="A1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Assignment Position</label>
                                        <input type="text" name="assignment_position" class="form-control" placeholder="1ST">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Class Test Score</label>
                                        <input type="number" name="test_score" class="form-control" step="0.01" placeholder="e.g. 92.4">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Class Test Grade</label>
                                        <input type="text" name="test_grade" class="form-control" placeholder="A1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Class Test Position</label>
                                        <input type="text" name="test_position" class="form-control" placeholder="2ND">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Overall Total Score <span class="text-danger">*</span></label>
                                        <input type="number" name="total_score" class="form-control" step="0.01" placeholder="e.g. 96.01" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Overall Grade <span class="text-danger">*</span></label>
                                        <input type="text" name="total_grade" class="form-control" placeholder="A1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Overall Remark <span class="text-danger">*</span></label>
                                        <input type="text" name="total_remark" class="form-control" placeholder="DISTINCTION" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Overall Position</label>
                                        <input type="text" name="overall_position" class="form-control" placeholder="1ST">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary px-4" id="save-btn">
                                    <span id="save-btn-text"><i class="fa fa-save me-1"></i> Save Result</span>
                                    <span id="save-btn-spinner" style="display:none;">
                                        <span class="spinner-border spinner-border-sm me-1" role="status"></span> Saving...
                                    </span>
                                </button>
                            </div>
                        </form>
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
    // ── Add course row ───────────────────────────────────────────────
    let rowCount = 1;
    function addRow() {
        const tbody = document.querySelector('#course-table tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" name="courses[${rowCount}][name]" class="form-control form-control-sm" placeholder="e.g. Book of Genesis" required></td>
            <td><input type="text" name="courses[${rowCount}][code]" class="form-control form-control-sm" placeholder="012"></td>
            <td><input type="number" name="courses[${rowCount}][score]" class="form-control form-control-sm" step="0.01" required></td>
            <td><input type="text" name="courses[${rowCount}][grade]" class="form-control form-control-sm" placeholder="A1" required></td>
            <td><input type="text" name="courses[${rowCount}][remark]" class="form-control form-control-sm" placeholder="EXCELLENT" required></td>
            <td><input type="text" name="courses[${rowCount}][position_in_course]" class="form-control form-control-sm" placeholder="1ST"></td>
            <td class="text-center"><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">✕</button></td>
        `;
        tbody.appendChild(row);
        rowCount++;
    }

    // ── Popup helpers ────────────────────────────────────────────────
    function showLoading() {
        document.getElementById('ajax-popup-inner').innerHTML = `
            <div class="spinner-ring"></div>
            <div class="popup-title">Saving Result...</div>
            <div class="popup-msg">Please wait, do not close this page.</div>
        `;
        document.getElementById('ajax-overlay').classList.add('show');
    }

    function showSuccess(message, redirectUrl) {
        document.getElementById('ajax-popup-inner').innerHTML = `
            <div class="popup-icon">✅</div>
            <div class="popup-title" style="color:#2dce89;">Success!</div>
            <div class="popup-msg">${message}</div>
            <a href="${redirectUrl}" class="btn btn-success btn-sm px-4">View Student</a>
        `;
    }

    function showError(message) {
        document.getElementById('ajax-popup-inner').innerHTML = `
            <div class="popup-icon">❌</div>
            <div class="popup-title" style="color:#f5365c;">Something went wrong</div>
            <div class="popup-msg">${message}</div>
            <button class="btn btn-danger btn-sm px-4" onclick="closePopup()">Close & Try Again</button>
        `;
    }

    function closePopup() {
        document.getElementById('ajax-overlay').classList.remove('show');
        // Re-enable the button
        var btn = document.getElementById('save-btn');
        btn.disabled = false;
        document.getElementById('save-btn-text').style.display   = 'inline';
        document.getElementById('save-btn-spinner').style.display = 'none';
    }

    // ── Ajax form submit ─────────────────────────────────────────────
    document.getElementById('result-form').addEventListener('submit', function (e) {
        e.preventDefault(); // stop normal page reload

        var form    = this;
        var btn     = document.getElementById('save-btn');
        var btnText = document.getElementById('save-btn-text');
        var spinner = document.getElementById('save-btn-spinner');

        // Show button loading state
        btn.disabled        = true;
        btnText.style.display  = 'none';
        spinner.style.display  = 'inline';

        // Show loading popup
        showLoading();

        // Build FormData from the form (handles nested arrays fine)
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',   // tells Laravel it's Ajax
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(function (response) {
            return response.json().then(function (data) {
                return { status: response.status, data: data };
            });
        })
        .then(function (result) {
            if (result.status === 200 && result.data.success) {
                showSuccess(
                    result.data.message || 'Result uploaded successfully!',
                    result.data.redirect
                );
            } else {
                // Laravel validation errors come as 422
                var msg = 'An error occurred. Please check your inputs.';
                if (result.data.message) msg = result.data.message;
                if (result.data.errors) {
                    // Collect the first error from each field
                    msg = Object.values(result.data.errors).map(function(e){ return e[0]; }).join('<br>');
                }
                showError(msg);
            }
        })
        .catch(function (err) {
            showError('Network error. Please check your connection and try again.');
            console.error(err);
        });
    });
  </script>
</body>
</html>