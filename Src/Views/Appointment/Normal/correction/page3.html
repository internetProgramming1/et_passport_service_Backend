<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Select Time & Date</title>
</head>

<body>

  <!-- Placeholder for Header -->
  <div id="header-placeholder"></div>

  <!-- Main content -->
  <div class="container-fluid py-4 my-5">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-lg-3 mb-4 shadow-sm h-100">
        <ul class="list-group">
          <a href="../page1.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Request Appointment</li>
          </a>
          <a href="page2.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Site Selection</li>
          </a>
          <a href="page3.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Date and
              Time</li>
          </a>
          <a href="Page4/personalinfo.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Personal Information</li>
          </a>
          <a href="Page5/passportPage.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="col-lg-9">
        <div class="row">
          <!-- Form Section -->
          <div class="col-lg-8 mb-4">
            <div class="card p-4 shadow-sm">
              <form id="dateTimeForm" method="post">
                <!-- Date Selection -->

                <h4 class="mb-3">Select Date & Time</h4>
                <!-- Error Alert Container -->
                <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                  <ul id="errorList" class="mb-0">
                    <!-- Errors will be inserted here -->
                  </ul>
                </div>
                <div class="mb-3">
                  <label for="date" class="form-label">Select Date*</label>
                  <input type="date" id="date" name="date" class="form-control" required>
                </div>

                <!-- Time Selection -->
                <div class="mb-3">
                  <label for="time" class="form-label">Select Time*</label>
                  <select id="time" name="time" class="form-select" required>
                    <option value="" disabled selected>Select time</option>
                    <optgroup label="Morning">
                      <option value="08:00AM-09:00AM">08:00AM-09:00AM</option>
                      <option value="09:00AM-10:00AM">09:00AM-10:00AM</option>
                      <option value="10:00AM-11:00AM">10:00AM-11:00AM</option>
                      <option value="11:00AM-12:00PM">11:00AM-12:00PM</option>
                    </optgroup>
                    <optgroup label="Afternoon">
                      <option value="02:00PM-03:00PM">02:00PM-03:00PM</option>
                      <option value="03:00PM-04:00PM">03:00PM-04:00PM</option>
                      <option value="04:00PM-05:00PM">04:00PM-05:00PM</option>
                    </optgroup>
                  </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-outline-primary ">Next</button>
              </form>
            </div>
          </div>

          <!-- Preview and Notes Section -->
          <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm mb-4">
              <h4 class="mb-3">Appointment Date and Time</h4>
              <p>Working Days: <strong>Monday-Friday</strong><br>
                Time: <strong>8:00AM - 5:00PM Eastern Time (ET)</strong></p>
            </div>

            <div class="card bg-light p-3 shadow-sm">
              <h4 class="mb-3">Selected Time and Date</h4>
              <!-- Here you can use JavaScript to dynamically show the selected values -->
              <p id="selectedDate">Date: -</p>
              <p id="selectedTime">Time: -</p>
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
    document.getElementById('date').addEventListener('change', function () {
      document.getElementById('selectedDate').innerText = "Date: " + this.value;
    });

    document.getElementById('time').addEventListener('change', function () {
      document.getElementById('selectedTime').innerText = "Time: " + this.value;
    });
  </script>

  <script>

    document.getElementById("dateTimeForm").addEventListener("submit", async (e) => {
      e.preventDefault();
      // Clear previous errors
      const errorAlert = document.getElementById('errorAlert');
      errorAlert.classList.add('d-none');

      // Check if any required field is empty
      const form = e.target;
      const requiredFields = ['time', 'date'];
      const isEmpty = requiredFields.some(field => !form.elements[field].value);

      if (isEmpty) {
        errorAlert.textContent = "All required fields must be filled";
        errorAlert.classList.remove('d-none');
        return; // Stop submission
      }


      try {
        const dateTime = {
          date: e.target.elements.date.value,
          time: e.target.elements.time.value
        };
        // Send data to PHP to store in session
        await axios.post("http://localhost/Website/Project/et_passport_service_Backend/BackEnd/Appointment/formHandler.php", dateTime, {
          headers: {
            'Content-Type': 'application/json'
          },
          withCredentials: true
        });
        // Redirect to the next page
        window.location.href = "../NewPass/page4/personalinfo.html"; // Proceed to next step
      } catch (error) {
        errorAlert.textContent = "Error saving data. Please try again.";
        errorAlert.classList.remove('d-none');
      }
    });
  </script>

</body>

</html>