<?php
session_start();
// Checking if the session["email"] is set or not.  
if (!isset($_SESSION['email'])) {
  header("location:forgot_password.php");
}
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
  <title>AASSAN:Reset Password</title>
  <!-- Linking the custom css file. -->
  <link rel="stylesheet" href="css_files/reset_password.css">
  <!-- Linking the font awsome cdn for the icons used. -->
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
  <!-- Form Section. -->
  <div class="form-section">
    <div class="container">
      <div class="form-row">
        <h4>Change Password</h4>
        <form action="backend/reset_password_backend.php" method="post">
          <div class="inp">
          <i class="fa-solid fa-key"></i>
          <input type="password" name="password" id="password" placeholder="Enter your new password." required onblur="validatePassword()";>
          <i class="fa-solid fa-eye" id="eye" onmouseenter ="showFunction1()"; onmouseout="hideFunction1()";></i> 
          </div>
          <div class="inp">
          <i class="fa-solid fa-key"></i>
          <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your new password."required onblur="validatePassword()";>
          <i class="fa-solid fa-eye" id="eye" onmouseenter ="showFunction2()"; onmouseout="hideFunction2()";></i> 
          </div>
          <div class="submit-button">
            <button type="submit" id="btn">Change</button>
          </div>
          <span id="pass_error"></span>

        </form>
        <!-- Error message. -->
        <div class="error_msg">
          <span><?php echo $err_msg; ?> </span>
        </div>
      </div>
    </div>
  </div>
  </form>
  <script src="js_files/reset_password.js"></script>
</body>

</html>
