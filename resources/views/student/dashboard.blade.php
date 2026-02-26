<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>EDBTI — Student Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <style>
    :root {
      --green:      #1a5f1a;
      --green-mid:  #2e7d32;
      --green-lite: #e8f5e9;
      --gold:       #c8a600;
      --gold-lite:  #fff8e1;
      --red:        #b71c1c;
      --dark:       #111;
      --text:       #333;
      --muted:      #777;
      --bg:         #f5f7f5;
      --card:       #ffffff;
      --border:     #e0e7e0;
      --radius:     14px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
    }

    /* ── Topbar ─────────────────────────────────────── */
    .topbar {
      position: sticky;
      top: 0;
      z-index: 100;
      background: var(--green);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 24px;
      height: 60px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.18);
    }
    .topbar-brand {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      color: #fff;
      letter-spacing: 0.5px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .topbar-brand .cross { font-size: 22px; color: var(--gold); }
    .topbar-right {
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .topbar-name {
      color: rgba(255,255,255,0.85);
      font-size: 14px;
      font-weight: 500;
      max-width: 160px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .btn-logout {
      background: rgba(255,255,255,0.12);
      color: #fff;
      border: 1px solid rgba(255,255,255,0.3);
      border-radius: 8px;
      padding: 6px 14px;
      font-size: 13px;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.2s;
    }
    .btn-logout:hover { background: rgba(255,255,255,0.22); color: #fff; }

    /* ── Hero banner ────────────────────────────────── */
    .hero {
      background: linear-gradient(135deg, var(--green) 0%, #2e7d32 60%, #1b5e20 100%);
      padding: 40px 24px 60px;
      position: relative;
      overflow: hidden;
    }
    .hero::before {
      content: '✝';
      position: absolute;
      right: -20px;
      top: -20px;
      font-size: 200px;
      color: rgba(255,255,255,0.04);
      font-family: serif;
      pointer-events: none;
    }
    .hero-inner {
      max-width: 900px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      gap: 24px;
    }
    .hero-avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 3px solid var(--gold);
      object-fit: cover;
      flex-shrink: 0;
    }
    .hero-avatar-placeholder {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 3px solid var(--gold);
      background: rgba(255,255,255,0.15);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      color: rgba(255,255,255,0.7);
      flex-shrink: 0;
    }
    .hero-text .label {
      font-size: 12px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--gold);
      font-weight: 600;
    }
    .hero-text h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(22px, 5vw, 32px);
      color: #fff;
      line-height: 1.2;
      margin: 4px 0 6px;
    }
    .hero-text .matric {
      font-size: 13px;
      color: rgba(255,255,255,0.6);
      letter-spacing: 0.5px;
    }
    .hero-badge {
      margin-left: auto;
      flex-shrink: 0;
    }
    .admitted-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--gold);
      color: #111;
      font-size: 12px;
      font-weight: 700;
      padding: 7px 16px;
      border-radius: 30px;
      letter-spacing: 0.5px;
    }
    .not-admitted-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(255,255,255,0.15);
      color: rgba(255,255,255,0.7);
      font-size: 12px;
      font-weight: 600;
      padding: 7px 16px;
      border-radius: 30px;
    }

    /* ── Main layout ────────────────────────────────── */
    .page-body {
      max-width: 960px;
      margin: -28px auto 60px;
      padding: 0 16px;
    }

    /* ── Cards ──────────────────────────────────────── */
    .card {
      background: var(--card);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      box-shadow: 0 2px 16px rgba(0,0,0,0.06);
      overflow: hidden;
      margin-bottom: 20px;
    }
    .card-head {
      padding: 18px 24px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
    }
    .card-head-title {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .card-head-icon {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
    }
    .icon-green { background: var(--green-lite); color: var(--green); }
    .icon-gold  { background: var(--gold-lite);  color: var(--gold);  }
    .icon-red   { background: #fce4ec;           color: var(--red);   }

    .card-head h3 {
      font-size: 16px;
      font-weight: 600;
      color: var(--dark);
    }
    .card-head p {
      font-size: 12px;
      color: var(--muted);
      margin-top: 2px;
    }

    /* ── Results table ──────────────────────────────── */
    .results-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }
    .results-table thead tr {
      background: #f9fafb;
      border-bottom: 2px solid var(--border);
    }
    .results-table th {
      padding: 12px 20px;
      text-align: left;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--muted);
    }
    .results-table td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
      vertical-align: middle;
    }
    .results-table tbody tr:last-child td { border-bottom: none; }
    .results-table tbody tr:hover { background: #fafff9; }

    .score-pill {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--green);
    }
    .grade-badge {
      display: inline-block;
      background: var(--green-lite);
      color: var(--green);
      border: 1px solid #a5d6a7;
      font-size: 12px;
      font-weight: 700;
      padding: 3px 12px;
      border-radius: 20px;
    }
    .session-label {
      font-weight: 600;
      color: var(--dark);
    }
    .level-label {
      font-size: 12px;
      color: var(--muted);
      margin-top: 2px;
    }

    /* Action buttons */
    .btn-view {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--green);
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 7px 14px;
      font-size: 12px;
      font-weight: 600;
      font-family: 'DM Sans', sans-serif;
      text-decoration: none;
      transition: background 0.2s, transform 0.1s;
    }
    .btn-view:hover { background: #145214; transform: translateY(-1px); color: #fff; }

    .btn-cert {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--gold-lite);
      color: #7a5f00;
      border: 1px solid #e6c300;
      border-radius: 8px;
      padding: 7px 14px;
      font-size: 12px;
      font-weight: 600;
      font-family: 'DM Sans', sans-serif;
      text-decoration: none;
      transition: background 0.2s, transform 0.1s;
    }
    .btn-cert:hover { background: #fff3b0; transform: translateY(-1px); }

    /* Empty state */
    .empty-state {
      text-align: center;
      padding: 60px 20px;
    }
    .empty-state .empty-icon {
      font-size: 52px;
      color: var(--border);
      margin-bottom: 16px;
    }
    .empty-state h5 { color: var(--muted); font-size: 16px; margin-bottom: 6px; }
    .empty-state p  { color: #aaa; font-size: 13px; }

    /* ── Info sections ──────────────────────────────── */
    .info-section { padding: 0; }

    /* Accordion toggle */
    .accordion-toggle {
      width: 100%;
      background: none;
      border: none;
      padding: 18px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      border-bottom: 1px solid var(--border);
      transition: background 0.15s;
    }
    .accordion-toggle:hover { background: #fafff9; }
    .accordion-toggle-left {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .accordion-toggle-left .acc-icon {
      width: 34px;
      height: 34px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 15px;
    }
    .accordion-toggle-left h4 {
      font-size: 15px;
      font-weight: 600;
      color: var(--dark);
    }
    .accordion-toggle-left p {
      font-size: 12px;
      color: var(--muted);
      margin-top: 1px;
    }
    .chevron {
      font-size: 13px;
      color: var(--muted);
      transition: transform 0.25s;
    }
    .chevron.open { transform: rotate(180deg); }

    .accordion-body {
      display: none;
      border-bottom: 1px solid var(--border);
    }
    .accordion-body.open { display: block; }

    /* Info grid inside accordion */
    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 0;
    }
    .info-item {
      padding: 14px 24px;
      border-right: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
    }
    .info-item:last-child { border-right: none; }
    .info-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 4px;
    }
    .info-value {
      font-size: 14px;
      font-weight: 500;
      color: var(--dark);
      word-break: break-word;
    }

    /* ── Mobile card view for results ──────────────── */
    .result-cards { display: none; }

    @media (max-width: 640px) {
      .topbar-name { display: none; }
      .hero { padding: 30px 16px 50px; }
      .hero-inner { flex-direction: column; align-items: flex-start; gap: 14px; }
      .hero-badge { margin-left: 0; }

      /* Hide table, show cards on mobile */
      .results-table-wrap { display: none; }
      .result-cards { display: flex; flex-direction: column; gap: 12px; padding: 16px; }
      .result-card {
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 16px;
        background: #fafff9;
      }
      .result-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
      }
      .result-card-actions { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 12px; }
      .result-card-actions a { flex: 1; text-align: center; justify-content: center; }

      .info-grid { grid-template-columns: 1fr 1fr; }
      .page-body { margin-top: -20px; }
      .card-head { padding: 14px 16px; }
      .accordion-toggle { padding: 14px 16px; }
      .info-item { padding: 12px 16px; }
    }

    @media (max-width: 380px) {
      .info-grid { grid-template-columns: 1fr; }
    }

    /* ── Verse footer ───────────────────────────────── */
    .verse-footer {
      text-align: center;
      padding: 24px 16px 40px;
      font-size: 12px;
      color: var(--muted);
      letter-spacing: 1px;
      text-transform: uppercase;
    }
    .verse-footer span { color: var(--green); font-weight: 700; }

    /* ── Fade-in animation ──────────────────────────── */
    .fade-in { animation: fadeUp 0.4s ease both; }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(16px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .delay-1 { animation-delay: 0.08s; }
    .delay-2 { animation-delay: 0.16s; }
    .delay-3 { animation-delay: 0.24s; }
  </style>
</head>

<body>

  {{-- ── Topbar ─────────────────────────────────────────────── --}}
  <nav class="topbar">
    <a class="topbar-brand" href="{{ route('student.dashboard') }}">
      <span class="cross">✝</span> EDBTI Portal
    </a>
    <div class="topbar-right">
      <span class="topbar-name">{{ $student->name }}</span>
      <a href="{{ route('student.logout') }}" class="btn-logout">
        <i class="fa fa-sign-out-alt me-1"></i> Logout
      </a>
    </div>
  </nav>

  {{-- ── Hero ────────────────────────────────────────────────── --}}
  <div class="hero">
    <div class="hero-inner">
      @if($student->passport)
        <img src="{{ $student->passport }}" alt="{{ $student->name }}" class="hero-avatar">
      @else
        <div class="hero-avatar-placeholder"><i class="fa fa-user"></i></div>
      @endif
      <div class="hero-text">
        <div class="label">Student Portal</div>
        <h1>{{ $student->name }}</h1>
        <div class="matric">{{ $student->matric_no }}</div>
      </div>
      <div class="hero-badge">
        @if($student->is_admitted === 'YES')
          <span class="admitted-badge"><i class="fa fa-check-circle"></i> Admitted</span>
        @else
          <span class="not-admitted-badge"><i class="fa fa-clock"></i> Pending</span>
        @endif
      </div>
    </div>
  </div>

  {{-- ── Page Body ───────────────────────────────────────────── --}}
  <div class="page-body">

    {{-- ── Results Card ──────────────────────────────────────── --}}
    <div class="card fade-in">
      <div class="card-head">
        <div class="card-head-title">
          <div class="card-head-icon icon-green">
            <i class="fa fa-graduation-cap"></i>
          </div>
          <div>
            <h3>Academic Results</h3>
            <p>{{ $results->count() }} result(s) on record</p>
          </div>
        </div>
      </div>

      @if($results->count() > 0)

        {{-- Desktop table --}}
        <div class="results-table-wrap">
          <table class="results-table">
            <thead>
              <tr>
                <th>Session / Level</th>
                <th>Overall Score</th>
                <th>Grade</th>
                <th>Remark</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $res)
              <tr>
                <td>
                  <div class="session-label">{{ $res->session }}</div>
                  <div class="level-label">{{ $res->level }}</div>
                </td>
                <td><span class="score-pill">{{ $res->total_score }}</span></td>
                <td><span class="grade-badge">{{ $res->total_grade }}</span></td>
                <td style="font-size:13px; color: var(--muted);">{{ $res->total_remark }}</td>
                <td>
                  <div style="display:flex; gap:8px; flex-wrap:wrap;">
                    <a href="{{ route('student.result', $res->id) }}" class="btn-view">
                      <i class="fa fa-file-alt"></i> View Result
                    </a>
                    @if(strtoupper(trim($res->level)) === '200 LEVEL')
                    <a href="{{ route('student.certificate', $res->id) }}" class="btn-cert" target="_blank">
                      <i class="fa fa-certificate"></i> Certificate
                    </a>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- Mobile cards --}}
        <div class="result-cards">
          @foreach($results as $res)
          <div class="result-card">
            <div class="result-card-top">
              <div>
                <div class="session-label" style="font-size:15px;">{{ $res->session }}</div>
                <div class="level-label">{{ $res->level }}</div>
              </div>
              <span class="grade-badge">{{ $res->total_grade }}</span>
            </div>
            <div style="display:flex; justify-content:space-between; align-items:center;">
              <div>
                <div style="font-size:11px; color:var(--muted); text-transform:uppercase; letter-spacing:1px;">Overall Score</div>
                <div class="score-pill" style="font-size:26px;">{{ $res->total_score }}</div>
              </div>
              <div style="font-size:13px; color:var(--muted);">{{ $res->total_remark }}</div>
            </div>
            <div class="result-card-actions">
              <a href="{{ route('student.result', $res->id) }}" class="btn-view">
                <i class="fa fa-file-alt"></i> View Result
              </a>
              @if(strtoupper(trim($res->level)) === '200 LEVEL')
              <a href="{{ route('student.certificate', $res->id) }}" class="btn-cert" target="_blank">
                <i class="fa fa-certificate"></i> Certificate
              </a>
              @endif
            </div>
          </div>
          @endforeach
        </div>

      @else
        <div class="empty-state">
          <div class="empty-icon"><i class="fa fa-folder-open"></i></div>
          <h5>No results yet</h5>
          <p>Your results will appear here once uploaded by admin.</p>
        </div>
      @endif
    </div>

    {{-- ── Student Information Card ──────────────────────────── --}}
    <div class="card fade-in delay-1">
      <div class="card-head">
        <div class="card-head-title">
          <div class="card-head-icon icon-gold">
            <i class="fa fa-id-card"></i>
          </div>
          <div>
            <h3>My Profile</h3>
            <p>Your personal, family and church details</p>
          </div>
        </div>
      </div>

      <div class="info-section">

        {{-- Personal --}}
        <button class="accordion-toggle" onclick="toggleAccordion('personal', this)">
          <div class="accordion-toggle-left">
            <div class="acc-icon icon-green"><i class="fa fa-user"></i></div>
            <div>
              <h4>Personal Information</h4>
              <p>Date of birth, nationality, address</p>
            </div>
          </div>
          <span class="chevron open" id="chevron-personal">▼</span>
        </button>
        <div class="accordion-body open" id="body-personal">
          <div class="info-grid">
            <div class="info-item">
              <div class="info-label">Full Name</div>
              <div class="info-value">{{ $student->name }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Matric Number</div>
              <div class="info-value">{{ $student->matric_no }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Date of Birth</div>
              <div class="info-value">{{ $student->dob ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Age</div>
              <div class="info-value">{{ $student->age ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Sex</div>
              <div class="info-value">{{ $student->sex ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Relationship Status</div>
              <div class="info-value">{{ $student->relationship ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">State of Origin</div>
              <div class="info-value">{{ $student->state_of_origin ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Place of Birth</div>
              <div class="info-value">{{ $student->place_of_birth ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Nationality</div>
              <div class="info-value">{{ $student->nationality ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Address</div>
              <div class="info-value">{{ $student->address ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Email</div>
              <div class="info-value" style="font-size:13px;">{{ $student->email ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Type of Baptism</div>
              <div class="info-value">{{ $student->type_of_baptism ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Holy Ghost Baptism</div>
              <div class="info-value">{{ $student->holy_ghost_baptism ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Admission Status</div>
              <div class="info-value">
                @if($student->is_admitted === 'YES')
                  <span style="color:var(--green); font-weight:700;">✓ Admitted</span>
                @else
                  <span style="color:var(--muted);">Pending</span>
                @endif
              </div>
            </div>
          </div>
        </div>

        {{-- Family --}}
        <button class="accordion-toggle" onclick="toggleAccordion('family', this)">
          <div class="accordion-toggle-left">
            <div class="acc-icon icon-gold"><i class="fa fa-users"></i></div>
            <div>
              <h4>Family Information</h4>
              <p>Parents and spouse details</p>
            </div>
          </div>
          <span class="chevron" id="chevron-family">▼</span>
        </button>
        <div class="accordion-body" id="body-family">
          <div class="info-grid">
            <div class="info-item">
              <div class="info-label">Father's Name</div>
              <div class="info-value">{{ $student->father_name ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Father's Address</div>
              <div class="info-value">{{ $student->father_address ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Father's Mobile</div>
              <div class="info-value">{{ $student->father_mobile ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Mother's Name</div>
              <div class="info-value">{{ $student->mother_name ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Mother's Address</div>
              <div class="info-value">{{ $student->mother_address ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Mother's Mobile</div>
              <div class="info-value">{{ $student->mother_mobile ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Spouse's Name</div>
              <div class="info-value">{{ $student->spouse_name ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Spouse's Address</div>
              <div class="info-value">{{ $student->spouse_address ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Spouse's Mobile</div>
              <div class="info-value">{{ $student->spouse_mobile ?? '—' }}</div>
            </div>
          </div>
        </div>

        {{-- Church --}}
        <button class="accordion-toggle" style="border-bottom: none;" onclick="toggleAccordion('church', this)">
          <div class="accordion-toggle-left">
            <div class="acc-icon icon-red"><i class="fa fa-church"></i></div>
            <div>
              <h4>Church Information</h4>
              <p>Church, pastor and ministry details</p>
            </div>
          </div>
          <span class="chevron" id="chevron-church">▼</span>
        </button>
        <div class="accordion-body" id="body-church" style="border-bottom:none;">
          <div class="info-grid">
            <div class="info-item">
              <div class="info-label">Church Name</div>
              <div class="info-value">{{ $student->church_name ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Church Location</div>
              <div class="info-value">{{ $student->church_location ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Pastor's Name</div>
              <div class="info-value">{{ $student->pastor_name ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Pastor's Mobile</div>
              <div class="info-value">{{ $student->pastor_mobile ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Commissioned</div>
              <div class="info-value">{{ $student->commissioned ?? '—' }}</div>
            </div>
            <div class="info-item">
              <div class="info-label">Denomination</div>
              <div class="info-value">{{ $student->denomination ?? '—' }}</div>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- ── Verse footer ───────────────────────────────────────── --}}
    <div class="verse-footer fade-in delay-2">
      <span>Jesus Christ is Alive</span> — Rev 1:4–8,18
    </div>

  </div>{{-- /page-body --}}

  <script>
    function toggleAccordion(name, btn) {
      var body    = document.getElementById('body-' + name);
      var chevron = document.getElementById('chevron-' + name);
      var isOpen  = body.classList.contains('open');
      body.classList.toggle('open', !isOpen);
      chevron.classList.toggle('open', !isOpen);
    }
  </script>

</body>
</html>