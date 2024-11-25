<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew Heaven Captive Portal - Login</title>
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
            margin-bottom: 25px;
        }

        .portal-header h1 {
            font-size: 2.3em;
            font-weight: bold;
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

        .login-btn {
            background-color: #ff6600;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 20px;
        }

        .login-btn:hover {
            background-color: #e55a00;
        }
    </style>
</head>
<body>
    <div class="portal-container">
        <div class="portal-header">
            <h1>BREW HEAVEN</h1>
        </div>

        <p>Welcome back! Please log in to access the dashboard.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address Field -->
            <input type="email" name="email" class="input-field" placeholder="Enter your email" required>

            <!-- Password Field -->
            <input type="password" name="password" class="input-field" placeholder="Enter your password" required>

            <!-- Terms and Conditions -->
            <div class="checkbox-container">
                <label>
                    <input type="checkbox" required> I agree with the Terms of Use
                </label>
                <label>
                    <input type="checkbox" required> I agree with the Privacy Policy
                </label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="login-btn">Log in</button>
        </form>
    </div>
</body>
</html>
