<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate - {{ $student->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Great+Vibes&display=swap" rel="stylesheet">
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

        /* ══ DIAGONAL RIBBON — top-left ══ */
        .ribbon-tl {
            position: absolute;
            top: 0; left: 0;
            z-index: 3;
            width: 200px;
            height: 200px;
        }

        /* ══ DIAGONAL RIBBON — bottom-right ══ */
        .ribbon-br {
            position: absolute;
            bottom: 0; right: 0;
            z-index: 3;
            width: 200px;
            height: 200px;
        }

        /* ══ GOLD L-BRACKETS ══ */
        .bracket-tr {
            position: absolute; top: 18px; right: 18px;
            width: 55px; height: 55px;
            border-top: 3.5px solid #c8a600;
            border-right: 3.5px solid #c8a600;
            z-index: 4;
        }
        .bracket-bl {
            position: absolute; bottom: 18px; left: 18px;
            width: 55px; height: 55px;
            border-bottom: 3.5px solid #c8a600;
            border-left: 3.5px solid #c8a600;
            z-index: 4;
        }

        /* ══ CONTENT ══ */
        .content {
            position: relative;
            z-index: 2;
            padding: 30px 58px 26px;
            text-align: center;
        }

        /* ══ LOGOS ROW ══ */
        .logos-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 70px;
            margin-bottom: 16px;
        }

        /* Left logo — rectangular card style */
        .logo-left img {
            width: 88px;
            height: 88px;
            object-fit: contain;
            display: block;
            border: 2px solid #2a6e2a;
        }

        /* Right logo — circular with red/blue border */
        .logo-right img {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            border: 3px solid #1a3a8a;
            object-fit: cover;
            display: block;
        }

        /* ══ SCHOOL NAMES ══ */
        .school-main {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #000;
            line-height: 1.5;
            margin-bottom: 5px;
        }
        .affiliate-line {
            font-size: 14.5px;
            font-weight: bold;
            color: #c0392b;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 6px 0 5px;
        }
        .wpsc-line {
            font-size: 11.5px;
            text-transform: uppercase;
            color: #000;
            letter-spacing: 0.4px;
            margin-bottom: 2px;
        }
        .email-line {
            font-size: 11px;
            color: #000;
            text-transform: uppercase;
            margin-top: 2px;
        }

        /* ── Gold dividers ── */
        .gd-thick { border: none; border-top: 2.5px solid #c8a600; margin: 10px 0 2px; }
        .gd-thin  { border: none; border-top: 1px   solid #c8a600; margin: 2px 0 14px; }
        .rd-thick { border: none; border-top: 2.5px solid #c8a600; margin: 6px 0 2px; }
        .rd-thin  { border: none; border-top: 1px   solid #c8a600; margin: 2px 0 16px; }

        /* ── Body italic text ── */
        .certify-intro {
            font-size: 13px;
            font-style: italic;
            color: #6b2a2a;
            margin-bottom: 10px;
        }

        .student-info-line {
            font-size: 13.5px;
            font-style: italic;
            color: #6b2a2a;
            display: flex;
            justify-content: center;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 8px;
        }
        .s-label        { color: #6b2a2a; font-style: italic; }
        .s-name         { font-weight: bold; font-style: italic; font-size: 15px; color: #000; text-decoration: underline; text-transform: uppercase; }
        .s-matric-label { color: #6b2a2a; font-style: italic; }
        .s-matric       { font-weight: bold; color: #000; border-bottom: 1.5px solid #000; padding: 0 10px; min-width: 60px; display: inline-block; text-align: center; font-style: normal; }

        .having-text {
            font-size: 12.5px;
            font-style: italic;
            color: #6b2a2a;
            line-height: 1.8;
            margin-bottom: 16px;
        }

        /* ── Certificate Title ── */
        .ct-cert    { font-family: 'Cinzel', serif; font-size: 26px; font-weight: 700; text-transform: uppercase; letter-spacing: 3px; color: #000; line-height: 1.3; }
        .ct-in      { font-family: 'Cinzel', serif; font-size: 16px; font-weight: 600; text-transform: uppercase; color: #000; margin: 4px 0; }
        .ct-subject { font-family: 'Cinzel', serif; font-size: 18px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #000; line-height: 1.4; }

        /* ── Grade / date ── */
        .grade-line {
            font-size: 13.5px;
            color: #000;
            margin: 20px 0 6px;
            display: flex;
            justify-content: center;
            align-items: baseline;
            gap: 6px;
            flex-wrap: wrap;
        }
        .uval {
            font-weight: bold;
            color: #8B0000;
            border-bottom: 1.5px solid #000;
            padding: 0 12px;
            display: inline-block;
            min-width: 160px;
            text-align: center;
        }

        .date-line {
            font-size: 13.5px;
            color: #000;
            margin: 6px 0 24px;
            display: flex;
            justify-content: center;
            align-items: baseline;
            gap: 5px;
            flex-wrap: wrap;
        }
        .dval {
            font-weight: bold;
            border-bottom: 1.5px solid #000;
            padding: 0 8px;
            min-width: 48px;
            text-align: center;
            display: inline-block;
        }

        /* ── Registrar — centered ── */
        .sig-registrar {
            display: flex;
            justify-content: center;
            margin-bottom: 22px;
        }
        .sign-center-box { text-align: center; width: 200px; }
        .sig-line  { border-top: 1.5px solid #000; margin-top: 6px; }
        .sig-label { font-size: 11px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px; }

        /* ── Bottom: rector left, stamp right ── */
        .sig-bottom {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .rector-box { text-align: left; }
        .rector-date { font-style: italic; font-size: 13px; color: #333; margin-bottom: 4px; }
        .rector-sig-line { border-top: 1.5px solid #000; margin-top: 6px; width: 180px; }
        .rector-label { font-size: 11px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px; }

        .stamp-placeholder { text-align: center; }
        .stamp-circle-dash {
            width: 90px; height: 90px;
            border-radius: 50%;
            border: 2px dashed #999;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #999;
            font-style: italic;
            text-align: center;
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

    <!-- TOP-LEFT: slightly curved diagonal stripe bands -->
    <svg class="ribbon-tl" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <!-- BLACK thick — closest to corner -->
        <path d="M 70,0 Q 35,35 0,70 L 0,0 Z" fill="#1a1a1a"/>
        <!-- PINK thin -->
        <path d="M 100,0 Q 50,50 0,100 L 0,80 Q 40,40 80,0 Z" fill="#c4607a"/>
        <!-- GOLD medium -->
        <path d="M 148,0 Q 74,74 0,148 L 0,112 Q 56,56 112,0 Z" fill="#c8980a"/>
        <!-- BLACK thin — outermost -->
        <path d="M 172,0 Q 86,86 0,172 L 0,158 Q 79,79 158,0 Z" fill="#1a1a1a"/>
    </svg>

    <!-- BOTTOM-RIGHT: mirror -->
    <svg class="ribbon-br" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <!-- BLACK thick -->
        <path d="M 130,200 Q 165,165 200,130 L 200,200 Z" fill="#1a1a1a"/>
        <!-- PINK thin -->
        <path d="M 100,200 Q 150,150 200,100 L 200,120 Q 160,160 120,200 Z" fill="#c4607a"/>
        <!-- GOLD medium -->
        <path d="M 52,200 Q 126,126 200,52 L 200,88 Q 144,144 88,200 Z" fill="#c8980a"/>
        <!-- BLACK thin -->
        <path d="M 28,200 Q 114,114 200,28 L 200,42 Q 121,121 42,200 Z" fill="#1a1a1a"/>
    </svg>

    <!-- Gold L-brackets -->
    <div class="bracket-tr"></div>
    <div class="bracket-bl"></div>

    <div class="content">

        <!-- LOGOS -->
        <div class="logos-row">

            <!-- Left: Church rectangular logo -->
            <div class="logo-left">
                <img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg"
                     alt="Church Logo">
            </div>

            <!-- Right: EDBTI circular logo -->
            <div class="logo-right">
                <img src="https://res.cloudinary.com/di2ci6rz8/image/upload/v1772443183/laravel_images/vhohjeoix4mnigsfatzc.jpg"
                     alt="EDBTI Logo">
            </div>

        </div>

        <!-- School Names -->
        <div class="school-main">
            Emmanuel Discipleship Bible Training Institute (EDBTI)<br>
            Lagos NIG.
        </div>
        <div class="affiliate-line">An Affiliate of</div>
        <div class="wpsc-line">Way of Peace Salvation Centre Worldwide (WPSC) Lagos NIG.</div>
        <div class="email-line">E-Mail: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1b4c4b4858292b2b2f5b425a53545435585456">[email&#160;protected]</a></div>

        <hr class="gd-thick"><hr class="gd-thin">

        <!-- Body -->
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
            <span class="dval" style="min-width:90px;">{{ $cd ? strtoupper($cd->format('F')) : '________' }}</span>
            20<span class="dval">{{ $cd ? $cd->format('y') : '__' }}</span>
        </div>

        <!-- Registrar signature — centered -->
        <div class="sig-registrar">
            <div class="sign-center-box">
                <div style="height:36px;"></div>
                <div class="sig-line"></div>
                <div class="sig-label">Registrar Sign</div>
            </div>
        </div>

        <hr class="rd-thick"><hr class="rd-thin">

        <!-- Rector + Stamp -->
        <div class="sig-bottom">
            <div class="rector-box">
                @if($cd)
                    <div class="rector-date">{{ $cd->format('d-m-y') }}</div>
                @else
                    <div class="rector-date">&nbsp;</div>
                @endif
                <div style="height:36px;"></div>
                <div class="rector-sig-line"></div>
                <div class="rector-label">Rector Sign &amp; Stamp</div>
            </div>

            <div class="stamp-placeholder">
                <div class="stamp-circle-dash">Stam