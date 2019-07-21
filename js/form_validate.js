function check_pass() {
  if (document.signup_form.pwd.value ==
    document.signup_form.re_pwd.value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passwords Matching';
	document.getElementById('submit_signup').disabled=false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passwords Not Matching';
	document.getElementById('submit_signup').disabled=true;
  }
}