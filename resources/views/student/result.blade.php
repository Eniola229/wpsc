<!DOCTYPE html>
<html lang="en">
<head>
    <title>Result Sheet</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <style>
        body { font-family: 'Open Sans', sans-serif; background: #f0f2f5; padding: 20px; }
        .result-container { max-width: 850px; margin: 0 auto; background: white; padding: 40px 50px; border: 1px solid #ddd; box-shadow: 0 0 15px rgba(0,0,0,0.05); }
        
        /* Header */
        .header { text-align: center; margin-bottom: 10px; }
        .header h2 { 
            margin: 0; 
            text-transform: uppercase; 
            font-weight: 800; 
            font-size: 20px; 
            letter-spacing: 1px; 
            color: #1a5f1a;
        }
        .header .affiliate { color: #c0392b; font-size: 13px; font-weight: 700; margin: 3px 0; }
        .header .wpsc { color: #1a5f1a; font-size: 13px; font-weight: 700; text-transform: uppercase; }
        .header .address { font-size: 11px; color: #333; margin: 3px 0; }
        .header-divider { border-top: 3px solid #f4c518; border-bottom: 3px solid #1a5f1a; margin: 10px 0 5px; }

        /* Ref Row */
        .ref-row { display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 8px; }

        /* Title */
        .report-title { text-align: center; font-weight: 700; font-size: 15px; text-decoration: underline; margin: 10px 0; text-transform: uppercase; }

        /* Student Info */
        .student-info { font-size: 13px; margin-bottom: 8px; }
        .info-line { margin-bottom: 4px; }
        .info-sub { display: flex; justify-content: space-between; }

        /* Table */
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; font-size: 12px; }
        th, td { border: 1px solid #000; padding: 6px 8px; text-align: center; }
        th { background-color: #f4f4f4; font-weight: 700; text-transform: uppercase; font-size: 11px; }
        td.course-title { text-align: left; font-weight: 600; }
        td.distinction { font-weight: 700; }

        /* School Ratings */
        .ratings-row { display: flex; justify-content: space-between; align-items: flex-start; font-size: 11px; margin-top: 5px; }
        .ratings-box { }
        .ratings-box table { margin: 0; border: none; }
        .ratings-box table td { border: none; padding: 1px 5px; text-align: left; font-size: 11px; }
        
        .remarks-sign { flex: 1; padding-left: 30px; }
        .remarks-sign .remark-line { margin-bottom: 20px; }
        .rector-sign { margin-top: 5px; }

        /* Stamp area */
        .stamp-area { text-align: center; margin: 10px 0; }
        .stamp-box { display: inline-block; border: 1px solid #555; padding: 5px 20px; font-size: 12px; font-weight: 700; }

        /* Footer */
        .footer-divider { border-top: 3px solid #f4c518; border-bottom: 3px solid #1a5f1a; margin: 10px 0 5px; }
        .footer-text { text-align: center; font-weight: 700; font-size: 13px; color: #1a5f1a; letter-spacing: 1px; }

        .btn-print { position: fixed; top: 20px; right: 20px; padding: 10px 25px; background: #333; color: white; border: none; cursor: pointer; border-radius: 5px; z-index: 9999; }
        @media print { 
            .btn-print { display: none; } 
            body { background: white; padding: 0; } 
            .result-container { box-shadow: none; border: none; } 
        }
    </style>
</head>
<body>

<button class="btn-print" onclick="window.print()">Print Result</button>

<div class="result-container">

    <!-- Header -->
    <div class="header">
        <h2>Emmanuel Discipleship Bible Training Institute</h2>
        <div class="affiliate">An affiliate of</div>
        <div class="wpsc">Way of Peace Salvation Centre Worldwide</div>
        <div class="address">
            House 25, Lateef Danda Street Off Iruit Rd, Edan - Igando, Alimosho LGA<br>
            Lagos Tel: 0803-429-9064, 0807-719-8404 &nbsp;|&nbsp; E-mail: Wpsc2004@yahoo.com
        </div>
    </div>
    <div class="header-divider"></div>

    <!-- Ref Row -->
    <div class="ref-row">
        <span>Our Ref:................................</span>
        <span>Your Ref:................................</span>
    </div>

    <!-- Report Title -->
    <div class="report-title">{{ $result->level }} Report Sheet</div>

    <!-- Student Info -->
    <div class="student-info">
        <div class="info-line">
            <span>Name of student: <strong>{{ $student->name }}</strong></span>
        </div>
        <div class="info-sub">
            <span>Matric number: <strong>{{ $student->matric_no }}</strong></span>
            <span>Year <strong>{{ $result->session }}</strong> Academic Section</span>
        </div>
        <div class="info-sub">
            <span>Number in class: <strong>{{ $result->class_size ?? '---' }}</strong></span>
            <span>GRADE: <strong>{{ $result->total_grade }}</strong></span>
            <span>Position in Class: <strong>{{ $result->class_position ?? '1ST' }}</strong></span>
        </div>
    </div>

    <!-- Course Table -->
    <table>
        <thead>
            <tr>
                <th style="width:5%">NO</th>
                <th style="width:25%">COURSE TITLE</th>
                <th style="width:8%">CODE</th>
                <th style="width:10%">MARK</th>
                <th style="width:8%">GRADE</th>
                <th style="width:16%">REMARK</th>
                <th style="width:8%">NO IN CLASS</th>
                <th style="width:10%">POSITION IN COURSE</th>
                <th style="width:10%">SIGNATURE</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($result->items as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td class="course-title">{{ $item->course_name }}</td>
                <td>{{ $item->course_code ?? '---' }}</td>
                <td>{{ $item->score }}</td>
                <td>{{ $item->grade }}</td>
                <td>{{ $item->remark }}</td>
                <td>{{ $result->class_size ?? '---' }}</td>
                <td>{{ $item->position_in_course ?? '1ST' }}</td>
                <td></td>
            </tr>
            @endforeach

            <!-- Blank rows to fill space if needed -->

            <!-- Assignment Row -->
            <tr>
                <td>1</td>
                <td class="course-title">ASSIGNMENT</td>
                <td>----</td>
                <td>{{ $result->assignment_score }}</td>
                <td>{{ $result->assignment_grade }}</td>
                <td>EXCELLENT</td>
                <td>{{ $result->class_size ?? '---' }}</td>
                <td>{{ $result->assignment_position ?? '1ST' }}</td>
                <td></td>
            </tr>
            <!-- Class Test Row -->
            <tr>
                <td>2</td>
                <td class="course-title">CLASS TEST</td>
                <td>----</td>
                <td>{{ $result->test_score }}</td>
                <td>{{ $result->test_grade }}</td>
                <td>EXCELLENT</td>
                <td>{{ $result->class_size ?? '---' }}</td>
                <td>{{ $result->test_position ?? '2ND' }}</td>
                <td></td>
            </tr>
            <!-- Overall Result Row -->
            <tr>
                <td colspan="3" style="text-align:center; font-weight:700;">OVER ALL RESULT</td>
                <td><strong>{{ $result->total_score }}</strong></td>
                <td><strong>{{ $result->total_grade }}</strong></td>
                <td class="distinction"><strong>{{ $result->total_remark }}</strong></td>
                <td>{{ $result->class_size ?? '---' }}</td>
                <td><strong>{{ $result->overall_position ?? '1ST' }}</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <!-- Bottom: Ratings + Remarks + Sign -->
    <div class="ratings-row">
        <div class="ratings-box">
            <strong style="font-size:11px;">SCHOOL RATINGS</strong>
            <table>
                <tr><td>57. 90 – 100</td><td>EXCELLENT</td><td>A1</td></tr>
                <tr><td>58. 80 – 90</td><td>V. GOOD</td><td>A</td></tr>
                <tr><td>59. 70 – 80</td><td>GOOD</td><td>B2</td></tr>
                <tr><td>60. 60 – 70</td><td>CREDIT</td><td>C4</td></tr>
                <tr><td>61. 50 – 60</td><td>MERIT</td><td>D5</td></tr>
                <tr><td>62. 40 – 50</td><td>FAIR</td><td>E6</td></tr>
                <tr><td>63. 0 – 39</td><td>FAIL</td><td>F9</td></tr>
            </table>
        </div>

        <div class="remarks-sign">
            <div class="remark-line">
                Remarks: ................................................................
            </div>
            <div class="rector-sign">
                RECTOR SIGN: ................................................................
            </div>
        </div>
    </div>

    <!-- Stamp Area -->
    <div class="stamp-area" style="margin-top: 15px;">
        <div class="stamp-box">
            WPSC<br>
            D. SIGN: ............<br>
            <strong>RECTOR SIGN &amp; STAMP</strong>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer-divider"></div>
    <div class="footer-text">JESUS CHRIST IS ALIVE REV 1:4-8,18</div>

</div>
</body>
</html>