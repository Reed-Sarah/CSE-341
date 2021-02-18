function hasNumber(password) {
    return /\d/.test(password);
  }
  
  function clientSideStretch3() {
    password1 = document.querySelector('#password1').value;
    password2 = document.querySelector('#password2').value;
  
    msg = document.querySelector('#error');
    if (password1 === password2) {
      //do something
    } else {
      //add an empty div to the HTML with id #error
      msg.innerHTML = "Your passwords do not match.";
      return false;
    }; 
  
    if (password1.length < 7) {
      msg.innerHTML = "Your password must be at least 7 characters in length.";
      return false;
    }
  
    if (!hasNumber(password1)) {
      //add 3rd div with number error message
      msg.innerHTML = "Your password must contain a number.";
      return false;
    } 
    return true;
  }