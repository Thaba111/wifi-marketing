<!-- resources/views/emails/admin_verification.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Verification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Please click the link below to verify your email address:</p>
    <p><a href="{{ $verificationUrl }}">Verify Email</a></p>
</body>
</html>
