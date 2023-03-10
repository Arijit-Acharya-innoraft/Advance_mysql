<?php
// Including the database file and the sending mail file.
include "../db_conn.php";
include "sending_mail.php";
$_SESSION["email"] = $_POST["email"];
/**
 * This class is used for generating a token based link for the users who has forgot their password.
 */
class ForgotPassword {

  /**
   * This function checks if the user entered email is present in the database or not.
   * If present then it creates an object of a token class which generates a token and uses it to create a link and sends it to user.
   * @param con 
   *  used for storing the object of mysqli and accessing its methods.
   */
  function forgotPassword($con) {
    // Checking if the user email exists in the database.
    $result = $con->query("SELECT usr_name FROM Users WHERE email_id = '" . $_POST["email"] . "'");
    if ($result->num_rows == 0) {
      $_SESSION["msg"] = "email id doesn't exist";
      header("location: ../forgot_password.php");
    } 
    else {
      // Calling the token class and its methods to generate the token. 
      $tg = new TokenGeneration;
      $token = $tg->generatingToken();
      $tg->updateToken($con);
      // Creating a link using the token.
      $link = "http://example.com/mysql_advance/reset_password.php?token=" . $token;
      // Creating the body of the email.
      // $body = "Hello'" . $_SESSION["U_name"] . "'! This is your reset password link" . "<a href = '" . $link . "'>Click Me</a>";
      // Creating an object of the SendingMail class.
      $sm = new SendingMail;
      $sm->mailGeneration("Reset Password", $link, $_POST["email"]);
      header("location: ../forgot_password.php");
    }
  }

}

// Creating object of the ForgotPassword class and calling its methods.
$fp = new ForgotPassword;
$fp->forgotPassword($con);
?>
