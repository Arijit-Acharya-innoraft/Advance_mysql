<?php
session_start();
// Including the dependencies.
include "../db_conn.php";
include "sending_mail.php";
include "validation.php";


// Creating an object of the NameValidation class and storing the error msg in it. 
$nv = new NameValidation;
$msg_name = $nv->validateName($_POST["name"]);

// Creating an object of the PasswordValidation class and storing the error msg in it. 
$pv = new PasswordValidation;
$msg_pass = $pv->validatePassword($_POST["pass"]);

/**
 * This class is used for checking the condition for passing it to the authentication page. 
 */
class ConditionChecking
{

  /**
   * This method  is used for  the condition for passing it to the authentication page.
   * @param msg_name
   *  Stores the error message for name if any.
   * @param msg_pass
   *  Stores the error message for password if any. 
   * @param con
   *  Used for creating an object of mysqli and using its methods.
   */
  function checkCondition($msg_name, $msg_pass, $con)
  {
    // Checking for error message in name and password and displaying the result. If no error moving to next.
    if ($msg_name == "" && $msg_pass == "") {

      $user_before = "SELECT email_id FROM Users WHERE email_id = '" . $_POST["email"] . "';";
      $res = $con->query($user_before);
      $data = $res->fetch_assoc();

      // Checking if new email is equal to previous email.
      if ($_POST["email"] == $data["email_id"]) {
        $_SESSION["msg"] = "A user with this email exists!";
        header("location: ../signup.php");
      } else {
        // Storing the emaial, name and user entered password in session.
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["U_name"] = $_POST["name"];
        $_SESSION["pass"] = $_POST["pass"];

        // Generating a four digit number, storing it in session. 
        $otp = rand(1000, 9999);
        $_SESSION["otp"] = $otp;
        // Sending mail in the user given address.
        $sm = new SendingMail;
        $sm->mailGeneration("Mail Validation", $otp, $_SESSION["email"]);
        header("location: ../otp_validation.php");
      }
    } 
    elseif ($msg_name != "") {
      $_SESSION["msg"] = $msg_name;
      header("location: ../signup.php");
    } 
    elseif ($msg_pass != "") {
      $_SESSION["msg"] = $msg_pass;
      header("location: ../signup.php");
    } 
    else {
      $_SESSION["msg"] = $msg_name . " " . $msg_pass;
      header("location: ../signup.php");
    }
  }
}

//Creating an object and calling its  method.
$cc = new ConditionChecking;
$cc->checkCondition($msg_name, $msg_pass, $con);
