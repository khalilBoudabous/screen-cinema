document.getElementById('myForm').addEventListener('submit', function (event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});

function validateForm() {
    var email = document.getElementById('email').value;
    var birthdate = document.getElementById('Birthdate').value;
    var username = document.getElementById('Username').value;
    var password = document.getElementById('Password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    if (email === '' || birthdate === '' || username === '' || password === '' || confirmPassword === '') {
        alert('All fields must be filled out');
        return false;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    
    var usernameRegex = /^[a-zA-Z0-9_]+$/;
    if (!usernameRegex.test(username)) {
        alert('Please enter a valid username (only letters, numbers, and underscores are allowed)');
        return false;
    }

    var birthdateRegex = /^\d{4}-\d{2}-\d{2}$/;
    if (!birthdateRegex.test(birthdate)) {
        alert('Please enter a valid birthdate (YYYY-MM-DD)');
        return false;
    }
    
    if (password.length < 8) {
        alert('Password must be at least 8 characters long');
        return false;
    }

    if (password !== confirmPassword) {
        alert('Password and Confirm Password must match');
        return false;
    }

    return true;
}