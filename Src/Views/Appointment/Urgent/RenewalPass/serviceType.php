<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Service Type</title>
</head>

<body>

  <!-- Load header -->

  <?php include __DIR__ . '/../../../../../Front/Header.html'; ?>


  <!-- Main content -->
  <div class="container-fluid py-4 my-5">
    <div class="row">
      <!-- Sidebar Navigation -->
      <aside class="col-md-3 mb-4 shadow-sm h-100">
        <ul class="list-group">
          <a href="../page1.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Request Appointment</li>
          </a>
          <a href="./urgency.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Urgency Type</li>
          </a>
          <a href="./serviceType.php">
            <li class="list-group-item list-group-item-action"
              style="color: white; background-color: #005f99;">Service Type</li>
          </a>
          <a href="./page2.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Site Selection</li>
          </a>
          <a href="./page3.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Date and Time</li>
          </a>
          <a href="./Page4/personalinfo.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Personal Information</li>
          </a>
          <a href="./Page5/pasportpage.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>

      <!-- Main content area with form and preview -->
      <main class="col-md-9">
        <div class="row">
          <!-- Form Area -->
          <div class="col-md-7 mb-4 ">
            <div class="card p-4 shadow-sm">
              <form id="serviceForm" method="post">
                <h4 class="mb-3">Service Type</h4>
                <!-- Error Alert Container -->
                <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                  <ul id="errorList" class="mb-0">
                    <!-- Errors will be inserted here -->
                  </ul>
                </div>
                <div class="mb-3">
                  <label for="serviceType" class="form-label">Choose The Service Type</label>
                  <select id="serviceType" name="serviceType" class="form-select" required>
                    <option value="" disabled selected>Select your Renewal service type</option>
                    <option value="Expire">Expired Passport</option>
                    <option value="Page Runout">Page Runout</option>
                    <option value="Damaged">Damaged Passport</option>
                  </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-outline-primary ">Next</button>
              </form>
            </div>
          </div>

          <div class="col-lg-5 h-100">
            <div class="alert alert-info h-100">
              <strong>Note:</strong><br>
              <ul style="margin-top: 5px; padding-left: 20px;">
                <li><strong>Expired Passport:</strong> Select this if your passport has passed its validity date.</li>
                <li><strong>Page Runout:</strong> Choose this if your passport is full and has no blank pages left.</li>
                <li><strong>Damaged Passport:</strong> Select this if your passport is physically damaged or illegible.</li>
              </ul>


            </div>
          </div>


        </div>
      </main>
    </div>
  </div>

  <?php include __DIR__ . '/../../../../../Front/footer.html' ?>


  <!-- Axios   -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


  <script>
    document.getElementById("serviceForm").addEventListener("submit", async (e) => {
      e.preventDefault();

      // Clear previous errors
      const errorAlert = document.getElementById('errorAlert');
      const errorList = document.getElementById('errorList');
      errorList.innerHTML = '';
      errorAlert.classList.add('d-none');

      const form = e.target;
      const serviceType = form.elements['serviceType'].value;

      if (!serviceType) {
        errorList.innerHTML = '<li>You must select the service type.</li>';
        errorAlert.classList.remove('d-none');
        return;
      }

      try {
        await axios.post("http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php", {
          serviceType: serviceType
        }, {
          headers: {
            'Content-Type': 'application/json'
          },
          withCredentials: true
        });

        window.location.href = "page2.php";
      } catch (error) {
        errorList.innerHTML = '<li>Error saving data. Please try again.</li>';
        errorAlert.classList.remove('d-none');
      }
    });
  </script>

</body>

</html>