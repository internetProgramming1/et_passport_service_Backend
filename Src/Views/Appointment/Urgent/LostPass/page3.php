<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Select Time & Date</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <!-- Load header -->
  <?php include __DIR__ . '/../../../../../Front/Header.html'; ?>

  <!-- Main content -->
  <div class="container-fluid py-1 my-5">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-lg-3 mb-4 shadow-sm h-100">
        <ul class="list-group">
          <a href="../page1.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Request Appointment</li>
          </a>
          <a href="urgency.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Urgency Type</li>
          </a>

          <a href="page2.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Site Selection</li>
          </a>
          <a href="page3.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Date and Time</li>
          </a>
          <a href="Page4/personalinfo.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Personal Information</li>
          </a>
          <a href="Page5/pasportpage.php" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="col-md-9">
        <div class="row">
          <!-- Error Display -->
          <div class="col-md-8">
            <div id="errorBox" class="alert alert-danger d-none" role="alert"></div>
          </div>

          <form id="dateForm" method="post">
            <!-- Display Area -->
            <div class="col-lg-8 h-100">
              <div class="alert alert-info" id="dateTime">
                <h5>Estimated Delivery Date:</h5>
                <div class="col-sm-6">
                  <h6 id="deliveryDateDisplay">Loading...</h6>
                </div>
              </div>
            </div>

            <!-- Hidden input to store the delivery date -->
            <input type="hidden" id="deliveryDate" name="deliveryDate">

            <!-- Submit Button -->
            <div class="col-sm-8">
              <button type="submit" class="btn btn-outline-primary">Next</button>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>
  <br><br>
  <?php include __DIR__ . '/../../../../../Front/footer.html'; ?>

  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script>
    let deliveryDate;

    window.onload = function() {
      // Fetch urgency type from session
      axios.get('http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', {
          withCredentials: true
        })
        .then(res => {
          if (res.data.success) {
            displayDeliveryDate(res.data.data.urgency);
          } else {
            showError("No urgency data found. Please select an urgency type first.");
          }
        })
        .catch(err => {
          console.error(err);
          showError("Error loading session data. Please try again.");
        });
    };

    function displayDeliveryDate(urgency) {
      const currentDate = new Date();
      let daysToAdd = (urgency === "2days") ? 2 : 5;
      deliveryDate = addWorkingDays(currentDate, daysToAdd);

      // Display formatted date (e.g., "Tuesday, May 21, 2024")
      const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      };
      document.getElementById("deliveryDateDisplay").textContent = deliveryDate.toLocaleDateString('en-US', options);
      document.getElementById("deliveryDate").value = deliveryDate.toISOString().split('T')[0];
    }

    // Helper function to skip weekends
    function addWorkingDays(startDate, days) {
      let result = new Date(startDate);
      let addedDays = 0;

      while (addedDays < days) {
        result.setDate(result.getDate() + 1);
        if (result.getDay() !== 0 && result.getDay() !== 6) { // Skip Sat/Sun
          addedDays++;
        }
      }
      return result;
    }

    // Form submission
    document.getElementById("dateForm").addEventListener("submit", async (e) => {
      e.preventDefault();

      if (!deliveryDate) {
        showError("Please wait while we calculate your delivery date.");
        return;
      }

      try {
        const response = await axios.post(
          'http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', {
            deliveryDate: document.getElementById("deliveryDate").value
          }, {
            headers: {
              'Content-Type': 'application/json'
            },
            withCredentials: true
          }
        );

        if (response.data.success) {
          window.location.href = "Page4/personalinfo.php";
        } else {
          showError(response.data.message || "Failed to save delivery date.");
        }
      } catch (err) {
        console.error(err);
        showError("Network error. Please try again.");
      }
    });

    function showError(message) {
      const errorBox = document.getElementById("errorBox");
      errorBox.textContent = message;
      errorBox.classList.remove("d-none");
      setTimeout(() => errorBox.classList.add("d-none"), 10000);
    }
  </script>

</body>

</html>