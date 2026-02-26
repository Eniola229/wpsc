<!DOCTYPE html>
<html lang="en">
<head>
    <title>Testimonial - {{ $student->name }}</title>
    <style>
        @page { size: A4 portrait; margin: 0; }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Times New Roman', serif;
            background: #fff;
        }

        .certificate-page {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: white;
            position: relative;
            padding: 0;
            overflow: hidden;
        }

        /* ── Side triangle arrows (left & right, pointing inward) ── */
        /* LEFT side — 3 stacked triangles pointing RIGHT */
        .side-triangles-left {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-left: 0;
        }
        .side-triangles-right {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        /* ── Corner triangles (4 corners) ── */
        .corner-tl {
            position: absolute; top: 0; left: 0;
            width: 0; height: 0;
            border-top: 55px solid #8B0000;
            border-right: 55px solid transparent;
        }
        .corner-tr {
            position: absolute; top: 0; right: 0;
            width: 0; height: 0;
            border-top: 55px solid #8B0000;
            border-left: 55px solid transparent;
        }
        .corner-bl {
            position: absolute; bottom: 0; left: 0;
            width: 0; height: 0;
            border-bottom: 55px solid #8B0000;
            border-right: 55px solid transparent;
        }
        .corner-br {
            position: absolute; bottom: 0; right: 0;
            width: 0; height: 0;
            border-bottom: 55px solid #8B0000;
            border-left: 55px solid transparent;
        }

        /* ── Side arrow triangles — LEFT pointing right ── */
        .tri-arrow-left {
            width: 0; height: 0;
            border-top: 18px solid transparent;
            border-bottom: 18px solid transparent;
            border-left: 28px solid #8B0000;
        }
        /* ── Side arrow triangles — RIGHT pointing left ── */
        .tri-arrow-right {
            width: 0; height: 0;
            border-top: 18px solid transparent;
            border-bottom: 18px solid transparent;
            border-right: 28px solid #8B0000;
        }

        /* ── Bottom center triangles ── */
        .bottom-triangles {
            text-align: center;
            margin-top: 18px;
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        .tri-down {
            width: 0; height: 0;
            border-left: 14px solid transparent;
            border-right: 14px solid transparent;
            border-top: 20px solid #8B0000;
            display: inline-block;
        }

        /* ── Main content wrapper ── */
        .content {
            padding: 30px 55px 20px;
            position: relative;
            z-index: 2;
        }

        /* ── Header ── */
        .header { text-align: center; margin-bottom: 6px; }

        .school-name-top {
            font-size: 11.5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #000;
            line-height: 1.4;
        }
        .affiliate-line {
            font-size: 11px;
            font-style: italic;
            color: #c8a600;
            font-weight: bold;
            margin: 3px 0;
        }
        .wpsc-line {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            color: #000;
            letter-spacing: 0.5px;
        }
        .email-line {
            font-size: 10.5px;
            color: #333;
            margin-top: 2px;
        }
        .doc-title-line {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #000;
            margin-top: 4px;
        }

        /* ── Gold divider lines ── */
        .gold-thick { border: none; border-top: 3px solid #c8a600; margin: 7px 0 2px; }
        .gold-thin  { border: none; border-top: 1px solid #c8a600; margin: 2px 0 7px; }

        /* ── Logo ── */
        .logo-area { text-align: center; margin: 10px 0 8px; }
        .logo-area img {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            border: 2px solid #8B0000;
            object-fit: cover;
        }

        /* ── Body text ── */
        .body-text {
            font-size: 13px;
            line-height: 1.85;
            color: #000;
            text-align: justify;
        }
        .body-text .line { margin-bottom: 4px; }

        /* ── Course list ── */
        .course-list {
            margin: 8px 0 8px 20px;
            font-size: 13px;
            line-height: 1.9;
            columns: 2;
            column-gap: 30px;
        }
        .course-list li {
            list-style: decimal;
            break-inside: avoid;
        }
        .course-list li .grade {
            font-weight: bold;
            margin-left: 12px;
        }

        /* ── Closing italic ── */
        .closing-text {
            font-size: 12.5px;
            font-style: italic;
            line-height: 1.7;
            color: #000;
            margin-top: 8px;
            text-align: justify;
        }

        /* ── Signature area ── */
        .sig-section { margin-top: 30px; }

        /* Gold lines above signature */
        .sig-gold-thick { border: none; border-top: 3px solid #c8a600; margin-bottom: 2px; }
        .sig-gold-thin  { border: none; border-top: 1px solid #c8a600; margin-bottom: 16px; }

        .signature-area {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .sign-box { text-align: center; width: 130px; }
        .sign-line { border-top: 1px solid #000; margin-top: 36px; }
        .sign-label {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 4px;
            letter-spacing: 0.5px;
            color: #000;
        }

        .stamp-box { text-align: center; }
        .stamp-box img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            border: 2px solid #1a5f1a;
            object-fit: cover;
        }
        .stamp-label {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 5px;
            letter-spacing: 1px;
            color: #000;
        }

        /* ── Rector sign has date above line ── */
        .rector-box { text-align: center; width: 130px; }
        .rector-date {
            font-size: 12px;
            font-style: italic;
            text-align: right;
            margin-bottom: 2px;
            color: #333;
        }
        .rector-line { border-top: 1px solid #000; margin-top: 36px; }
        .rector-label {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 4px;
            letter-spacing: 0.5px;
            text-align: center;
            color: #000;
        }

        @media print {
            body { background: white; }
            .certificate-page { margin: 0; width: 100%; min-height: 100vh; }
        }
    </style>
</head>
<body>

<div class="certificate-page">

    {{-- Corner triangles --}}
    <div class="corner-tl"></div>
    <div class="corner-tr"></div>
    <div class="corner-bl"></div>
    <div class="corner-br"></div>

    {{-- Left side arrow triangles --}}
    <div class="side-triangles-left">
        <div class="tri-arrow-left"></div>
        <div class="tri-arrow-left"></div>
        <div class="tri-arrow-left"></div>
    </div>

    {{-- Right side arrow triangles --}}
    <div class="side-triangles-right">
        <div class="tri-arrow-right"></div>
        <div class="tri-arrow-right"></div>
        <div class="tri-arrow-right"></div>
    </div>

    <div class="content">

        {{-- Header --}}
        <div class="header">
            <div class="school-name-top">Emmanuel Discipleship Bible Training Institute (EDBTI) Lagos, NIG</div>
            <div class="affiliate-line">An affiliate of</div>
            <div class="wpsc-line">Way of Peace Salvation Centre Worldwide (WPSC) Lagos, NIG</div>
            <div class="email-line">E-mail: wpsc2004@yahoo.com</div>
            <div class="doc-title-line">Testimonial</div>
        </div>

        <hr class="gold-thick">
        <hr class="gold-thin">

        {{-- Church Logo --}}
        <div class="logo-area">
            <img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg"
                 alt="EDBTI Logo">
        </div>

        {{-- Body --}}
        <div class="body-text">
            <div class="line">This is to certify that</div>
            <div class="line">
                Bro/Sis&nbsp; <strong>{{ $student->name }}</strong>
                &nbsp;&nbsp;&nbsp;&nbsp;
                Matric No&nbsp; <strong>{{ $student->matric_no }}</strong>
            </div>
            <div class="line">
                of <strong>EMMANUEL DISCIPLESHIP BIBLE TRAINING INSTITUTE, LAGOS.</strong> Has
                undergone an intensive training and studies in evangelism and bible
                for a period of <strong>TWO YEARS</strong>
                @if($result->certificate_date)
                    from <strong>{{ \Carbon\Carbon::parse($result->certificate_date)->format('jS F, Y') }}</strong>
                @else
                    from <strong>_______________</strong> to <strong>_______________</strong>
                @endif
                under the following courses with the grades.
            </div>
        </div>

        {{-- Course list — 2-column --}}
        <ol class="course-list">
            @foreach($result->items as $item)
            <li>{{ $item->course_name }}<span class="grade">{{ $item->grade }}</span></li>
            @endforeach
        </ol>

        {{-- Closing --}}
        <div class="closing-text">
            On his/her passing the prescribed examination, he/she will be
            awarded the Evangelism and Bible Knowledge Certificate by
            Emmanuel Discipleship Bible Training Institute (EDBTI).
        </div>

        {{-- Signature section --}}
        <div class="sig-section">
            <hr class="sig-gold-thick">
            <hr class="sig-gold-thin">

            <div class="signature-area">

                {{-- Registrar --}}
                <div class="sign-box">
                    <div class="sign-line"></div>
                    <div class="sign-label">School Registrar Sign</div>
                </div>

                {{-- Stamp --}}
                <div class="stamp-box">
                    <img src="https://res.cloudinary.com/dtxifnjiy/image/upload/v1736464781/WhatsApp_Image_2025-01-09_at_3.59.48_PM_kuxprl.jpg"
                         alt="School Stamp">
                    <div class="stamp-label">School Stamp</div>
                </div>

                {{-- Rector --}}
                <div class="rector-box">
                    @if($result->certificate_date)
                        <div class="rector-date">{{ \Carbon\Carbon::parse($result->certificate_date)->format('d-m-y') }}</div>
                    @else
                        <div class="rector-date">&nbsp;</div>
                    @endif
                    <div class="rector-line"></div>
                    <div class="rector-label">Rector of the<br>Institute Sign</div>
                </div>

            </div>
        </div>

        {{-- Bottom 3 triangles --}}
        <div class="bottom-triangles">
            <div class="tri-down"></div>
            <div class="tri-down"></div>
            <div class="tri-down"></div>
        </div>

    </div>{{-- /content --}}
</div>

</body>
</html>