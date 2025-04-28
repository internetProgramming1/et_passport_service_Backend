document.addEventListener('DOMContentLoaded', () => {
    const signupForm = document.getElementById('signupForm');
    const loginForm = document.getElementById('loginForm');

    // ------------------ Signup Form -------------------
    if (signupForm) {
        signupForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const firstname = document.getElementById('FirstName').value.trim();
            const fatherName = document.getElementById('fatherName').value.trim();
            const grandfatherName = document.getElementById('grandfatherName').value.trim();
            const email = document.getElementById('signupEmail').value.trim();
            const password = document.getElementById('signupPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const passMessage = document.getElementById('pass');
            const confirmMessage = document.getElementById('password');

            // Clear previous messages
            passMessage.innerHTML = '';
            confirmMessage.innerHTML = '';

            // Basic Validation
            if (!firstname || !fatherName || !grandfatherName || !email || !password || !confirmPassword) {
                alert('Please fill in all fields.');
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            if (password.length < 6) {
                passMessage.innerHTML = "Password must be at least 6 characters long.";
                return;
            }

            if (password !== confirmPassword) {
                confirmMessage.innerHTML = "Passwords don't match.";
                return;
            }

            // Submit signup data to backend
            try {
                const response = await fetch('../../BackEnd/Login/signup.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        first_name: firstname,
                        father_name: fatherName,
                        grandfather_name: grandfatherName,
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    alert('Signup successful!');
                    window.location.href = 'login.html';
                } else {
                    alert(data.message || 'Signup failed.');
                }
            } catch (error) {
                console.error('Error during signup:', error);
                alert('An error occurred. Please try again later.');
            }
        });
    }

    // ------------------ Login Form -------------------
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value;

            if (!email || !password) {
                alert('Please fill in all fields.');
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            // Submit login data to backend
            try {
                const response = await fetch('../../BackEnd/Login/login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    alert('Login successful!');
                    window.location.href = '/FrontEnd/UserProfile.html'; // Redirect after login
                } else {
                    alert(data.message || 'Login failed.');
                }
            } catch (error) {
                console.error('Error during login:', error);
                alert('An error occurred. Please try again later.');
            }
        });
    }
});
