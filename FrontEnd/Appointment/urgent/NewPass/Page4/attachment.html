<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Attachments</title>
  <style>
    form div {
      margin-bottom: 15px;
    }
  </style>
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!-- Placeholder for Header -->
  <div id="header-placeholder"></div>

  <!-- Main content -->
  <div class="container-fluid my-5 py-1S">
    <div class="row">

      <!-- Sidebar Navigation -->
      <aside class="col-md-3 mb-4 shadow-sm h-100">
        <ul class="list-group">
          <a href="../page1.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Request Appointment</li>
          </a>
          <a href="urgency.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Urgency Type</li>
          </a>
          <a href="page2.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Site
              Selection</li>
          </a>
          <a href="page3.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Date and Time</li>
          </a>
          <a href="Page4/personalinfo.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Personal
              Information</li>
          </a>
          <a href="Page5/pasportpage.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="col-md-9">
        <!-- Step Navigation -->
        <ul class="nav nav-tabs mb-4">
          <li class="nav-item">
            <a class="nav-link" href="personalInfo.html" style="color: #005f99;">Personal Info.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="address.html" style="color: #005f99;">Address</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="family.html" style="color: #005f99;">Family</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="attachment.html"
              style="background-color:#005f99; color: white;">Attachments</a>
          </li>
        </ul>
        <div class="row"><!-- Form & Notes Card -->
          <div class="col-lg-8">

            <div class="card shadow-sm p-4">
              <h4 class="mb-4">Upload Required Documents</h4>
              <div id="uploadErrorAlert" class="alert alert-danger d-none mb-3"></div>

              <!-- Upload Form -->
              <form method="POST" enctype="multipart/form-data" id="uploadForm">

                <div class="mb-3">
                  <label for="birth_certificate_front" class="form-label">Upload Birth Certificate Front*</label>
                  <input type="file" class="form-control" id="birth_certificate_front" name="birth_certificate_front"
                    accept=".pdf,.jpeg,.png" required>
                </div>
                <br>
                <div class="mb-3">
                  <label for="birth_certificate_back" class="form-label">Upload Birth Certificate Back*</label>
                  <input type="file" class="form-control" id="birth_certificate_back" name="birth_certificate_back"
                    accept=".pdf,.jpeg,.png" required>
                </div>
                <br>
                <div class="mb-3">
                  <label for="id_front" class="form-label">Upload ID Front*</label>
                  <input type="file" class="form-control" id="id_front" name="id_front" accept=".png,.jpeg,.png"
                    required>
                </div>
                <br>
                <div class="mb-3">
                  <label for="id_back" class="form-label">Upload ID Back*</label>
                  <input type="file" class="form-control" id="id_back" name="id_back" accept=".png,.jpeg,.pdf" required>
                </div>
                <!-- Next Button -->
                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-outline-primary btn-sm">Next</button>
                </div>
            </div>
            </form>
          </div>
          <!-- Notes Section -->
          <div class="col-lg-4 h-100">
            <div class="alert alert-info h-100">
              <h5>Note Info:</h5>
              <ul class="mb-0">
                <li>Size should be less than 1MB.</li>
                <li>Accepted formats: JPEG, PNG, or PDF.</li>
                <li>Only clear, A4 color photocopies are accepted.</li>
                <li>Bring original documents on appointment day.</li>
              </ul>

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
    $("#uploadForm").submit(async (e) => {
      e.preventDefault();

      // Clear previous errors
      const errorAlert = document.getElementById('uploadErrorAlert');
      if (errorAlert) {
        errorAlert.classList.add('d-none');
        errorAlert.innerHTML = '';
      }

      const formData = new FormData();

      formData.append('birth_certificate_front', $('#birth_certificate_front')[0].files[0]);
      formData.append('birth_certificate_back', $('#birth_certificate_back')[0].files[0]);
      formData.append('id_front', $('#id_front')[0].files[0]);
      formData.append('id_back', $('#id_back')[0].files[0]);

      try {
        const response = await axios.post(
          'http://localhost/Website/Project/et_passport_service_Backend/BackEnd/Appointment/formHandlerurgent.php',
          formData, {
          headers: {
            'Content-Type': 'multipart/form-data' // Required for file uploads
          },
          withCredentials: true // Required for sessions
        });

        if (response.data.success) {
          window.location.href = '../page5/passportPage.html';
        } else {
          throw new Error(response.data.message || 'Upload failed due to server validation');
        }
      } catch (error) {
        console.error('Upload error:', error);
        if (errorAlert) {
          errorAlert.innerHTML = `
            <strong>Error!</strong> ${error.response?.data?.message || error.message || 'An error occurred during upload.'}
          `;
          errorAlert.classList.remove('d-none');
          errorAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      }
    });
  </script>

</body>

</html>