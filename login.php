<?php
  include("includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Grocery Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
      <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center; /* Centering the container vertically */
            min-height: 100vh;
        }

        .login-container {
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 800px;
            display: flex;
            flex-wrap: wrap;
            gap: 60px; /* Increased gap as requested */
            justify-content: space-between;
        }

        .login-container h2 {
            width: 100%;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .login-form-section,
        .social-login-section {
            flex: 1;
            min-width: 300px;
        }

        .social-login-section {
            background-color: #f5f5f5;
            padding: 5% 20px;
            border-radius: 8px; /* Added border-radius */
            display: flex; /* Added flex for internal alignment */
            flex-direction: column;
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center content horizontally */
        }

        .social-login-section p {
            color: black;
        }

        .input-group {
            margin-bottom: 10px; /* Reduced margin */
            text-align: left;
        }

        .input-group input[type="email"],
        .input-group input[type="password"],
        .input-group input[type="text"] { /* Added text type for name */
            width: 100%;
            padding: 7px 20px; /* Adjusted padding */
            border: 1px solid #ddd;
            border-radius: 4px; /* Added border-radius */
            font-size: 16px;
        }

        .login-button, .register-button { /* Combined styles for both buttons */
            margin-top: 6px; /* Adjusted margin */
            width: 100%;
            padding: 8px; /* Adjusted padding */
            background-color: #ffc43f; /* New color */
            color: white;
            border: none;
            border-radius: 4px; /* Added border-radius */
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover, .register-button:hover {
            background-color: #e0b030; /* Slightly darker hover for consistency */
        }

        .social-login {
            margin-top: 0;
            text-align: center;
            width: 100%; /* Ensure it takes full width of its section */
        }

        .social-login p {
            color: black; /* Changed to black */
            margin-bottom: 15px;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%; /* Adjusted width */
            height: 1px;
            background-color: black; /* Changed to black */
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-button {
            display: block;
            width: 100%;
            padding: 8px; /* Adjusted padding */
            font-size: 15.5px; /* Adjusted font size */
            cursor: pointer;
            margin-bottom: 8px; /* Adjusted margin */
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
            border-radius: 4px; /* Added border-radius */
            border: none; /* Removed border as per new design */
        }

        .social-button.facebook {
            background-color: #0e35b6; /* New color */
            color: white;
        }

        .social-button.google {
            background-color: #db4437; /* Kept Google's original color */
            color: white;
        }

        .social-button:hover.facebook {
            background-color: #2d4373;
        }

        .social-button:hover.google {
            background-color: #c0352b;
        }

        .social-button img {
            margin-right: 10px;
            height: 20px;
        }

        .forgot-password,
        .signup-link,
        .login-link { /* Added login-link */
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
            width: 100%;
            color: black; /* Changed to black */
        }

        .forgot-password a,
        .signup-link a,
        .login-link a {
            color: #ffc43f; /* New color */
            text-decoration: none;
            cursor: pointer; /* Indicate it's clickable */
        }

        .forgot-password a:hover,
        .signup-link a:hover,
        .login-link a:hover {
            text-decoration: underline;
        }

        /* Form toggle styles */
        .form-content {
            display: none;
        }

        .form-content.active {
            display: block;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
            }
            .login-form-section,
            .social-login-section {
                min-width: unset;
            }
            .social-login p::before,
            .social-login p::after {
                width: 30%;
            }
        }
      </style>
  </head>
  <body>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
       <defs>
         <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
           <path fill="currentColor" d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
           <path fill="currentColor" d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
           <path fill="currentColor" d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
           <path fill="currentColor" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
           <path fill="currentColor" d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
           <path fill="currentColor" d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
           <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
           <path fill="currentColor" d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
           <path fill="currentColor" d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
           <path fill="currentColor" d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
           <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
           <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
           <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
           <path fill="currentColor" d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z"/>
         </symbol>
         <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
           <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
         </symbol>
       </defs>
     </svg>

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>

    <div class="login-container">
        <h2>Welcome to Grocery Store</h2>

        <div class="login-form-section">
            <!-- Login Form -->
            <div id="loginForm" class="form-content active">
                <form action="#" method="POST">
                    <div class="input-group">
                        <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="login-button">Login</button>
                </form>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
        </div>

        <div class="social-login-section">
            <div class="social-login">
                <p>Or continue with</p>
                <a href="#" class="social-button facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook icon">
                    Continue with Facebook
                </a>
                <div class="signup-link">
                    Don't have an account? <a href="#" id="showRegister">Sign up</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
