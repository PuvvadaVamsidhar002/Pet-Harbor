<?php
$errors = array(); // Initialize $errors as an empty array

// Your registration logic here

if (count($errors) > 0) {
    include('errors.php'); // Include errors.php only if $errors is not empty
}
?>
<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #ffdd0093
        }
        .container{
            width: 100%;
            height: 100%;
            background-image: url('dog3.jpg');
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
        .content1 {
            text-align: center; 
            padding-top: 25%;/* This will make the .content1 div take up the full height of thheie viewport */
        }
        .donatepet{
            display: flex;
            flex-direction: row;
            justify-content:space-between;
            height:85vh;
            width: 100%;
            align-items: center;
        }
        .donatepet .matter1{
            width: 50%;
            padding: 15% 10%;
        }
        .donatepet .matter1 button.donate{
            font-size: large; transition: background-color 0.3s ease;background-color:yellow ;margin:none;
            margin-left: 37%;
            margin-top: 5%;
            padding: 2% 3%;
            
        }
        .donatepet .matter1 button.donate:hover{
            background-color: #662121;
        }
        .donatepet .catpic{
            width: 50%;
        }
        .donatepet .catpic .cat {
            width: 80%;
            height: 80%;
            align-items: center;
            padding-left:0%;
            border-radius: 50px;
            z-index: 50;
        }
        .description {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
        }
        .streethelpline {
            background-color: #f0f0f0; /* Added a background color for visibility */
            text-align: center;
            padding: 50px 250px;
            background-color: azure;
            font-size: large;
        }
        .streethelpline button.helpline:hover{
                background-color: #333;
        }
        .stories {
            text-align: center;
            padding: 50px 0;
        }
        .stories .images {
            display: flex;
            justify-content: space-around; /* Distribute items evenly */
            align-items: center;
            gap: 20px;
            padding: 20px; /* Add padding around the images */
            border: 2px solid #ccc; /* Add border */
            border-radius: 10px; /* Add border radius */
        }
        .form {
            background-color: #f0f0f0; /* Added a background color for visibility */
            text-align: center;
            padding: 50px 0;
        }
        .form .inner {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items:none;
            gap: 20px;
            padding: 20px;
        }
        .form .inner .first {
            display: flex;
            flex-direction: column;
        }
        .form-label {            margin-bottom: 5px;
            margin-left: 0px;
        }
        .form .inner .field {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center; /* Center horizontally */
            margin-bottom: 10px; /* Adjusted margin */
        }
        .form .inner .field input {
            width: 300px; /* Reduce input width */
            padding: 10px; /* Increase padding for better appearance */
        }
        .form .inner .field span {
            position: absolute;
            right: 10px;
            color: #999;
        }
        .form .inner .field button {
            width: auto; /* Auto width */
            padding: 10px 20px; /* Adjust padding */
            margin-left: 10px; /* Add margin between input and button */
        }
        .readmore {
            background-color: rgb(55, 0, 255); /* Matched button color */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .readmore:hover {
            background-color: #333; /* Darkened button color on hover */
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
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
            <a href="login.php"><button class="signup">Login/Sign-Up</button></a>
        </div>
    <div class="content1">
        <h1 class="tag">Save a Life, Adopt a Pet</h1><br>
        <h2>Welcome to <br>Land of the Strays. <br>We believe every animal deserves a second chance.</h2>
    </div>
    </div>
    <div class="description">
        <div class="matter">
            <h3></h3>
        </div>
        <div class="dogspic">
            <p></p>
        </div>
    </div>
    <div class="donatepet">
        <div class="matter1">
            <h1>Donate To Our Animal Shelter</h1><br><p>We believe that every animal deserves a safe and happy life. With that goal in mind, We have created animal shelters and adoption app globally to help the stray animals to find their new life and also to vaccinate and treat them </p>
            <a href="new.html"><button class="donate" style="">Donate now</button></a>
        </div>
        <div class="catpic">            
            <img src="dog4.jpg" class="cat" alt="twin cats" style="position: relative;">
        </div>
    </div>
    <div class="streethelpline">
        <h2>Pet Helplines</h2> 
        <p>If you need to report a situation involving an animal in immediate danger, please call our emergency number. If an animal is injured, please remain with the animal until help is secured.</p>
        <br>
        <a href="tel:+918187090140" ><button class="helpline" style="font-size: large; transition: background-color 0.3s ease;background-color: rosybrown ;margin:none; "><ion-icon name="call-outline"></ion-icon>(+91)8187090140</button></a>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>    
    <div class="stories">
        <h1>Read Some of the Healed Stories</h1>
        <div class="images" style="border: none;">
            <div class="1">
                <img src="persian cat.png" height="250px" width="350px" alt="Lion" style="border-radius: 50px;"><br>
                <p>Leo is an approximately 5-month-old, feisty male Persian cat who was abandoned by his owners possibly because of a severe fungal infection in his ears. He needs 15000 Rs. for treatment and rehabilitation and your donations will go a long way in giving him a better life.</p>
                <br><button class="readmore">Read more & donate</button>
            </div>
            <div class="2">
                <img src="ramu.jpg" height="250px" width="350px" alt="Ramu" style="border-radius: 50px;"><br>
                <p>Ramu faced an unfortunate car accident in Borivali West, resulting in a fractured leg. We need your support to raise Rs. 25000 to support Ramu’s medical treatment and rehabilitation.</p>
                <br><button class="readmore">Read more & donate</button>
            </div>
            <div class="3">
                <img src="zoya.jpg" height="250px" width="350px" alt="Zoya" style="border-radius: 50px;"><br>
                <p>Zoya’s journey took an unexpected turn in Andheri West, where she faced an accident resulting in a broken leg. To aid her recovery, we are seeking funds of Rs. 25000. Your support will ensure Zoya heals and regains her strength.</p>
                <br><button class="readmore">Read more & donate</button>
            </div>
        </div>
    </div>
    <div class="form">
        <div class="inner">
            <h1>Contact Us</h1>
            <div class="first">
            <form action="title 2.php" method="post">
    <label for="email" class="form-label">Email</label>
    <div class="field">
        <input type="email" id="email" name="email" placeholder="Your email" required>
    </div>
    <div class="field">
        <input type="text-field" id="desc" name="desc" placeholder="Your issue" required>
    </div>
    <div class="field">
        <button type="submit" name="contact_us">Submit</button>
    </div>
</form>
</form>

        </div>
    </div>
    <footer>
        <a href="https://www.instagram.com/pet_harbor16?utm_source=ig_web_button_share_sheet&igshid=ZDNlZDc0MzIxNw=="><ion-icon name="logo-instagram"></ion-icon></a>
        <!-- Modified email icon to use as a button -->
        <span id="emailButton"><ion-icon name="mail-outline"></ion-icon></span>
        <p>Connect with us on Instagram and via Email for more updates on pet adoption and our rescue stories.</p>
        <p>&copy; 2024 Land of the Strays. All Rights Reserved.</p>
    </footer>

    <!-- External JavaScript for sending email -->
    <script>
        // Find the email icon element
        const emailButton = document.getElementById('emailButton');
        // Add click event listener to send email
        emailButton.addEventListener('click', function() {
            window.location.href = 'mailto:vamsidhar.puvvada002@gmail.com';
        });
    </script>
</body>
</html>

