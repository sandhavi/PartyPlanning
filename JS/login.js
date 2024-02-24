function validateLogin() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email.trim() === '' || password.trim() === '') {
        document.getElementById('errorMessage').innerHTML = 'Please enter both email and password.';
    } else {
        document.getElementById('errorMessage').innerHTML = '';
        document.getElementById('loginForm').submit();
    }
}
