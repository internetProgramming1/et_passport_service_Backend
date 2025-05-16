<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Passport Information</title>
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
                    <a href="./passInfo.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Personal Information</li>
                    </a>
                    <a href="../Page5/pasportpage.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Payment</li>
                    </a>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="col-md-9">

                <!-- Navigation tabs -->
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a class="nav-link" href="./personalinfo.php" style="color: #005f99;">Personal Info.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./address.php" style="color: #005f99;">Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./family.php" style="color: #005f99;">Family</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./passInfo.php" style="background-color:#005f99; color: white; ">Passport Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="attachment.php" style="color: #005f99;">Attachments</a>
                    </li>
                </ul>

                <!-- Form -->
                <div class="card shadow-sm p-4">
                    <h4 class="mb-4">Passport Information</h4>

                    <div id="errorAlert" class="alert alert-danger d-none mb-3"></div>

                    <form id="passportForm" method="post" class="row g-3">

                        <div class="mb-3 col-md-6">
                            <label for="oldPassportNumber" class="form-label">Old Passport Number*</label>
                            <input type="text" class="form-control" id="oldPassportNumber" placeholder="Enter old passport page number" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="issueDate" class="form-label">Old Passport Issue Date*</label>
                            <input type="date" class="form-control" id="issueDate" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="expiryDate" class="form-label">Old Passport Expiration Date*</label>
                            <input type="date" class="form-control" id="expiryDate" required>
                        </div>
                        <!-- Correction Checkbox and Conditional Field -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="correction" name="hasCorrection">
                                <label class="form-check-label" style="color: #005f99;" for="correction">
                                    Does your old passport have a correction?
                                </label>
                            </div>
                        </div>

                        <!-- This div will only show when checkbox is checked -->
                        <div id="correctionFields" class="mb-3 col-md-6" style="display: none;">
                            <label for="correctionType" class="form-label">Correction Type*</label>
                            <select class="form-select" id="correctionType" name="correctionType" required>
                                <option disabled selected value="">Select correction type</option>
                                <option value="Name">Name Correction</option>
                                <option value="Date of Birth">Date of Birth Correction</option>
                                <option value="Gender">Gender Correction</option>
                            </select>
                        </div>

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
        // Show/hide correction fields based on checkbox
        document.getElementById('correction').addEventListener('change', function() {
            const correctionFields = document.getElementById('correctionFields');
            correctionFields.style.display = this.checked ? 'block' : 'none';

            // Make correction type required only if checkbox is checked
            document.getElementById('correctionType').required = this.checked;
        });

        // Form submission
        document.getElementById("passportForm").addEventListener("submit", async (e) => {
            e.preventDefault();

            const form = e.target;
            const formData = {
                old_passport_number: form.elements.oldPassportNumber.value,
                old_issue_date: form.elements.issueDate.value,
                old_expiry_date: form.elements.expiryDate.value,
                has_correction: form.elements.hasCorrection.checked,
                correction_type: form.elements.hasCorrection.checked ? form.elements.correctionType.value : null
            };

            // Validate required fields
            const requiredFields = ['old_passport_number', 'old_issue_date', 'old_expiry_date'];
            if (formData.has_correction && !formData.correction_type) {
                showError("Please select a correction type");
                return;
            }

            try {
                const response = await axios.post(
                    "http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php",
                    formData, {
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }
                );

                if (response.data.success) {
                    window.location.href = "attachment.php";
                } else {
                    showError(response.data.message || "Submission failed");
                }
            } catch (error) {
                showError(error.response?.data?.message || "Network error. Please try again.");
            }
        });

        function showError(message) {
            const errorAlert = document.getElementById('errorAlert');
            errorAlert.textContent = message;
            errorAlert.classList.remove('d-none');
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>



</body>

</html>