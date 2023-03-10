<?php
session_start();
// Checking if the $_Session["mail"] is set or not.
if (!isset($_SESSION['email'])) {
  header("location:forgot_password.php");
}
// Storing the error message in a variable. 
$err_msg = "";
// Checking if the $_Session["msg"] is set or not.
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
  <title>AASSAN:OTP Validation</title>
  <!-- Linking the custom css file. -->
  <link rel="stylesheet" href="css_files/otp_validation.css">
  <!-- Linking the cdn link of font awsome for the icons. -->
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
        <i class="fa-sharp fa-solid fa-shield-halved"></i>
        <h4>Authenticate Your Account</h4>
        <p>Please confirm your acount by entering the OTP sent to your registered email.Your security is our top priority.</p>
        <form action="backend/otp_backend.php" method="post">
          <div class="opt_holder">
            <div class="cols">
              <div class="inp">
                <input type="text" name="otp1" id="otp1" maxlength="1" autocomplete="off" maxlength="1"  oninput="this.value=this.value.replace(/[^0-9]/g,'');"onkeyup="movetoNext(this, 'otp2')"; >
              </div>
            </div>
            <div class="cols">
              <div class="inp">
                <input type="text" name = "otp2" id="otp2" maxlength="1" autocomplete="off" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');"onkeyup="movetoNext(this, 'otp3')";>
              </div>
            </div>
            <div class="cols">
              <div class="inp">
                <input type="text" name = "otp3" id="otp3" maxlength="1" autocomplete="off" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');"onkeyup="movetoNext(this, 'otp4')";>
              </div>
            </div>
            <div class="cols">
              <div class="inp">
                <input type="text" name = "otp4" id="otp4" maxlength="1" autocomplete="off" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
              </div>
            </div>
          </div>
          <div class="submit-button">
            <button type="submit" id="btn">Submit</button>
          </div>
        </form>
        <!-- Error message. -->
        <div class="error_msg">
          <span><?php echo $err_msg; ?> </span>
        </div>
      </div>
    </div>
  </div>
  </form>
  <script src="js_files/otp.js"></script>
</body>

</html>
