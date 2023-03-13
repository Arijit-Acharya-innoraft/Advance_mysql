<?php
session_start();
// Connecting the database information with it. 
include "../db_conn.php";
// Storing the server generated OTP.
$otp = $_SESSION["otp"];

/**
 * This class is used for fetching the user entered OTP.
 */
class OtpGetting {

  /**
   * This funnction concatinates the user entered opt(in parts) into the original otp.
   * @return u_otp
   *  It returns the concatinated otp that the user has entered in parts.
   */
  function fetchingOtp() {
    $u_otp = $_POST["otp1"] . $_POST["otp2"] . $_POST["otp3"] . $_POST["otp4"];
    return $u_otp;
  }

  /**
   * This method is used to call the fetchingOtp method for fetching the Otp.
   * It then matches the customer entered otp with the system generated otp.
   * @param con
   *  It is used for creating an object of mysqli and using its methods.
   * @param otp
   *  It stores the server generated otp. 
   */
  function checkOtp($con,$otp) {
    $u_opt = $this->fetchingOtp();
    // Checking for otp match.
    if($u_opt == $otp) {
      $qry = "INSERT INTO Users VALUES('" . $_SESSION["email"] . "','" . $_SESSION["U_name"] . "','" . $_SESSION["pass"] ."','');";
      $con->query($qry);
      header("location:../welcome.php");
    }
    // Throwing error if not matched.
    else {
      $_SESSION["msg"] = "OTP MISMATCH";
      header("location:../otp_validation.php");
    }
  }

}

// Creating an object of GettingOTP.
$otpClass = new OtpGetting;
$u_opt=$otpClass->checkOtp($con,$otp);

?>
