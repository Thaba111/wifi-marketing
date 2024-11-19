<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mama's Source</title>
    <style>
        body, html {
            background: url('/images/wood.jpg') no-repeat center center/cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            width: 375px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 20px 0;
        }

        .logo img {
            width: 150px;
            margin: 10px auto;
        }

        .button {
            width: 85%;
            padding: 7px;
            margin: 10px auto;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content:  flex-start;
            text-decoration: none;
        }

        .button img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .facebook { background-color: #3b5998; }
        .instagram { background-color: #C13584; }
        .twitter { background-color: #1DA1F2; }
        .email { background-color: #bdbdbd; color: #333; }
        .sms { background-color: #333; }

        .footer {
            margin-top: 15px;
            font-size: 12px;
            color: #666;
        }

        .footer a {
            color: #666;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/mamas-sauce-logo.png') }}" alt="Mama's Sauce Pizza">
        </div>

        <a href="{{ route('auth.redirection', ['provider' => 'facebook']) }}" class="button facebook">
            <img src="\images\fb-icon.png" alt="Facebook Icon">
            Connect with Facebook
        </a>
            
        <a href="#" class="button instagram">
            <img src="\images\ig-icon.png" alt="Instagram Icon">
            Connect with Instagram
        </a>
        <a href="#" class="button twitter">
            <img src="\images\x-icon.png" alt="Twitter Icon">
            Connect with Twitter
        </a>
        <a href="{{ route('auth.redirection', ['provider' => 'google']) }}" class="button email">
            <img src="/images/google-icon.png" alt="Google Icon">
            Connect with Google
        </a>

        <a href="#" class="button sms">
            <img src="\images\sms.png" alt="SMS Icon">
            Connect with SMS
        </a>

        <div class="footer">
            <a href="#">TERMS AND CONDITIONS</a>
        </div>
    </div>
</body>
</html>
