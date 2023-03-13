// Function to validate the user name.
function validateUser() {
  var inpUser= document.getElementById("name").value;
  inpUser =inpUser.trim();
  if(inpUser.length<1){
    document.getElementById("user_error").innerHTML = "*No user name.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.opacity = 0.6;
  }
  else{
    var reg = /^[A-Za-z\s]*$/;
    if (reg.test(inpUser)) {
      document.getElementById("user_error").innerHTML = "";
      document.getElementById("btn").disabled = false;
      document.getElementById("btn").style.opacity = 1;
    }
    else {
      document.getElementById("user_error").innerHTML = "*Nmae must contain only letter and spaces.";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }
  }
}

// It checks if an email is entered and is of proper format or not
function validateEmail() {
  var inpEmail = document.getElementById("email").value;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (inpEmail.length > 1) {
    if (validRegex.test(inpEmail)) {
      document.getElementById("email_error").innerHTML = "";
      document.getElementById("btn").disabled = false;
      document.getElementById("btn").style.opacity = 1;
    }
    else {
      document.getElementById("email_error").innerHTML = "*Wrong email format.";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }
  }
  else {
    document.getElementById("email_error").innerHTML = "*Enter your email id.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.opacity = 0.6;
  }
}//These two functions are used for showing the password and hidding it.

// This function shows the password entered on mouse hover.
function showFunction(){
  var password = document.getElementById("pass");
    password.type = "text";
} 
// This function hides the password on mouse out.
function hideFunction(){
  var password = document.getElementById("pass");
  password.type = "password";
}

// This function is created for checking the strength of the password.
function validatePassword() {
  var password =document.getElementById("pass").value;

  if( password.length < 8 ) {
    document.getElementById("pass_error").innerHTML = "*Password too short.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.opacity = 0.6;
  }
    
  else if( password.length > 20 ) {
    document.getElementById("pass_error").innerHTML = "*Password too long.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.opacity = 0.6;
  }

  else{
    if( /#[0-9]+#/.test($password) == false ) {
    document.getElementById("pass_error").innerHTML = "*Password must include at least one number!";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.opacity = 0.6;
    }

    if( /#[a-z]+#/.test($password) == false ) {
      document.getElementById("pass_error").innerHTML = "*Password must include at least one lower case letter!";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }

    if( /#[A-Z]+#/.test($password) == false ) {
      document.getElementById("pass_error").innerHTML = "*Password must include at least one CAPS!";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }

    if( /#\W+#/.test($password) == false ) {
      document.getElementById("pass_error").innerHTML = "*Password must include at least one symbol!";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }
  }
}
