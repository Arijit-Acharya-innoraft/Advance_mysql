<?php
session_start();
// Including the database connection.
include "../db_conn.php";
// Storing the user entered email & password.
$email = $_POST["email"];
$pass = $_POST["password"];

/**
 * Class for email validation.
 * It contains two methods emailSyntax and matchDb.
 * "emailSyntax" checks the syntax of the email.
 * "matchDb" matches the user entered values with the values present in database.
 */
class Email {

  /**
   * Method for checking the email syntax.
   * @param email
   *  to send the user entered email. 
   */ 
  function emailSyntax($email) {
    // $email = $_POST["email"];
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
      $_SESSION["msg"] = "Wrong Email address";
    }
  }

  /**
   * This method validates the email and password entered by the user with the database.
   * @param email
   *  for storing the email entered by the user.
   * @param pass
   *  to store the password entered by the user.
   * @param con
   *  an object of mysqli.
   */
  function matchDb($email,$pass,$con) {
    $result = $con->query("SELECT user_password,usr_name FROM Users WHERE email_id = '" . $email . "'");
    if ($result->num_rows == 0) {
      $_SESSION["msg"] = "Email id doesn't exist";
      header("location:../index.php");
    } 
    else {
      $data = $result->fetch_assoc();
      if ($pass != $data['user_password']) {
        $_SESSION["msg"] = "Wrong Password";
        header("location:../index.php");
      } 
      else {
        $_SESSION['U_name'] = $data["usr_name"];
        header("location: ../prev/welcome.php");
      }
    }
  }

}

// Creating an object of the class.
$eml = new Email;
// Calling the method of that object
$eml->emailSyntax($email);
$eml->matchDb($email,$pass,$con);
$con->close();

?>
