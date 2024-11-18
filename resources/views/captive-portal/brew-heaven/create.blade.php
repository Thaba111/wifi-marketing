<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Heaven Captive Portal</title>
    <link rel="stylesheet" href="{{ asset('css/portal.css') }}">
    <style>
        /* General Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Main Styles */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('/images/cafe1.jpg') no-repeat center center/cover;
        }

        .portal-container {
            width: 90%;
            max-width: 400px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            padding: 20px;
            color: white;
            text-align: center;
            position: relative;
        }

        .portal-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 50px;
            margin-bottom: 25px;
        }

        .portal-header img {
            width: 40px;
        }

        .portal-header h1 {
            font-size: 2.3em;
            font-weight: bold;
        }

        p {
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .wifi-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: #333; */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin: 20px auto;
        }

        .wifi-icon img {
            width: 70px;
            opacity: 0.8;
        }

        .checkbox-container {
            text-align: left;
            margin: 15px 0;
        }

        .checkbox-container label {
            font-size: 0.8em;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .checkbox-container input {
            margin-right: 8px;
        }

        .connect-btn {
            background-color: #ff6600;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
        }

        .footer-logo {
            margin-top: 20px;
        }

        .footer-logo img {
            width: 40px;
        }

        .input-field {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            font-size: 1em;
        }

        .input-field::placeholder {
            color: #ccc;
        }

        .social-login {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .social-login a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: #f5f5f5;
            color: #555;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .social-login a:hover {
            background-color: #e0e0e0;
        }

        .social-login img {
            height: 20px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="portal-container">
        <div class="portal-header">
            <h1>BREW HEAVEN</h1>
        </div>

        <p>Welcome to our place. We hope you have a long and enjoyable stay!</p>

        <div class="wifi-icon">
            <img src="/images/wifi3.png" alt="WiFi Icon">
        </div>

        <form action="{{ route('captive-portal.store') }}" method="POST">
            @csrf

            <!-- Name and Email Fields -->
            <input type="text" name="name" class="input-field" placeholder="Enter your name" required>
            <input type="email" name="email" class="input-field" placeholder="Enter your email" required>

            <div class="checkbox-container">
                <label><input type="checkbox"> I agree with the Terms of Use</label>
                <label><input type="checkbox"> I agree with the Privacy Policy</label>
                <label><input type="checkbox"> Accept Marketing Materials</label>
            </div>

            <button class="connect-btn">Connect to WiFi</button>
        </form>

        <!-- Social login -->
        <div class="social-login">
            <a href="{{ route('auth.redirection', ['provider' => 'google']) }}">
                <img src="/images/google-icon.png" alt="Google Icon">
                Log in with Google
            </a>

            <a href="{{ route('auth.redirection', ['provider' => 'facebook']) }}">
                <img src="/images/fb.png" alt="Facebook Icon">
                Log in with Facebook
            </a>
        </div>
    </div>
</body>
</html>
