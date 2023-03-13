<?php
session_start();
// Variable to store the error msg from the session.
$err_msg = "";
// Here if we are getting the error msg through session we are storing it in the variable and unseting the session message.
if (isset($_SESSION["msg"])) {
  $err_msg = $_SESSION["msg"];
  unset($_SESSION["msg"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images_used/icons8-pulse-48.png" type="image/x-icon">
  <title>AASSAN:CREATE ACCOUNT</title>
  <!-- Linking the custom css file.  -->
  <link rel="stylesheet" href="css_files/signup.css">
  <!-- Linking the fontawsome cdn for the icons. -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Logo Section. -->
  <div class="logo-section">
    <div class="container">
      <div class="logo-row">
        <a href="#">Aassan</a>
      </div>
    </div>
  </div>

  <!-- Form section. -->
  <div class="form-section">
    <div class="container">
      <div class="form-row">
        <h4>Sign Up</h4>
        <form action="backend/signup_backend.php" method="post">
          <div class="inp">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" class="inp-style" placeholder="Your Full Name" id="name" autocomplete="off" required onkeyup="validateUser()";>
          </div>
          <span id="user_error"> </span>

          <div class="inp">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" class="inp_style" placeholder="Your Email" id="email" autocomplete="off" required onblur="validateEmail()";>
          </div>
          <span id="email_error"> </span>
          <div class="inp">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="pass" class="inp-style" placeholder="Your Password" id="pass" autocomplete="off" required onblur="validatePassword()";>
            <i class="fa-solid fa-eye" id="eye" onmouseenter ="showFunction()"; onmouseout="hideFunction()";></i> 
          </div>
          <span id="pass_error"> </span>
          <div class="submit-button">
            <button type="submit" id="btn">Sign Up</button>
          </div>
        </form>

        <!-- Going back to the login section. -->
        <div class="go-back">
          <a href="index.php">To Login</a>
        </div>

        <!-- Error displaying section. -->
        <div class="err_msg">
        <span><?php echo $err_msg;  ?> </span>
        </div>

      </div>
    </div>
  </div>
  <script src="js_files/signup.js"></script>
</body>

</html>
