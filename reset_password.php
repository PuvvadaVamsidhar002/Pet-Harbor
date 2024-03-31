<?php
require 'vendor/autoload.php';

$conn = mysqli_connect("localhost", "root", "", "project");

if(isset($_POST['reset_password'])) {
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    
    $query = "SELECT * FROM users WHERE reset_token='$token'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        
        // Update password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "UPDATE users SET password='$hashed_password', reset_token=NULL WHERE email='$email'";
        mysqli_query($conn, $update_query);
        
        echo "Password updated successfully.";
    } else {
        echo "Invalid or expired token.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label>New Password:</label>
        <input type="password" name="new_password" required><br>
        <button type="submit" name="reset_password">Reset Password</button>
    </form>
</body>
</html>
