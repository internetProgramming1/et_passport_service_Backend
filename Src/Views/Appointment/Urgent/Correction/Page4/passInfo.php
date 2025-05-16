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
            <aside class="col-md-3 mb-4 shadow-sm h-100">
                <ul class="list-group">
                    <a href="../page1.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Request Appointment</li>
                    </a>
                    <a href="../urgency.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Urgency Type</li>
                    </a>
                    <a href="../page2.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Site
                            Selection</li>
                    </a>
                    <a href="../page3.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Date and Time</li>
                    </a>
                    <a href="../Page4/personalinfo.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Personal
                            Information</li>
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

                        <div class="mb-3 col-md-6">
                            <label for="correctionType" class="form-label">Correction Type*</label>
                            <select class="form-select" id="correctionType" required>
                                <option disabled value="">Select correction type</option>
                                <option value="Name">Name Correction</option>
                                <option value="Date of Birth">Date of Birth Correction</option>
                                <option value="Gender">Gender Correction</option>
                                <!-- Add more options as needed -->
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
        $("#passportForm").submit(async (e) => {
            e.preventDefault();

            const passportData = {
                old_passport_number: e.target.elements.oldPassportNumber.value,
                old_issue_date: e.target.elements.issueDate.value,
                old_expiry_date: e.target.elements.expiryDate.value,
                correction_type: e.target.elements.correctionType.value
            };

            // Required fields to validate
            const requiredFields = ['old_issue_date', 'old_expiry_date', 'correction_type', 'correction_type'];
            let isFormValid = true;

            requiredFields.forEach(field => {
                if (!passportData[field]) {
                    isFormValid = false;
                }
            });

            if (!isFormValid) {
                // Show alert if required fields are empty
                $('#errorAlert')
                    .removeClass("d-none")
                    .text("Please fill out all required fields before submitting.");
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                return;
            }

            try {
                await axios.post("http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php", passportData, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                window.location.href = "attachment.php";
            } catch (error) {
                const message = error.response?.data?.message || "Failed to submit passport info. Please try again.";
                $('#errorAlert')
                    .removeClass("d-none")
                    .html(`<strong>Submission Failed:</strong> ${message}`);
            }
        });
    </script>



</body>

</html>