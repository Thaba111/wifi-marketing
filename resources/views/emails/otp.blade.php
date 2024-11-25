<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #ff6600;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>OTP Confirmation</h1>
        <p>Dear user,</p>
        <p>Please use the following OTP to confirm your email address:</p>
        <p class="otp">{{ $otp }}</p>
        <p>This OTP is valid for 5 minutes. If you did not request this, please ignore this email.</p>
        <div class="footer">
            <p>Thank you,</p>
            <p>Your Application Team</p>
        </div>
    </div>
</body>
</html>
