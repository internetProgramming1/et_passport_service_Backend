document.addEventListener('DOMContentLoaded', () => {
    const signupForm = document.getElementById('signupForm');
    const loginForm = document.getElementById('loginForm');

    signupForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const firstname = document.getElementById('FirstName').value.trim();
        const fatherName = document.getElementById('fatherName').value.trim();
        const grandfatherName = document.getElementById('grandfatherName').value.trim();
        const email = document.getElementById('signupEmail').value.trim();
        const password = document.getElementById('signupPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const confirm=document.getElementById('password');
        const con=document.getElementById('pass');

        // Basic validation
        if (!firstname) {
            alert('First Name is required.');
            return;
        }

        if (!fatherName) {
            alert('Father\'s Name is required.');
            return;
        }

        if (!grandfatherName) {
            alert('Grandfather\'s Name is required.');
            return;
        }

        if (!email) {
            alert('Email is required.');
            return;
        }

        // Email format validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        if (!password) {
            alert('Password is required.');
            return;
        }

        if (password.length < 6) {
            con.innerHTML="Password must be at least 6 characters long."
         
            return;
        }

        if (password !== confirmPassword) {
            confirm.innerHTML="Password don't match "
            return;
        }

        // If all validations pass
        alert('Sign up successful!');
    });

    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value;

        if (!email) {
            alert('Email is required.');
            return;
        }

        // Email format validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        if (!password) {
            alert('Password is required.');
            return;
        }

        // If all validations pass
        alert('Login successful!');
    });
});