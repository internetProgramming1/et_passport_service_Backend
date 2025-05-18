<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Address</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </script>
</head>

<body>

  <?php include __DIR__ . '/../../../../../../Front/header.html' ?>

  <!-- Main content -->
  <div class="container-fluid my-5 py-1">
    <div class="row">

      <!-- Sidebar -->
      <aside class="col-md-3 mb-4 shadow-sm h-100">
        <ul class="list-group">
          <a href="../page1.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Request Appointment</li>
          </a>
          <a href="../serviceType.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Service Type</li>
          </a>
          <a href="../page2.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Site
              Selection</li>
          </a>
          <a href="../page3.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Date and Time</li>
          </a>
          <a href="../Page4/personalinfo.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Personal
              Information</li>
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
            <a class="nav-link "
              href="personalInfo.html">Personal Info.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="background-color: #005f99; color: white;" href="address.php" style="color: #005f99;">Address</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="family.php" style="color: #005f99;">Family</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./passInfo.php" style="color: #005f99; ">Passport Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="attachment.php" style="color: #005f99;">Attachments</a>
          </li>
        </ul>

        <!-- Form -->
        <div class="card shadow-sm p-4">
          <h4 class="mb-4">Address Information</h4>

          <div id="errorAlert" class="alert alert-danger d-none mb-3"></div>

          <form id="addressForm" method="post" class="row g-3">

            <div class="col-md-6">
              <label for="region" class="form-label">Region*</label>
              <select id="region" name="region" class="form-select" required>
                <option value="" disabled selected>Select your region</option>
                <option value="addis_ababa">Addis Ababa</option>
                <option value="afar">Afar</option>
                <option value="amhara">Amhara</option>
                <option value="benishangul_gumuz">Benishangul-Gumuz</option>
                <option value="dire_dawa">Dire Dawa</option>
                <option value="gambela">Gambela</option>
                <option value="harari">Harari</option>
                <option value="oromia">Oromia</option>
                <option value="sidama">Sidama</option>
                <option value="somali">Somali</option>
                <option value="southern_nations">Southern Nations, Nationalities, and Peoples</option>
                <option value="tigray">Tigray</option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="city" class="form-label">City*</label>
              <input type="text" id="city" name="city" class="form-control" placeholder="Enter your city" required>
            </div>

            <div class="col-md-6">
              <label for="subcity" class="form-label">Subcity*</label>
              <input type="text" id="subcity" name="subcity" class="form-control" placeholder="Enter your subcity"
                required>
            </div>

            <div class="col-md-6">
              <label for="woreda" class="form-label">Woreda*</label>
              <input type="text" id="woreda" name="woreda" class="form-control" placeholder="Enter your woreda"
                required>
            </div>

            <div class="col-md-6">
              <label for="kebele" class="form-label">Kebele*</label>
              <input type="text" id="kebele" name="kebele" class="form-control" placeholder="Enter your kebele"
                required>
            </div>

            <div class="col-md-6">
              <label for="house_no" class="form-label">House Number*</label>
              <input type="text" id="house_no" name="house_no" class="form-control"
                placeholder="Enter your house number" required>
            </div>

            <div class="col-md-6">
              <label for="id_no" class="form-label">ID Number*</label>
              <input type="text" id="id_no" name="id_no" class="form-control" placeholder="Enter your ID number"
                pattern="[0-9]{6,10}" title="ID number must be between 6 to 10 digits." required>
            </div>

            <!-- Next Button -->
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-outline-primary btn-sm">Next</button>
            </div>

          </form>
        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>

  <!-- script to axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>




  <script>
    $("#addressForm").submit(async (e) => {
      e.preventDefault();

      const addressData = {
        region: e.target.elements.region.value,
        city: e.target.elements.city.value,
        subcity: e.target.elements.subcity.value,
        woreda: e.target.elements.woreda.value,
        kebele: e.target.elements.kebele.value,
        house_no: e.target.elements.house_no.value,
        id_no: e.target.elements.id_no.value,
      };

      // Check for empty fields before submitting
      const requiredFields = ['region', 'city', 'subcity', 'woreda', 'kebele', 'house_no', 'id_no'];
      let isFormValid = true;

      requiredFields.forEach(field => {
        if (!addressData[field]) {
          isFormValid = false;
        }
      });

      if (!isFormValid) {
        // Show alert if any required field is empty
        $('<div>')
          .addClass('alert alert-danger mt-3')
          .attr('role', 'alert')
          .text('Please fill out all required fields before submitting.')
          .appendTo('#alertContainer');
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
        return; // Prevent submission if not all required fields are filled
      }

      try {
        await axios.post("http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formcontroller.php", addressData, {
          headers: {
            'Content-Type': 'application/json'
          }
        });
        // Redirect to the next page after successful submission
        window.location.href = "family.php";
      } catch (error) {
        const message = error.response?.data?.message || "Failed to submit address info. Please try again.";
        $('<div>')
          .addClass('alert alert-danger alert-dismissible fade show')
          .attr('role', 'alert')
          .html(`<strong><i class="bi bi-x-circle me-2"></i>Submission Failed:</strong> ${message}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`)
          .appendTo('#alertContainer');
      }
    });
  </script>


</body>

</html>