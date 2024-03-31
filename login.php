<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ffdd0093;
            overflow-x: hidden; /* Remove horizontal scroll */
        }
        .container {
            width: 100vw; /* Adjusted to viewport width */
            height: 100%;
            background-repeat: no-repeat;
            color: azure;
            background-size: cover;
            background-position: center center;
            height: 100vh;
            position: relative;
        }
        .container .containerinner {
            width: 100%;
            height: 75px;
            margin: auto;
            position: absolute;
            top: 0%;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 25px;
            background-color: #333;
        }
        .container .containerinner ul {
            list-style-type: none;
            display: flex;
            padding: 50px;
        }
        .container .containerinner ul li {
            margin-right: 60px;
            transition: background-color 0.3s ease;
            font-size: 18px;
            padding: 7px 7px;
            border-radius: 5px;
            cursor: pointer;
        }
        .container .containerinner ul li:hover {
            background-color: rgba(236, 183, 24, 0.671);
        }
        .container .containerinner ul li:last-child {
            margin-right: 0;
        }
        .container .containerinner .signup:hover {
            background-color: #d7c00f;
        }
        .container .containerinner button.signup {
            color: #fff;
            background-color: transparent;
            border: none;
            transition: background-color 0.3s;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 50px;
            font-size: larger;
        }
        .container .containerinner button.harbor {
            background-color: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            font-size: x-large;
        }
        .container .containerinner button ion-icon {
            color: rgba(213, 8, 38, 0.8);
            background-color: transparent;
            border: none;
        }
        .container .containerinner ul li a {
            color: inherit;
            text-decoration: none;
        }
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 80%;
        }
        .login-container h1 {
            text-align: center;
            color: black;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            font-weight: bold;
            color: black;
        }
        .input-group input[type="text"],
        .input-group input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-group button {
            width: 50%;
			margin-left:25%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }
        .input-group button:hover {
            background-color: #555;
        }
        .login-container p {
            margin-left:7%;
			
        }
        .login-container p a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }
        .login-container p a:hover {
            color: #555;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="containerinner">
        <a href="title 2.php"><button class="harbor"><ion-icon name="paw-outline"></ion-icon> Pet Harbor</button></a>
        <ul>
                <li><a href="title 2.php">Home</a></li>
                <li><a href="achive.html">Achievements</a></li>
                <li><a href="adoption.html">Adoption</a></li>
                <li><a href="new.html">Donation</a></li>
                <li><a href="faq.html">FAQs</a></li>
                <li><a href="about.html">About</a></li>
        </ul>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <a href="login.php"><button class="signup">Login/Sign-Up</button></a>
    </div>
    <div class="login-container">
        <h1>Login to your profile</h1>
        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p><a href="forgot_password.php">forgot password?</a></p>
            <p>--------------------</p>
            <p>Not yet a member? <a href="register.php">Sign up</a></p>
        </form>
    </div>
</div>
</body>
</html>
