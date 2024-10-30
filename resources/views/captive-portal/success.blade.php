<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Successful</title>
</head>
<body>
    <div class="success-message">
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @else
            <p>You are connected to WiFi!</p>
        @endif
    </div>
</body>
</html>
