<?php
$conn = mysqli_connect("localhost", "root", "", "forgot_password_db");

if(isset($_POST['reset_password'])) {
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    
    $query = "UPDATE users SET password='$new_password', reset_token=NULL WHERE reset_token='$token'";
    mysqli_query($conn, $query);
    
    echo "Your password has been reset successfully.";
}
?>
