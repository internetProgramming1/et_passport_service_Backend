<?php include __DIR__ . '/../../../Front/Header.html'; ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-sm rounded-4">
        <div class="card-body p-4">
          <h1 class="h4 mb-4 text-center">Login</h1>
          <form id="loginForm">
            <div class="mb-3">
              <label for="loginEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="loginEmail" name="email" required>
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
          <p class="mt-3 text-center">Don't have an account? <a href="/signup">Sign up here</a>.</p>
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
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        const email = $('#loginEmail').val().trim();
        const password = $('#loginPassword').val().trim();

        if (!email || !password) {
            alert("Please fill in both fields.");
            return;
        }

        axios.post('/auth/login', {
            email: email,
            password: password
        })
        .then(function (response) {
            if (response.data.success) {
                window.location.href = '/start-application'; // or your dashboard
            } else {
                alert(response.data.message);
            }
        })
        .catch(function (error) {
            alert("Login failed. Please try again.");
        });
    });
});
</script>