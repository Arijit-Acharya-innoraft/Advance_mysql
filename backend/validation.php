<?php
/**
 * This class is used for validating the password.
 */
class PasswordValidation {

  /**
   * This methods checks if the length of the password isn't less than 6.
   * It checks that at least 1 uppercase,1lowercase,1 digit and a specialcharacter is present or not.
   */
  function validatePassword($password) {
    $error="";
    if( strlen($password) < 8 ) {
      $error .= "Password too short!";
      }
      
      if( strlen($password) > 20 ) {
      $error .= "Password too long!";
      }
      
      if( !preg_match("#[0-9]+#", $password) ) {
      $error .= "Password must include at least one number!";
      }
      
      if( !preg_match("#[a-z]+#", $password) ) {
      $error .= "Password must include at least one letter!";
      }
      
      if( !preg_match("#[A-Z]+#", $password) ) {
      $error .= "Password must include at least one CAPS!
      ";
      }
      
      if( !preg_match("#\W+#", $password) ) {
      $error .= "Password must include at least one symbol!";
      }
      
    return $error;
  }
}

/**
 * This class checks validation of name.
 * It does not allow anything apart from letters and whitespace
 */
class NameValidation {

  /**
   * This method validates name.
   * @param name
   *  It takes the name input from the user.
   */
  function validateName($name) {
    $rtn_name="";
    $name = trim($name," ");
    // Checks if the name is empty or not.
    if (empty($name)) {
      $rtn_name = "Name should not be empty";
    }
    else {
      if((preg_match('/^[a-zA-Z]+$/', $name) == 0)) {
        $rtn_name = "Only character and white space in between text is allowed";
      }
    }
    return $rtn_name;
  }

}

?>
