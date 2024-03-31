<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = mysqli_connect("localhost", "root", "", "project");

if(isset($_POST['forgot_password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        
        $token = bin2hex(random_bytes(32));
        
        $query = "UPDATE users SET reset_token='$token' WHERE email='$email'";
        mysqli_query($conn, $query);
        
        $reset_link = "http://localhost/reset_password.php?token=$token"; // Change to reset_password.php
        
        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'vamsidhar.puvvada002@gmail.com'; // Your Gmail address
            $mail->Password   = 'dwrr iymm cuwa tzio';       // Your Gmail password
            $mail->SMTPSecure = 'true'; // Disable TLS
            $mail->Port       = 587; // You can also use port 25 for non-encrypted communication
        
            //Recipients
            $mail->setFrom('vamsidhar.puvvada002@gmail.com', 'Puvvada Vamsidhar');
            $mail->addAddress($email);                  // Add a recipient
        
            // Content
            $mail->isHTML(true);                        // Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body    = "Click the link to reset your password: $reset_link";
        
            $mail->send();
            // Alert message in JavaScript
            echo "<script>alert('An email with instructions to reset your password has been sent to your email address.');</script>";
        } catch (Exception $e) {
            echo "Failed to send email. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email address not found.";
    }
}
?>
