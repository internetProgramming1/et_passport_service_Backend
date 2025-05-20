<?php include __DIR__ . '/../../../Front/Header.html'; ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-sm rounded-4">
        <div class="card-body p-4">
          <h1 class="h4 mb-4 text-center">Sign Up</h1>
          <form id="signupForm" class="row g-4">
            <div class="col-md-6">
              <label for="FirstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="FirstName" name="name" required>
            </div>
            <div class="col-md-6">
              <label for="fatherName" class="form-label">Father's Name</label>
              <input type="text" class="form-control" id="fatherName" name="fatherName" required>
            </div>
            <div class="col-md-6">
              <label for="grandfatherName" class="form-label">Grandfather's Name</label>
              <input type="text" class="form-control" id="grandfatherName" name="grandfatherName" required>
            </div>
            <div class="col-md-6">
              <label for="signupEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="signupEmail" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="signupPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="signupPassword" name="password" required>
              <span id="pass" class="form-text"></span>
            </div>
            <div class="col-md-6">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
              <span id="password" class="form-text"></span>
            </div>
            <div class="col-12 d-grid">
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
            <div class="col-12 text-center">
              <p class="mt-3">Already have an account? <a href="/login">Login here</a>.</p>
            </div>
          </form>
          <hr class="my-4">
          <div class="info-section">
            <h2 class="h5">Why Register?</h2>
            <ul class="list-unstyled ps-3">
              <li>✔️ Track your passport application status online.</li>
              <li>✔️ Receive timely updates and notifications.</li>
              <li>✔️ Access personalized support and resources.</li>
              <li>✔️ Enjoy a seamless and secure user experience.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/../../../Front/Footer.html'; ?>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#signupForm').on('submit', function (e) {
        e.preventDefault();
        const firstName = $('#FirstName').val().trim();
        const fatherName = $('#fatherName').val().trim();
        const grandfatherName = $('#grandfatherName').val().trim();
        const email = $('#signupEmail').val().trim();
        const password = $('#signupPassword').val().trim();
        const confirmPassword = $('#confirmPassword').val().trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }
        if (password !== confirmPassword) {
            $('#password').text("Passwords do not match").css('color', 'red');
            return;
        } else {
            $('#password').text("");
        }

        axios.post('/auth/signup', {
            firstName, fatherName, grandfatherName, email, password, confirmPassword
        })
        .then(function (response) {
            if (response.data.success) {
                window.location.href = '/login';
            } else {
                alert(response.data.message);
            }
        })
        .catch(function (error) {
            alert("Signup failed. Please try again.");
        });
    });
});
</script>