<!DOCTYPE html>
<html lang="en">
<head>
    <title>Certificate - {{ $student->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&display=swap" rel="stylesheet">
    <style>
        @page { size: A4 portrait; margin: 0; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Times New Roman', serif; background: #fff; }

        .cert-page {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            position: relative;
            overflow: hidden;
        }

        /* ══ DIAGONAL STRIPE SVG — top-left ══ */
.stripe-tl svg,
        .stripe-br svg {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
        }
        /* ══ DIAGONAL STRIPE SVG — bottom-right ══ */
/* ══════════════════════════════
           GOLD L-BRACKETS
        ══════════════════════════════ */
        .bracket-tr {
            position: absolute; top: 16px; right: 16px;
            width: 60px; height: 60px;
            border-top: 4px solid #c8a600;
            border-right: 4px solid #c8a600;
            z-index: 4;
        }
        .bracket-bl {
            position: absolute; bottom: 16px; left: 16px;
            width: 60px; height: 60px;
            border-bottom: 4px solid #c8a600;
            border-left: 4px solid #c8a600;
            z-index: 4;
        }

        /* ══════════════════════════════
           CONTENT
        ══════════════════════════════ */
        .content {
            position: relative; z-index: 2;
            padding: 28px 54px 24px;
            text-align: center;
        }

        /* ══════════════════════════════
           LOGOS ROW
           Left:  school card (rectangular, with round logo inside)
           Right: church logo (natural/rectangular, NOT clipped)
        ══════════════════════════════ */
        .logos-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 60px;
            margin-bottom: 14px;
        }

        /* LEFT — church logo, natural rectangular shape */
        .logo-church img {
            width: 82px;
            height: 82px;
            object-fit: contain;
            display: block;
        }

        /* RIGHT — church logo, circular */
        .logo-circle-right img {
            width: 82px;
            height: 82px;
            border-radius: 50%;
            border: 2px solid #1a5f1a;
            object-fit: cover;
            display: block;
        }

        /* ══════════════════════════════
           SCHOOL NAMES
        ══════════════════════════════ */
        .school-main {
            font-size: 13.5px; font-weight: bold;
            text-transform: uppercase; letter-spacing: 0.6px;
            color: #000; line-height: 1.5; margin-bottom: 4px;
        }
        .affiliate-line {
            font-size: 14px; font-weight: bold;
            color: #c0392b; text-transform: uppercase;
            letter-spacing: 1px; margin: 5px 0 4px;
        }
        .wpsc-line {
            font-size: 11px; text-transform: uppercase;
            color: #000; letter-spacing: 0.3px;
        }
        .email-line {
            font-size: 10.5px; color: #000;
            text-transform: uppercase; margin-top: 2px;
        }

        /* ── Gold dividers ── */
        .gd-thick { border: none; border-top: 2.5px solid #c8a600; margin: 10px 0 2px; }
        .gd-thin  { border: none; border-top: 1px solid #c8a600;   margin: 2px 0 14px; }
        .rd-thick { border: none; border-top: 2.5px solid #c8a600; margin: 4px 0 2px; }
        .rd-thin  { border: none; border-top: 1px solid #c8a600;   margin: 2px 0 14px; }

        /* ── Body italic text ── */
        .certify-intro {
            font-size: 12.5px; font-style: italic;
            color: #6b2a2a; margin-bottom: 8px;
        }
        .student-info-line {
            font-size: 13px; font-style: italic; color: #6b2a2a;
            display: flex; justify-content: center;
            align-items: baseline; flex-wrap: wrap;
            gap: 5px; margin-bottom: 6px;
        }
        .s-label        { color: #6b2a2a; }
        .s-name         { font-weight: bold; font-style: italic; font-size: 14.5px; color: #000; text-decoration: underline; text-transform: uppercase; }
        .s-matric-label { color: #6b2a2a; }
        .s-matric       { font-weight: bold; color: #000; text-decoration: underline; padding: 0 6px; min-width: 40px; display: inline-block; text-align: center; }

        .having-text {
            font-size: 12px; font-style: italic;
            color: #6b2a2a; line-height: 1.75; margin-bottom: 14px;
        }

        /* ── Cert title ── */
        .ct-cert    { font-family: 'Cinzel', serif; font-size: 23px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: #000; }
        .ct-in      { font-family: 'Cinzel', serif; font-size: 15px; font-weight: 600; text-transform: uppercase; color: #000; margin: 3px 0; }
        .ct-subject { font-family: 'Cinzel', serif; font-size: 17px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #000; line-height: 1.4; }

        /* ── Grade / date ── */
        .grade-line {
            font-size: 13px; color: #000;
            margin: 18px 0 5px;
            display: flex; justify-content: center;
            align-items: baseline; gap: 6px; flex-wrap: wrap;
        }
        .uval { font-weight: bold; color: #8B0000; border-bottom: 1.5px solid #000; padding: 0 10px; display: inline-block; min-width: 80px; text-align: center; }

        .date-line {
            font-size: 13px; color: #000;
            margin: 5px 0 22px;
            display: flex; justify-content: center;
            align-items: baseline; gap: 5px; flex-wrap: wrap;
        }
        .dval { font-weight: bold; border-bottom: 1.5px solid #000; padding: 0 8px; min-width: 42px; text-align: center; display: inline-block; }

        /* ── Registrar — centered ── */
        .sig-registrar { display: flex; justify-content: center; margin-bottom: 20px; }
        .sign-center-box { text-align: center; width: 180px; }
        .dash-sign { font-size: 18px; color: #444; letter-spacing: 3px; padding-bottom: 2px; }
        .sig-line  { border-top: 1.5px solid #000; margin-top: 8px; }
        .sig-label { font-size: 10.5px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin-top: 4px; }

        /* ── Bottom: rector left, stamp right ── */
        .sig-bottom { display: flex; justify-content: space-between; align-items: flex-end; }

        .rector-box { text-align: left; }
        .rector-date { font-style: italic; font-size: 13px; color: #333; margin-bottom: 4px; }
        .rector-dash { font-size: 18px; color: #444; letter-spacing: 3px; }
        .rector-sig-line { border-top: 1.5px solid #000; margin-top: 8px; width: 170px; }
        .rector-label { font-size: 10.5px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin-top: 4px; }

        .stamp-placeholder { text-align: center; }
        .stamp-circle-dash {
            width: 85px; height: 85px;
            border-radius: 50%;
            border: 2px dashed #999;
            display: flex; align-items: center;
            justify-content: center;
            font-size: 10px; color: #999;
            font-style: italic; text-align: center;
            line-height: 1.4;
        }

        @media print {
            body { background: white; }
            .cert-page { margin: 0; width: 100%; }
        }
    </style>
</head>
<body>
<div class="cert-page">

    {{-- TOP-LEFT diagonal ribbon --}}
    <svg style="position:absolute;top:0;left:0;z-index:3;" width="230" height="230" viewBox="0 0 230 230" xmlns="http://www.w3.org/2000/svg">
        <!-- outermost black (corner triangle) -->
        <polygon points="0,0  180,0  0,180" fill="#111111"/>
        <!-- red band -->
        <polygon points="120,0  155,0  0,155  0,120" fill="#9B0000"/>
        <!-- gold band -->
        <polygon points="155,0  195,0  0,195  0,155" fill="#D4A017"/>
        <!-- inner black band -->
        <polygon points="195,0  230,0  230,5  0,230  0,195" fill="#111111"/>
    </svg>

    {{-- BOTTOM-RIGHT diagonal ribbon (mirror) --}}
    <svg style="position:absolute;bottom:0;right:0;z-index:3;" width="230" height="230" viewBox="0 0 230 230" xmlns="http://www.w3.org/2000/svg">
        <!-- outermost black -->
        <polygon points="230,230  50,230  230,50" fill="#111111"/>
        <!-- red band -->
        <polygon points="110,230  75,230  230,75  230,110" fill="#9B0000"/>
        <!-- gold band -->
        <polygon points="75,230  35,230  230,35  230,75" fill="#D4A017"/>
        <!-- inner black band -->
        <polygon points="35,230  0,230  0,225  230,0  230,35" fill="#111111"/>
    </svg>

    {{-- Gold brackets --}}
    <div class="bracket-tr"></div>
    <div class="bracket-bl"></div>

    <div class="content">

        {{-- LOGOS --}}
        <div class="logos-row">

            {{-- LEFT: church logo — natural shape, NOT circular --}}
            <div class="logo-church">
                <img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg"
                     alt="Church Logo">
            </div>

            {{-- RIGHT: church logo — circular --}}
            <div class="logo-circle-right">
                <img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg"
                     alt="Church Logo Circle">
            </div>

        </div>

        {{-- Names --}}
        <div class="school-main">
            Emmanuel Discipleship Bible Training Institute (EDBTI)<br>Lagos NIG.
        </div>
        <div class="affiliate-line">An Affiliate of</div>
        <div class="wpsc-line">Way of Peace Salvation Centre Worldwide (WPSC) Lagos NIG.</div>
        <div class="email-line">E-Mail: WPSC2004@YAHOO.COM</div>

        <hr class="gd-thick"><hr class="gd-thin">

        {{-- Body --}}
        <div class="certify-intro">This is to certify that</div>

        <div class="student-info-line">
            <span class="s-label">Bro/Sist</span>
            <span class="s-name">{{ $student->name }}</span>
            <span class="s-matric-label">Matric No</span>
            <span class="s-matric">{{ $student->matric_no }}</span>
        </div>

        <div class="having-text">
            having completed the courses of study approved by the Academic Board and passed the<br>
            prescribed examination, is here by awarded the
        </div>

        <div class="ct-cert">Certificate</div>
        <div class="ct-in">in</div>
        <div class="ct-subject">Evangelism and Bible Knowledge</div>

        <div class="grade-line">
            With
            <span class="uval">{{ $result->total_grade }} ({{ $result->total_remark }})</span>
            under our hands this
        </div>

        @php $cd = $result->certificate_date ? \Carbon\Carbon::parse($result->certificate_date) : null; @endphp
        <div class="date-line">
            <span class="dval">{{ $cd ? strtoupper($cd->format('jS')) : '____' }}</span>
            day of
            <span class="dval" style="min-width:80px;">{{ $cd ? strtoupper($cd->format('F')) : '________' }}</span>
            20<span class="dval">{{ $cd ? $cd->format('y') : '__' }}</span>
        </div>

        {{-- Registrar — centered --}}
        <div class="sig-registrar">
            <div class="sign-center-box">
                <div class="dash-sign">———</div>
                <div class="sig-line"></div>
                <div class="sig-label">Registrar Sign</div>
            </div>
        </div>

        <hr class="rd-thick"><hr class="rd-thin">

        {{-- Rector + stamp --}}
        <div class="sig-bottom">
            <div class="rector-box">
                @if($cd)
                    <div class="rector-date">{{ $cd->format('d-m-y') }}</div>
                @else
                    <div class="rector-date">&nbsp;</div>
                @endif
                <div class="rector-dash">———</div>
                <div class="rector-sig-line"></div>
                <div class="rector-label">Rector Sign &amp; Stamp</div>
            </div>

            <div class="stamp-placeholder">
                <div class="stamp-circle-dash">Stamp<br>Here</div>
            </div>
        </div>

    </div>
</div>
</body>
</html>