<?php
// contactus.php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$conn = mysqli_connect("localhost", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['contact_us'])) {
    // Include PHPMailer library
    require 'path/to/PHPMailerAutoload.php';

    // Initialize PHPMailer object
    $mail = new PHPMailer(true);

    // Retrieve email from the form
    $email = $_POST['email'];

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vamsidhar.puvvada002@gmail.com'; // Your Gmail address
        $mail->Password   = 'dwrr iymm cuwa tzio';
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port       = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('your_gmail@gmail.com', 'Your Name');
        $mail->addAddress($email); // Add recipient email

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Subject of the email';
        $mail->Body    = 'Body of the email';

        // Send email
        $mail->send();
        
        // Insert email into database
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql = "INSERT INTO emails (email) VALUES ('$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('An email has been sent to your email address and recorded in the database.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}
?>