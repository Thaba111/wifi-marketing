<!-- resources/views/captive-portal/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captive Portal</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .portal-container {
            width: 90%;
            max-width: 400px;
            border-radius: 15px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Header Section */
        .portal-header {
            background-image: url('/images/cafe-bg.jpg'); /* Replace with your background */
            background-size: cover;
            background-position: center;
            padding: 30px;
            text-align: center;
            color: white;
        }

        .portal-header h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .portal-header p {
            font-size: 14px;
        }

        /* Form Section */
        .portal-form {
            padding: 30px;
        }

        .portal-form input {
            border-radius: 30px;
            height: 50px;
        }

        .portal-form .connect-btn {
            background-color: #ff6f3c;
            color: white;
            font-weight: bold;
            border-radius: 30px;
        }

        .portal-form .connect-btn:hover {
            background-color: #e55d2b;
        }

        /* Footer Section */
        .portal-footer {
            text-align: center;
            padding: 15px;
        }

        .portal-footer img {
            width: 30px;
            margin: 0 5px;
        }
    </style>
</head>
<body style="background-image: url('/images/burger.jpg'); background-size: cover;">

    <div class="portal-container">
        <!-- Header Section -->
        <div class="portal-header">
            <h1>Brew Heaven</h1>
            <p>Enjoy our WiFi Service. We hope you have a long and enjoyable stay!</p>
        </div>

        <!-- Form Section -->
        <div class="portal-form">
            <form method="POST" action="{{ route('captive-portal.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="terms" required>
                    <label class="form-check-label">I agree with the Terms of Use</label>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="marketing">
                    <label class="form-check-label">Accept Marketing Materials</label>
                </div>
                <button type="submit" class="btn connect-btn w-100">Connect to WiFi</button>
            </form>
        </div>

        <!-- Footer Section -->
        <div class="portal-footer">
            <img src="/images/facebook-icon.png" alt="Facebook">
            <img src="/images/instagram-icon.png" alt="Instagram">
            <img src="/images/twitter-icon.png" alt="Twitter">
        </div>
    </div>

</body>
</html>
