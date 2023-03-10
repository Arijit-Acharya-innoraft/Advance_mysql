<?php
session_start();
// Connecting the database information with it. 
include "../db_conn.php";
include "validation.php";

/**
 * This class is used for validating the new password before setting it to the backend. 
 */
class ResetPassword {

  /**
   * This method is used to check if both the password and confirm password set are identical.
   * It also validates the newly set password is not equal to the previous set password.
   * @param conn
   *  Used for creating an object of mysqli and calling its methods.
   */
  function validateReset($con) {

    // For checking if both, the new password and confirm password are same or not.
    if($_POST["password"] == $_POST["confirm_password"]) {
      // fetching the previous password
      $pass_before = "SELECT user_password FROM Users WHERE email_id = '" . $_SESSION["email"] . "';";
      $res = $con->query($pass_before);
      $data = $res->fetch_assoc();
      // Checking if new password is equal to previous password.
      if($_POST["password"] == $data["user_password"]) {
        $_SESSION["msg"] = "New password can't be same as the old password ";
        header("location: ../reset_password.php");
      }
      // If not matched with previous mail. 
      else {
      $password = $_POST["password"];
      // Updating the new password in the database.
      $qry = "UPDATE Users SET user_password = '" . $password ."' WHERE email_id = '" . $_SESSION["email"] . "';";
      $con->query($qry);
      // Fetching the user name from the database and updating the $_SESSION["U_name"].
      $result = $con->query("SELECT usr_name FROM Users WHERE email_id = '" . $_SESSION["email"] . "'");
      $store = $result->fetch_assoc();
      $_SESSION["U_name"] = $store["usr_name"];
      header("location: ../welcome.php");
      }
    }
    else {
      $_SESSION["msg"] = "new password and confirm password didn't match";
      header("location: ../reset_password.php");
    }
  }

  function passwordValid($msg_pass,$con) {
    if($msg_pass != "") {
      $_SESSION["msg"] = $msg_pass;
      header("location: ../reset_password.php");
    }
    else {
      $this->validateReset($con);
    }
  }

}
   
// 
$rs_valid = new PasswordValidation;
$error = $rs_valid->validatePassword($_POST["password"]); 


  // Creating an object of the password.
$rp = new ResetPassword;
$rp->passwordValid($error,$con);



?>
