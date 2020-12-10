/* EMAIL VALIDATION FUNCTION */
function emailValidation(FormName, emailErr, inputValue) {
  /* EMAIL REE=GEX */
  var emailReg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (inputValue.match(emailReg)) {
    FormName.classList.add("valid");
    FormName.classList.remove("invalid");
    emailErr.innerHTML = "Your email address is valid";
    emailErr.style.color = "#00ff00";
  } else {
    FormName.classList.remove("valid");
    FormName.classList.add("invalid");
    emailErr.innerHTML = "Your email address is invalid";
    emailErr.style.color = "#ff0000";
  }

  if (inputValue == "") {
    FormName.classList.remove("valid");
    FormName.classList.remove("invalid");
    emailErr.innerHTML = "";
    emailErr.style.color = "#00ff00";
  }
}
/* EMAIL VALIDATION FUNCTION */
function passValidation(FormName, passErr, inputValue) {
  /* PASSWORD REGEX */
  var passReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,12}$/;

  if (inputValue.match(passReg)) {
    FormName.classList.add("valid");
    FormName.classList.remove("invalid");
    passErr.innerHTML = "Your Password is valid";
    passErr.style.color = "#00ff00";
  } else {
    FormName.classList.remove("valid");
    FormName.classList.add("invalid");
    passErr.innerHTML =
      " Weak Password.Should include numbers,letters and symbols (6-12 characters) ";
    passErr.style.color = "#ff0000";
  }
  if (inputValue == "") {
    FormName.classList.remove("valid");
    FormName.classList.remove("invalid");
    passErr.innerHTML = "";
    passErr.style.color = "#00ff00";
  }
}
