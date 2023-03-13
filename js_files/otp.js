// This function is used for sending the cursor to the next field automatically
function movetoNext(current, nextFieldID) {  
  if (current.value.length >= current.maxLength) {  
  document.getElementById(nextFieldID).focus();  
  }  
  } 
  