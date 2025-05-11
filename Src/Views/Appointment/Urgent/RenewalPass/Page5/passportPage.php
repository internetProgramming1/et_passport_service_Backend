<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Passport page Number</title>
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
          <a href="../Page4/personalinfo.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Personal Information</li>
          </a>
          <a href="./passportPage.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="col-lg-9">
        <!-- Step Navigation -->
        <ul class="nav nav-tabs mb-4">
          <li class="nav-item">
            <a href="./passportPage.php" class="nav-link" style="background-color:#005f99; color: white;">Passport Page
              No.</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./summary.php" style="color: #005f99;">Summary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./payment.php" style="color: #005f99;">Payment</a>
          </li>
        </ul>

        <!-- Form & Notes Card -->
        <div class="row">
          <div class=" col-md-7">

            <!-- Upload Form -->
            <div class="card shadow-sm p-4">
              <h4 class="mb-2">Choose the Number of Passport Pages Requested </h4>
              <div id="uploadErrorAlert" class="alert alert-danger d-none mb-2 mt-3"></div>
              <form method="POST" id="uploadForm">
                <br>
                <div class="mb-3">
                  <label for="page-no" class="form-label">Passport Page No.*</label>
                  <select name="page-no" id="page-no" class="form-select">
                    <option value="" disabled selected>Select Passport Page No.</option>
                    <option value="32">32 page</option>
                    <option value="64">64 page</option>
                    <option value="92">92 page</option>
                  </select>

                </div>
                <!-- Next Button -->
                <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-outline-primary btn-sm">Next</button>
                </div>
            </div>
            </form>


          </div>


        </div>
      </main>
    </div>
  </div>


  <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>

  <!-- Axios   -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


  <script>
    $(document).ready(function() {
      $("#uploadForm").submit(async (e) => {
        e.preventDefault();

        const errorAlert = document.getElementById('uploadErrorAlert');
        if (errorAlert) {
          errorAlert.classList.add('d-none');
          errorAlert.innerHTML = '';
        }

        const pageNo = $('#page-no').val();

        if (!pageNo) {
          errorAlert.classList.remove('d-none');
          errorAlert.innerHTML = 'Please select a passport page number.';
          return;
        }

        try {
          const response = await axios.post('http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', {
            pageNo: pageNo
          }, {
            headers: {
              'Content-Type': 'application/json' // Required for file uploads
            },
            withCredentials: true // Required for sessions
          });

          if (response.data.success) {
            window.location.href = '../page5/summary.php';
          } else {
            alert('Upload failed due to server validation: ' + response.data.message);
            throw new Error(response.data.message || 'Upload failed due to server validation');
          }

        } catch (error) {
          alert(error);
          console.error('Error uploading files:', error);
          errorAlert.classList.remove('d-none');
          errorAlert.innerHTML = 'An error occurred while uploading the files. Please try again.';
        }
      })
    });
  </script>

</body>

</html>