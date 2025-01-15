<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e3e3e3;
            border-radius: 8px;
            overflow: hidden;
        }
        .email-header {
            background-color: #28a745;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-body p {
            margin: 0 0 15px;
            line-height: 1.6;
        }
        .email-footer {
            padding: 15px;
            text-align: center;
            background-color: #f4f4f4;
            font-size: 12px;
            color: #999999;
        }
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Way of Peace Salvation Centre Worldwide</h1>
        </div>
        <div class="email-body">
            <p>Dear {{ $student->name }},</p>
            <p>
                Congratulations! We are pleased to inform you that you have been admitted to 
                <strong>Way of Peace Salvation Centre Worldwide</strong>. We are excited to have you join our spiritual community and educational program.
            </p>
            <p><strong>Your Details:</strong></p>
            <ul>
                <li><strong>Matriculation Number:</strong> {{ $student->matric_no }}</li>
                <li><strong>Full Name:</strong> {{ $student->name }}</li>
                <li><strong>Date of Birth:</strong> {{ $student->dob }}</li>
                <li><strong>State of Origin:</strong> {{ $student->state_of_origin }}</li>
                <li><strong>Email:</strong> {{ $student->email }}</li>
            </ul>
            <p>
                If you have any questions or need further assistance, feel free to contact us. 
                We are here to support you in your spiritual and educational journey.
            </p>
            <p>
                <a href="https://www.wayofpeace.org" class="btn">Visit Our Website</a>
            </p>
            <p>With regards,<br>The Admission Team</p>
        </div>
        <div class="email-footer">
            &copy; {{ date('Y') }} Way of Peace Salvation Centre Worldwide. All Rights Reserved.
        </div>
    </div>
</body>
</html>
