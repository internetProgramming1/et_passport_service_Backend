<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Choose Passport Service Type</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!-- Load header -->

  <?php include __DIR__ . '/../../../../Front/Header.html'; ?>

  <!-- Main content -->
  <main class="container my-5">
    <div class="row g-4">

      <!-- Appointment Request Info -->
      <div class="mt-5">
        <div class="alert alert-info">
          <h5 class="mb-1">Appointment Request:</h5>
          <p class="mb-0">Individual Urgent Passport Appointment Schedule</p>
        </div>
      </div>
      <form id="myForm" method="post">
        <!-- New Passport -->
        <div class="col-12">
          <div class="card h-100 shadow-sm">
            <div class="card-body row">
              <div class="col-md-4">
                <h4 class="card-title text-primary">New Passport Appointment</h4>
              </div>
              <div class="col-md-8">
                <p class="card-text">
                  First time applicants are requested to schedule for appointment. You receive confirmation via email or
                  SMS.
                  Print the last page which has your appointment date and time. Take the paper with you to your
                  appointment consular.
                </p>

                <button class="btn btn-outline-primary mt-2" type="button" value="new" id="new"
                  onclick="T('NewPass/urgencyType',this)">Schedule
                  Appointment</button>


              </div>
            </div>
          </div>
        </div>
        <br>
        <!-- Renewal Passport -->
        <div class="col-12">
          <div class="card h-100 shadow-sm">
            <div class="card-body row">
              <div class="col-md-4">
                <h4 class="card-title text-success">Renewal Passport</h4>
              </div>
              <div class="col-md-8">
                <p class="card-text">
                  Expired, damaged or page runout (not expired) passport, applicants are requested to schedule for
                  appointment.
                  Print the last page which has your appointment date and time.
                </p>
                <button class="btn btn-outline-success mt-2" type="button" value="renewal" id="renewal"
                  onclick="T('RenewalPass/urgencyType',this)">Schedule Renewal</button>


              </div>
            </div>
          </div>
        </div>
        <br>
        <!-- Lost Passport -->
        <div class="col-12">
          <div class="card h-100 shadow-sm">
            <div class="card-body row">
              <div class="col-md-4">
                <h4 class="card-title text-danger">Lost Passport</h4>
              </div>
              <div class="col-md-8">
                <p class="card-text">
                  Lost / Stolen passport applicants are requested to schedule for appointment. Print the last page which
                  has
                  your appointment date and time.
                </p>
                <button class="btn btn-outline-danger mt-2" type="button" value="lost" id="lost"
                  onclick="T('LostPass/urgencyType',this)">Report & Schedule</button>
              </div>
            </div>
          </div>
        </div>
        <br>
        <!-- Correction -->
        <div class="col-12 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body row">
              <div class="col-md-4">
                <h4 class="card-title text-warning">Passport Info Correction</h4>
              </div>
              <div class="col-md-8">
                <p class="card-text">
                  Request to correct passport data. Applicants must schedule for appointment and bring printed
                  confirmation.
                </p>
                <button class="btn btn-outline-warning mt-2" type="button" value="correction" id="correction"
                  onclick="T('Correction/Correction',this)">Request Correction</button>

              </div>
            </div>
          </div>
        </div>
      </form>
    </div>


  </main>


  <?php include __DIR__ . '/../../../../Front/footer.html' ?>


  <!-- Axios   -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



  <script>
    function T(redirectUrl, buttonElement) {

      const value = $(buttonElement).val();

      // Send the value to PHP backend using Axios POST
      axios.post('http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', {
          category: value // we will use this in the backend 
        }, {
          headers: {
            'Content-Type': 'application/json'
          },
          withCredentials: true
        })
        .then((response) => {
          console.log('Data sent successfully:', response.data);

          // After successful sending, redirect to the next page
          window.location.href = redirectUrl;
        })
        .catch((error) => {
          console.log('Failed to send data: ' + error.message)

        });
    }
  </script>



</body>

</html>