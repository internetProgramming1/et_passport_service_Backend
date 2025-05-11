<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Family Info</title>
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <?php include __DIR__ . '/../../../../../../Front/header.html' ?>

  <!-- Main content -->
  <div class="container-fluid my-5 py-1">
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

        <!-- Navigation Pills -->
        <ul class="nav nav-tabs mb-4">
          <li class="nav-item">
            <a class="nav-link" style="color: #005f99;" href="./personalinfo.php">Personal Info.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #005f99;" href="address.html">Address</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="background-color: #005f99; color: white;" href="./family.php">Family</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #005f99;" href="./passInfo.php">Passport Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #005f99;" href="./attachment.php">Attachments</a>
          </li>
        </ul>

        <!-- Form -->
        <div class="card p-4 shadow-sm">
          <h4 class="mb-3">Family Information</h4>

          <div id="errorAlert" class="alert alert-danger d-none mb-3"></div>

          <form id="familyInfoForm" method="POST" class="row g-3">


            <!-- Mother -->
            <h4 class="mt-3">Mother</h4>
            <div class="col-md-4">
              <label for="mother_first_name" class="form-label">First Name*</label>
              <input type="text" class="form-control" id="mother_first_name" name="mother_first_name"
                placeholder="Enter mother's first name" required>
            </div>
            <div class="col-md-4">
              <label for="mother_father_name" class="form-label">Father's Name*</label>
              <input type="text" class="form-control" id="mother_father_name" name="mother_father_name"
                placeholder="Enter mother's father's name" required>
            </div>
            <div class="col-md-4">
              <label for="mother_grandfather_name" class="form-label">Grandfather's Name*</label>
              <input type="text" class="form-control" id="mother_grandfather_name" name="mother_grandfather_name"
                placeholder="Enter mother's grandfather's name" required>
            </div>

            <!-- Father -->
            <h4 class="mt-4">Father</h4>
            <div class="col-md-4">
              <label for="father_first_name" class="form-label">First Name*</label>
              <input type="text" class="form-control" id="father_first_name" name="father_first_name"
                placeholder="Enter father's first name" required>
            </div>
            <div class="col-md-4">
              <label for="father_father_name" class="form-label">Father's Name*</label>
              <input type="text" class="form-control" id="father_father_name" name="father_father_name"
                placeholder="Enter father's father's name" required>
            </div>
            <div class="col-md-4">
              <label for="father_grandfather_name" class="form-label">Grandfather's Name*</label>
              <input type="text" class="form-control" id="father_grandfather_name" name="father_grandfather_name"
                placeholder="Enter father's grandfather's name" required>
            </div>

            <!-- Spouse -->
            <h4 class="mt-4">Spouse <small class="text-muted">(Optional)</small></h4>
            <div class="col-md-4">
              <label for="spouse_first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="spouse_first_name" name="spouse_first_name"
                placeholder="Enter spouse's first name">
            </div>
            <div class="col-md-4">
              <label for="spouse_father_name" class="form-label">Father's Name</label>
              <input type="text" class="form-control" id="spouse_father_name" name="spouse_father_name"
                placeholder="Enter spouse's father's name">
            </div>
            <div class="col-md-4">
              <label for="spouse_grandfather_name" class="form-label">Grandfather's Name</label>
              <input type="text" class="form-control" id="spouse_grandfather_name" name="spouse_grandfather_name"
                placeholder="Enter spouse's grandfather's name">
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-outline-primary" style="width: 65px;">Next</button>

          </form>
        </div>
      </main>

    </div>
  </div>

  <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>


  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#familyInfoForm').on('submit', async function(e) {
        e.preventDefault();

        const form = this; // The form element

        // Clear previous errors
        const errorAlert = document.getElementById('errorAlert');
        errorAlert.classList.add('d-none');
        errorAlert.innerHTML = '';

        // Validate required fields
        const requiredFields = [
          'mother_first_name', 'mother_father_name', 'mother_grandfather_name',
          'father_first_name', 'father_father_name', 'father_grandfather_name'
        ];

        let isValid = true;
        requiredFields.forEach(field => {
          const input = form.elements[field];
          if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
          } else {
            input.classList.remove('is-invalid');
          }
        });

        if (!isValid) {
          errorAlert.textContent = "Please fill all required fields marked with *";
          errorAlert.classList.remove('d-none');
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
          return;
        }

        try {
          // Collect all form data (including optional fields)
          const familyInfo = {
            mother_first_name: form.elements.mother_first_name.value.trim(),
            mother_father_name: form.elements.mother_father_name.value.trim(),
            mother_grandfather_name: form.elements.mother_grandfather_name.value.trim(),
            father_first_name: form.elements.father_first_name.value.trim(),
            father_father_name: form.elements.father_father_name.value.trim(),
            father_grandfather_name: form.elements.father_grandfather_name.value.trim(),
            spouse_first_name: form.elements.spouse_first_name ? form.elements.spouse_first_name.value.trim() : '',
            spouse_father_name: form.elements.spouse_father_name ? form.elements.spouse_father_name.value.trim() : '',
            spouse_grandfather_name: form.elements.spouse_grandfather_name ? form.elements.spouse_grandfather_name.value.trim() : ''
          };

          // Send data to server
          const response = await axios.post('http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', familyInfo, {
            headers: {
              'Content-Type': 'application/json'
            },
            withCredentials: true
          });

          if (response.data.success) {
            window.location.href = "passInfo.php"; // Redirect to the next page
          } else {
            throw new Error(response.data.message || 'Form submission failed');
          }
        } catch (error) {
          console.error('Error:', error);
          const errorMessage = (error.response && error.response.data && error.response.data.message) ||
            error.message ||
            'An error occurred while submitting the form.';
          errorAlert.innerHTML = `<strong>Error!</strong> ${errorMessage}`;
          errorAlert.classList.remove('d-none');
          errorAlert.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
          });
        }
      });

      // Clear validation errors when user types
      document.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', () => {
          input.classList.remove('is-invalid');
        });
      });
    });
  </script>


</body>

</html>