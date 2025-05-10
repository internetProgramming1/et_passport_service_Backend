<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Select Time & Date</title>
</head>

<body>

  <!-- Load header -->

  <?php include __DIR__ . '/../../../../../Front/Header.html'; ?>


  <!-- Main content -->
  <div class="container-fluid py-4 my-5">
    <div class="row">
      <!-- Sidebar -->
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
            <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Date and
              Time</li>
          </a>
          <a href="Page4/personalinfo.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Personal Information</li>
          </a>
          <a href="Page5/pasportpage.html" class="text-decoration-none">
            <li class="list-group-item list-group-item-action">Payment</li>
          </a>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="col-md-9">
        <div class="row">
          <!-- Error Display -->
          <div class="col-md-8 mx-3">
            <div id="errorBox" class="alert alert-danger d-none" role="alert"></div>
          </div>

          <!-- Display Area -->
          <div class="col-md-8  alert alert-info mx-3" id="dateTime"></div>


          <!-- Submit Button -->
          <div class="col-md-8 mt-3">
            <button onclick="goToNext()" class="btn btn-outline-primary">Next</button>
          </div>
        </div>
      </main>

    </div>

  </div>


  <?php include __DIR__ . '/../../../../../Front/footer.html' ?>


  <!-- Bootstrap Bundle JS (includes Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Axios   -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script>
    window.onload = function() {
      axios.get('http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', {
          withCredentials: true
        })
        .then(res => {
          if (res.data.success) {
            display(res.data.data.urgency);
          } else {
            alert(res.data.message);
            showError("No data found in session.");
          }
        })
        .catch(err => {
          console.error(err);
          showError("Error loading session data.");
        });
    };

    function display(urgency) {
      const container = document.getElementById("dateTime");
      const currentDate = new Date();
      let deliveryDate;

      if (urgency === "2days") {
        currentDate.setDate(currentDate.getDate() + 2);
      } else {
        currentDate.setDate(currentDate.getDate() + 5);
      }

      deliveryDate = currentDate.toDateString(); // Make it readable

      container.innerHTML = `
        <h5>Estimated Delivery Date:</h5>
        <div class="col-sm-6">
          <h6>${deliveryDate}</h6>
        </div>
      `;
      axios.post('http://localhost/website/project/et_passport_service_backend/BackEnd/Appointment/formHandlerUrgent.php', {
          deliveryDate: deliveryDate
        }, {
          withCredentials: true
        })
        .then(res => {
          if (res.data.success) {
            console.log("Delivery date saved successfully.");
          } else {
            console.error("Failed to save delivery date.");
          }
        })
        .catch(err => {
          console.error(err);
          showError("Error saving delivery date.");
        });
    }

    function showError(message) {
      const errorBox = document.getElementById("errorBox");
      errorBox.textContent = message;
      errorBox.classList.remove("d-none");
    }

    function goToNext() {
      window.location.href = "Page4/personalinfo.php";
    }
  </script>

</body>

</html>