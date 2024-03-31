  <?php
  session_start();

  // initializing variables
  $username = "";
  $email    = "";
  $errors = array(); 

  require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'project');

  // REGISTER USER
  if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
      $password = md5($password_1);//encrypt the password before saving in the database

      $query = "INSERT INTO users (username, email, password) 
            VALUES('$username', '$email', '$password')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }
  }

  // LOGIN USER
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    
    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
      }else {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }

  if(isset($_POST['contact_us'])) {// Include PHPMailer library

    // Initialize PHPMailer object
    $mail = new PHPMailer(true);
    $mail1=new PHPMailer(True);
    // Retrieve email from the form
    $email = $_POST['email'];
    $desc=$_POST['desc'];

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
        $mail->setFrom('vamsidhar.puvvada002@gmail.com', 'Puvvada Vamsidhar');
        $mail->addAddress($email); // Add recipient email

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Pet Harbor - Contact Us';
        $mail->Body    = "Thank you for reaching out to us!<br><br>
                          We are glad to be in your consideration radar.<br><br>
                          Email: $email";
        $mail->send();
        $query = "INSERT into `contact us` (email) values ('$email')";
        mysqli_query($db, $query);
        echo "<script>alert('An email has been sent to your email address.');</script>";
    } catch (Exception $e) {
       echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
    try {
      //Server settings
      $mail1->isSMTP();
      $mail1->Host       = 'smtp.gmail.com';
      $mail1->SMTPAuth   = true;
      $mail1->Username   = 'vamsidhar.puvvada002@gmail.com'; // Your Gmail address
      $mail1->Password   = 'dwrr iymm cuwa tzio';
      $mail1->SMTPSecure = 'tls'; // Enable TLS encryption
      $mail1->Port       = 587; // TCP port to connect to

      //Recipients
      $mail1->setFrom($email, 'Pet Harbor-Contact Us');
      $mail1->addAddress('vamsidhar.puvvada002@gmail.com'); // Add recipient email

      // Content
      $mail1->isHTML(true); // Set email format to HTML
      $mail1->Subject = 'Pet Harbor - Contact Us';
      $mail1->Body    = "This is from $email <br> Description given is<br>$desc";
      $mail1->send();
  } catch (Exception $e) {
     echo "Failed to send email. Error: {$mail1->ErrorInfo}";
  }

}


  ?>