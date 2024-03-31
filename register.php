<?php
$errors = array(); // Initialize $errors as an empty array

// Your registration logic here

if (count($errors) > 0) {
    include('errors.php'); // Include errors.php only if $errors is not empty
}
?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <style>
    *{
      font-family:Arial,sans-serif;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #ffdd0093;
    }
	.container{
            width: 100%;
            height: 100%;
            background-color: #ffdd0093;
            background-repeat: no-repeat;
            color: azure;
            background-size: cover;
            background-position: center center;
            height: 100vh; /* Added a background color for visibility */
        }
        .container .containerinner{
            width: 100%;
            height: 75px; /* Corrected typo in background-color */
            margin: auto;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 25px;
            position: fixed;
            background-color:#333;
        }
        .container .containerinner ul {
            list-style-type: none;
            display: flex;
            padding: 50px;
        }
        .container .containerinner ul li {
            margin-right: 60px; /* Decrease the margin between the options */
            transition: background-color 0.3s ease;
            font-size: 18px;
            padding: 7px 7px;
            border-radius: 5px;
            cursor: pointer;
        }
        .container .containerinner ul li:hover {
            background-color: rgba(236, 183, 24, 0.671); /* Add a hover effect with a semi-transparent white background */
        }   
        .container .containerinner ul li:last-child {
            margin-right: 0;
        }

        .container .containerinner .signup:hover{
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
            margin-left: 10px;
            margin-right: 45px; 
            font-size: larger;/* Move the button closer to the "Login" button */
        }
        .container .containerinner button.harbor {
            background-color: transparent; /* Make the background transparent */
            border: none; /* Remove the border */
            color: rgba(255, 255, 255, 0.8); /* Change the color of the text to white with 80% opacity */
            cursor: pointer;
            font-size:x-large;
        }
        .container .containerinner button ion-icon {
            color: rgba(213, 8, 38, 0.8);
            background-color: transparent;
            border: none; /* Change the color of the icon to white with 80% opacity */
        }
        .container .containerinner ul li a {
            color: inherit; /* Inherit the color from the parent element */
            text-decoration: none;
        }
    .containers {
      width: 400px;
      background-color: #fff;
      padding: 20px;
	  position:absolute;
	  color:black;
	  top:20%;
	  left:38%;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: -50px; /* Adjusted margin-top to move the form to the middle */
    }
    .containers h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .input-group {
      margin-bottom: 15px;
    }
    .input-group label {
      display: block;
      margin-bottom: 5px;
    }
    .input-group input {
      width: 90%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .input-group button {
      width: 95%;
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
    .input-group p {
      text-align: center;
      margin-top: 15px;
    }
    .social-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .social-buttons button {
      flex: 1;
      padding: 10px;
      border: none;
      border-radius: 5px;
      color: #fff;
      cursor: pointer;
    }
    .social-buttons .google {
      background-color: #dd4b39;
	}
	  .social-buttons .microsoft {
      background-color: #00a1f1;
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
    <div class="containers">
      <form method="post" action="register.php">
        <h1>Register Here</h1>
        <?php include('errors1.php'); ?>
        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
        </div>
        <div class="input-group">
          <label>Email</label>
          <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
        </div>
        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password_1">
        </div>
        <div class="input-group">
          <label>Confirm password</label>
          <input type="password" name="password_2">
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p style="margin-left:30%;">Already a member? <a href="login.php">Sign in</a></p>
      </form>
      <div class="divider">
        <hr>
        <p style="margin-left:38%;">or sign up with</p>
      </div>
      <div class="social-buttons">
        <button class="google"><i class="fab fa-google icon"></i>Sign Up with Google</button>
        <button class="microsoft"><i class="fab fa-windows icon"></i>Sign Up with Microsoft</button>
      </div>
    </div>
  </div>
</body>
</html>
