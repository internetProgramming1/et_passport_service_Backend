<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Urgency Type</title>
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
            <aside class="col-md-3 mb-4 shadow-sm h-100">
                <ul class="list-group">
                    <a href="../page1.html" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Request Appointment</li>
                    </a>
                    <a href="urgency.html">
                        <li class="list-group-item list-group-item-action"
                            style="color: white; background-color: #005f99;">Urgency Type</li>
                    </a>
                    <a href="page2.html" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Site Selection</li>
                    </a>
                    <a href="page3.html" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Date and Time</li>
                    </a>
                    <a href="Page4/personalinfo.html" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Personal Information</li>
                    </a>
                    <a href="Page5/pasportpage.html" class="text-decoration-none">
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
                            <form id="urgencyForm" method="post">
                                <h4 class="mb-3">Urgency Type</h4>
                                <!-- Error Alert Container -->
                                <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                                    <ul id="errorList" class="mb-0">
                                        <!-- Errors will be inserted here -->
                                    </ul>
                                </div>
                                <div class="mb-3">
                                    <label for="urgency" class="form-label">Urgency*</label>
                                    <select id="urgency" name="urgency" class="form-select" required>
                                        <option value="" disabled selected>Select your urgency type</option>
                                        <option value="2days">Urgent(2 Days)</option>
                                        <option value="5days">Urgent(5 Days)</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-outline-primary ">Next</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-5 h-100">
                        <div class="alert alert-info h-100">
                            <h4>Passport Collection Under Urgent Processing</h4>
                            <p>
                                For applicants who need their Ethiopian passport processed urgently, the Immigration and
                                Citizenship Service (ICS) allows for faster processing, typically within 2 and 5 working
                                days.
                            </p>
                            <ul>
                                <li><strong>Processing Time:</strong> 2 and 5 working days</li>
                                <li><strong>Requirements:</strong> No emergency proof typically required.</li>
                                <li><strong>Fee:</strong> For 2 days: 25,000 birr &nbsp;&nbsp;|&nbsp;&nbsp; For 5 days:
                                    20,000 birr</li>
                                <li><strong>Available At:</strong>Only Main immigration offices </li>
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
        document.getElementById("urgencyForm").addEventListener("submit", async (e) => {
            e.preventDefault();

            // Clear previous errors
            const errorAlert = document.getElementById('errorAlert');
            errorAlert.classList.add('d-none');

            // Check if any required field is empty
            const form = e.target;
            const requiredFields = ['urgency'];
            const isEmpty = requiredFields.some(field => !form.elements[field].value);

            if (isEmpty) {
                errorAlert.textContent = "You must select the urgency Level";
                errorAlert.classList.remove('d-none');
                return; // Stop submission
            }
            try {
                await axios.post("http://localhost/Website/Project/et_passport_service_Backend/BackEnd/Appointment/formHandlerUrgent.php", { urgency: form.elements.urgency.value }, {
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    withCredentials: true
                });
                window.location.href = "page2.html";
            } catch (error) {
                errorAlert.textContent = "Error saving data. Please try again.";
                errorAlert.classList.remove('d-none');
            }
        });
    </script>
</body>

</html>