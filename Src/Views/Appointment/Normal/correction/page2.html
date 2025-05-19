<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Site Selection</title>
  <style>


  </style>
</head>

<body>

  <!-- Placeholder for Header -->
  <div id="header-placeholder"></div>

  <!-- Main content -->
  <div class="container-fluid py-4 my-5">
    <div class="row">
      <!-- Sidebar Navigation -->
      <aside class="col-lg-3 mb-4 shadow-sm h-100">
        <ul class="list-group">
          <a href="../page1.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Request Appointment</li>
          </a>
          <a href="page2.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Site
              Selection</li>
          </a>
          <a href="page3.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Date and Time</li>
          </a>
          <a href="Page4/personalinfo.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Personal Information</li>
          </a>
          <a href="Page5/passportPage.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>

      <!-- Main content area with form and preview -->
      <main class="col-lg-9">
        <div class="row">
          <!-- Form Area -->
          <div class="col-lg-8 mb-4 ">
            <div class="card p-4 shadow-sm">
              <form id="siteSelectionForm" method="post">
                <h4 class="mb-3">Site Selection</h4>
                <!-- Error Alert Container -->
                <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                  <ul id="errorList" class="mb-0">
                    <!-- Errors will be inserted here -->
                  </ul>
                </div>
                <div class="mb-3">
                  <label for="site" class="form-label">Site Selection*</label>
                  <select id="site" name="site" class="form-select" required>
                    <option value="" disabled selected>Select Site</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Bahir Dar">Bahir Dar</option>
                    <option value="Hawassa">Hawassa</option>
                    <option value="Mekelle">Mekelle</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="city" class="form-label">City*</label>
                  <select id="city" name="city" class="form-select" required>
                    <option value="" disabled selected>Select City</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Bahir Dar">Bahir Dar</option>
                    <option value="Hawassa">Hawassa</option>
                    <option value="Mekelle">Mekelle</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="office" class="form-label">Office*</label>
                  <select id="office" name="office" class="form-select" required>
                    <option value="" disabled selected>Select Office</option>
                    <option value="ICS Main Office">ICS Main Office</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="delivery" class="form-label">Delivery Site*</label>
                  <select id="delivery" name="delivery" class="form-select" required>
                    <option value="" disabled selected>Select Delivery Site</option>
                    <option value="ICS Main Office">ICS Main Office</option>
                  </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-outline-primary ">Next</button>
              </form>
            </div>
          </div>

          <!-- Site Preview Area -->
          <div class="col-lg-4 ">
            <div class="card bg-light p-3 h-auto shadow-sm">
              <h5 class="mb-3">Site Preview</h5>
              <p><strong>Site:</strong> <span id="preview-site">-</span></p>
              <p><strong>City:</strong> <span id="preview-city">-</span></p>
              <p><strong>Office:</strong> <span id="preview-office">-</span></p>
              <p><strong>Delivery Site:</strong> <span id="preview-delivery">-</span></p>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>


  <!-- Placeholder for Footer -->
  <div id="footer-placeholder"></div>

  <!-- Script to include header and footer -->
  <script src="http://localhost/website/project/et_passport_service_backend/FrontEnd/Head_Foot/script.js">
  </script>

  <!-- Bootstrap Bundle JS (includes Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Axios   -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


  <script>
    function updatePreview() {
      document.getElementById('preview-site').textContent = document.getElementById('site').value || '-';
      document.getElementById('preview-city').textContent = document.getElementById('city').value || '-';
      document.getElementById('preview-office').textContent = document.getElementById('office').value || '-';
      document.getElementById('preview-delivery').textContent = document.getElementById('delivery').value || '-';
    }

    document.querySelectorAll('select').forEach(select => {
      select.addEventListener('change', updatePreview);
    });
  </script>

  <script>
    document.getElementById("siteSelectionForm").addEventListener("submit", async (e) => {
      e.preventDefault();

      // Clear previous errors
      const errorAlert = document.getElementById('errorAlert');
      errorAlert.classList.add('d-none');

      // Check if any required field is empty
      const form = e.target;
      const requiredFields = ['site', 'city', 'office', 'delivery'];
      const isEmpty = requiredFields.some(field => !form.elements[field].value);

      if (isEmpty) {
        errorAlert.textContent = "All required fields must be filled";
        errorAlert.classList.remove('d-none');
        return; // Stop submission
      }

      // Rest of your submission logic...
      try {
        const siteData = {
          site: form.elements.site.value,
          city: form.elements.city.value,
          office: form.elements.office.value,
          delivery: form.elements.delivery.value
        };

        await axios.post("http://localhost/Website/Project/et_passport_service_Backend/BackEnd/Appointment/formHandler.php", siteData, {
          headers: {
            'Content-Type': 'application/json'
          },
          withCredentials: true
        });
        window.location.href = "page3.html";
      } catch (error) {
        errorAlert.textContent = "Error saving data. Please try again.";
        errorAlert.classList.remove('d-none');
      }
    });
  </script>
</body>

</html>