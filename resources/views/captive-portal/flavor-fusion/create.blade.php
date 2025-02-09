<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flavor Fusion</title>
   
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('/images/cafe1.jpg'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: #ddd;
            font-size: 16px;
            box-shadow: inset 0 1px 3px rgba(255, 255, 255, 0.2);
            transition: background 0.3s, border-color 0.3s;
        }

        .input-field:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            border-color: #ff6f3c;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.75); 
            width: 95%;
            max-width: 800px; 
            padding: 40px; 
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }


        h2 {
            font-size: 28px; 
            font-weight: bold;
            color: white;
        }

        p {
            color: #ddd;
        }

        .promo {
            background-color: #ff6f3c;
            color: white;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            margin-top: 10px;
            font-style: italic;
            text-align: center;
        }

        .menu-button {
            background-color: rgba(0, 0, 0, 0.85);   
            color: white;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            /* text-transform: uppercase; */
            font-size: 14px; 
            position: absolute;
            left: 1px;
            top: 50%;
            transform: translateY(-110%);
            cursor: pointer;
            text-align: center;
            
        }

        .menu-button:hover {
            background-color: #333;
        }

        .checkbox-container {
            display: flex;
            flex-direction: column;
            align-items: start;
            color: #ddd;
            gap: 12px;
        }

        .btn-connect {
            width: 100%;
            padding: 10px;
            background-color: #ff6f3c;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
            text-align: center;
        }

        .btn-connect:hover {
            background-color: #e55d2b;
        }

        /* Social login buttons */
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
        font-size: 1em;
        text-align: left;
    }

    .social-login a:hover {
        background-color: #e0e0e0;
    }

    .social-login img {
        height: 20px;
        margin-right: 8px;
    }

    .social-login .google-btn {
        background-color: #4285F4;
        border: 1px solid #357AE8;
    }

    .social-login .google-btn:hover {
        background-color: #357AE8;
        color: white;
    }

    .social-login .facebook-btn {
        background-color: #3B5998;
        border: 1px solid #2D4373;
    }

    .social-login .facebook-btn:hover {
        background-color: #2D4373;
        color: white;
    }

        /* Tablet view */
        @media (max-width: 768px) {
            .form-container {
                padding: 30px;
            }

            .menu-button {
                width: 90px;
                height: 90px;
                font-size: 12px;
            }

            h2 {
                font-size: 34px;
            }

            .promo {
                font-size: 15px;
            }

            
        }

        /* Mobile view */
        @media (max-width: 600px) {
            .form-container {
                width: 90%;
                padding: 20px;
            }

            .menu-button {
                position: static; 
                margin-bottom: 20px;
                transform: none; 
                width: 80px;
                height: 80px;
                font-size: 12px;
            }

            h2 {
                font-size: 24px;
            }

            .promo {
                font-size: 14px;
            }

            .btn-connect {
                font-size: 16px;
            }
            .social-login a {
                font-size: 0.9em;
                padding: 8px;
    }
                       
        }
    </style>
</head>
<body>

<div class="form-container">
    <!-- <div class="language-selector">
        <img src="/images/flag-en.png" alt="English" width="20" height="15"> EN | 
        <img src="/images/flag-fr.png" alt="French" width="20" height="15"> FR | 
        <img src="/images/flag-es.png" alt="Spanish" width="20" height="15"> ES
    </div> -->

    <div class="menu-button">
        Order Now<br>Menu
    </div>

    <h2>FLAVOR FUSION BISTRO</h2>
    <p>Welcome to Flavor Fusion Bistro! Enjoy your meal and connect to our free WiFi for a seamless dining experience.</p>

    <div class="promo">Subscribe to our newsletter and get 15% discount</div>

    <form action="{{ route('captive-portal.store') }}" method="POST">
    @csrf
       
    <input type="text" name="name" placeholder="Your Name" class="input-field" required>
    <input type="email" name="email" placeholder="Your Email" class="input-field" required>

    
    <div class="checkbox-container">
            <label>
                <input type="checkbox" name="consent" required>
                I agree with service Terms and Privacy Policy
            </label>
            <label>
                <input type="checkbox" name="marketing" required>
                Accept Marketing Materials
            </label>
        </div>

        <button type="submit" class="btn-connect">Connect to WiFi</button>
    </form>

    <div class="social-login">
    <a href="{{ route('auth.redirection', ['provider' => 'google']) }}">
        <img src="/images/google-icon.png" alt="Google Icon" style="width: 24px; vertical-align: middle;">
        Log in with Google
    </a>
    <a href="{{ route('auth.redirection', ['provider' => 'facebook']) }}">
        <img src="/images/fb.png" alt="Facebook Icon" style="width: 24px; vertical-align: middle;">
        Log in with Facebook
    </a>
</div>

</div>

</body>
</html>
