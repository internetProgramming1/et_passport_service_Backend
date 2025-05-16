<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>personalInfo</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!-- Load header -->

  <?php include __DIR__ . '/../../../../../../Front/Header.html'; ?>


  <!-- Main content -->
  <div class="container-fluid py-1 my-5">
    <div class="row">
      <!-- Sidebar Navigation -->
      <aside class="col-lg-3 mb-4 shadow-sm h-100">
        <ul class="list-group">
          <a href="../page1.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Request Appointment</li>
          </a>
          <a href="urgency.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Urgency Type</li>
          </a>
          <a href="./serviceType.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Service Type</li>
          </a>
          <a href="../page2.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Site
              Selection</li>
          </a>
          <a href="../page3.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Date and
              Time</li>
          </a>
          <a href="./passInfo.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Personal Information</li>
          </a>
          <a href="../Page5/pasportpage.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>


      <!-- Main Content -->
      <main class="col-lg-9">

        <!-- Sub Navigation Tabs -->
        <ul class="nav nav-tabs mb-4">
          <li class="nav-item">
            <a class="nav-link active" style="background-color: #005f99; color: white;"
              href="personalInfo.html">Personal Info.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="address.php" style="color: #005f99;">Address</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="family.php" style="color: #005f99;">Family</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="family.php" style="color: #005f99;">Passport Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="attachment.php" style="color: #005f99;">Attachments</a>
          </li>
        </ul>

        <!-- Personal Info Form -->
        <div class="card shadow-sm p-4">
          <h4 class="mb-4">Personal Information</h4>

          <div id="alertContainer"></div>

          <form method="post" id="myForm">
            <div class="row g-3">
              <div class="col-md-4">
                <label for="firstname" class="form-label">First Name*</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
              </div>
              <div class="col-md-4">
                <label for="middlename" class="form-label">Middle Name*</label>
                <input type="text" class="form-control" id="middlename" name="middlename" required>
              </div>
              <div class="col-md-4">
                <label for="lastname" class="form-label">Last Name*</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
              </div>

              <div class="col-md-6">
                <label for="phone" class="form-label">Phone Number*</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email*</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="col-md-6">
                <label class="form-label d-block">Gender*</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                  <label class="form-check-label" for="female">Female</label>
                </div>
              </div>

              <div class="col-md-6">
                <label for="dob" class="form-label">Date of Birth*</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
              </div>

              <div class="col-md-6">
                <label class="form-label d-block">Are you under 18?*</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="under18" id="under18-yes" value="under18" required>
                  <label class="form-check-label" for="under18-yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="under18" id="under18-no" value="above18" required>
                  <label class="form-check-label" for="under18-no">No</label>
                </div>
              </div>

              <div class="col-md-6">
                <label for="birthplace" class="form-label">Birthplace*</label>
                <input type="text" class="form-control" id="birthplace" name="birthplace" required>
              </div>

              <div class="col-md-6">
                <label class="form-label d-block">Are you adopted?*</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="adopted" id="adopted-yes" value="Adopted" required>
                  <label class="form-check-label" for="adopted-yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="adopted" id="adopted-no" value="Not Adopted"
                    required>
                  <label class="form-check-label" for="adopted-no">No</label>
                </div>
              </div>

              <div class="col-md-6">
                <label for="birth_certificate" class="form-label">Birth Certificate Unique ID*</label>
                <input type="text" class="form-control" id="birth_certificate" name="birth_certificate" required>
              </div>

              <div class="col-md-6">
                <label for="nationality" class="form-label">Nationality*</label>
                <select class="form-select" id="nationality" name="nationality" required>
                  <option value="Ethiopian" selected>Ethiopian</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="marital-status" class="form-label">Marital Status*</label>
                <select class="form-select" id="marital-status" name="marital_status" required>
                  <option value="" disabled selected>Select your marital status</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation">
              </div>
            </div>

            <br>
            <!-- Next Button -->
            <button type="submit" class="btn btn-outline-primary ">Next</button>

          </form>
        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>

  <!-- Axios   -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script>
    $('#myForm').on("submit", async (e) => {
      e.preventDefault(); // Prevent form default submission

      // Clear previous alert
      $('#alertContainer').empty();

      const personalInfo = {
        firstname: e.target.elements.firstname.value.trim(),
        middlename: e.target.elements.middlename.value.trim(),
        lastname: e.target.elements.lastname.value.trim(),
        phone: e.target.elements.phone.value.trim(),
        email: e.target.elements.email.value.trim(),
        gender: e.target.elements.gender.value,
        dob: e.target.elements.dob.value,
        under18: e.target.elements.under18.value,
        birthplace: e.target.elements.birthplace.value.trim(),
        adopted: e.target.elements.adopted.value,
        birth_certificate: e.target.elements.birth_certificate.value.trim(),
        nationality: e.target.elements.nationality.value,
        marital_status: e.target.elements.marital_status.value,
        occupation: e.target.elements.occupation.value.trim()
      };

      // Required field check
      const requiredFields = ['firstname', 'lastname', 'phone', 'email', 'gender', 'dob', 'birthplace', 'nationality'];
      let isFormValid = true;

      requiredFields.forEach(field => {
        if (!personalInfo[field]) {
          isFormValid = false;
        }
      });

      if (!isFormValid) {
        $('<div>')
          .addClass('alert alert-danger alert-dismissible fade show')
          .attr('role', 'alert')
          .text('Please fill out all required fields before submitting.')
          .appendTo('#alertContainer');
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
        return;
      }

      try {
        await axios.post("http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php", personalInfo, {
          headers: {
            'Content-Type': 'application/json'
          }
        });

        // Redirect on success
        window.location.href = "address.php";

      } catch (error) {
        const errorMessage = error.response?.data?.message || "Error saving data. Please try again.";
        $('<div>')
          .addClass('alert alert-danger alert-dismissible fade show')
          .attr('role', 'alert')
          .html(`<strong><i class="bi bi-x-octagon me-2"></i>Submission Failed:</strong> ${errorMessage}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`)
          .appendTo('#alertContainer');
      }
    });
  </script>


</body>

</html>