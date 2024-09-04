document.getElementById('registrationForm').addEventListener('submit', function(event) {
    const phoneNo = document.getElementById('phone_no').value;
    const email = document.getElementById('email').value;

    const phonePattern = /^[0-9]{10,15}$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!phonePattern.test(phoneNo)) {
        alert('Please enter a valid phone number (10-15 digits).');
        event.preventDefault();
    }

    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        event.preventDefault();
    }
});