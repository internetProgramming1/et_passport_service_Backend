<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Application Summary</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .summary-card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .summary-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #005f99;
            color: white;
            font-weight: 600;
        }

        .list-group-item {
            padding: 12px 20px;
        }

        .confirmation-check {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .attachment-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .attachment-icon {
            color: #005f99;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../../../../../../Front/header.html' ?>

    <div class="container py-5">
        <h2 class="mb-5 text-center"><i class="fas fa-clipboard-check me-2"></i>Review and Confirm Your Application</h2>

        <div id="errorCont" class="alert alert-danger d-none"></div>

        <div id="summaryContainer" class="row g-4">
            <!-- Loading indicator -->
            <div class="col-12 text-center py-5">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3">Loading your application details...</p>
            </div>
        </div>

        <div class="confirmation-check">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" required id="Check">
                <label class="form-check-label" for="Check">
                    <strong>I confirm that all information provided matches my identity documents exactly.</strong>
                </label>
            </div>
        </div>

        <div class="text-center mt-4">
            <button id="submitBtn" class="btn btn-success btn-lg px-5" onclick="confirmSubmission()">
                <i class="fas fa-paper-plane me-2"></i>Confirm & Submit Application
            </button>
        </div>
    </div>

    <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Utility functions
        const formatDate = (dateString) => {
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return new Date(dateString).toLocaleDateString('en-US', options);
        };

        const generateAppNo = () => {
            return "PSA" + Math.floor(1000000000 + Math.random() * 9000000000);
        };

        // Main application logic
        document.addEventListener('DOMContentLoaded', () => {
            loadApplicationData();
        });

        async function loadApplicationData() {
            try {
                const response = await axios.get(
                    'http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formController.php', {
                        withCredentials: true
                    }
                );

                if (response.data.success) {
                    displaySummary(response.data.data);
                } else {
                    showError("No application data found. Please start a new application.");
                }
            } catch (error) {
                console.error("Error loading application:", error);
                showError("Failed to load application data. Please try again later.");
            }
        }

        function displaySummary(data) {
            const container = document.getElementById("summaryContainer");
            container.innerHTML = "";

            // 1. Application Overview
            container.appendChild(createCard("Application Overview", [{
                    label: "Application Type",
                    value: data.type.toUpperCase(),
                    icon: "fa-file-alt"
                },
                {
                    label: "Category",
                    value: data.category.toUpperCase(),
                    icon: "fa-tag"
                },
                {
                    label: "Appointment Date",
                    value: data.dateTime.date,
                    icon: "fa-clock"
                }, {
                    label: "Appointment Time",
                    value: data.dateTime.time,
                    icon: "fa-clock"
                },

            ]));

            // 2. Location Information
            container.appendChild(createCard("Location Information", [{
                    label: "Application Site",
                    value: data.siteData.site,
                    icon: "fa-map-marker-alt"
                },
                {
                    label: "City",
                    value: data.siteData.city,
                    icon: "fa-city"
                },
                {
                    label: "Processing Office",
                    value: data.siteData.office,
                    icon: "fa-building"
                },
                {
                    label: "Delivery Location",
                    value: data.siteData.delivery,
                    icon: "fa-truck"
                }
            ]));

            // 3. Personal Information
            const fullName = `${data.personalInfo.firstname} ${data.personalInfo.middlename} ${data.personalInfo.lastname}`;
            container.appendChild(createCard("Personal Information", [{
                    label: "Full Name",
                    value: fullName,
                    icon: "fa-user"
                },
                {
                    label: "Phone Number",
                    value: data.personalInfo.phone,
                    icon: "fa-phone"
                },
                {
                    label: "Email Address",
                    value: data.personalInfo.email,
                    icon: "fa-envelope"
                },
                {
                    label: "Gender",
                    value: data.personalInfo.gender,
                    icon: "fa-venus-mars"
                },
                {
                    label: "Date of Birth",
                    value: formatDate(data.personalInfo.dob),
                    icon: "fa-birthday-cake"
                },
                {
                    label: "Birthplace",
                    value: data.personalInfo.birthplace,
                    icon: "fa-home"
                },
                {
                    label: "Nationality",
                    value: data.personalInfo.nationality,
                    icon: "fa-flag"
                }
            ]));

            // 4. Address Information
            container.appendChild(createCard("Address Information", [{
                    label: "Region",
                    value: data.addressData.region,
                    icon: "fa-map"
                },
                {
                    label: "City",
                    value: data.addressData.city,
                    icon: "fa-city"
                },
                {
                    label: "Subcity",
                    value: data.addressData.subcity,
                    icon: "fa-map-pin"
                },
                {
                    label: "Woreda",
                    value: data.addressData.woreda,
                    icon: "fa-location-arrow"
                },
                {
                    label: "Kebele",
                    value: data.addressData.kebele,
                    icon: "fa-house-user"
                },
                {
                    label: "House Number",
                    value: data.addressData.house_no,
                    icon: "fa-home"
                },
                {
                    label: "ID Number",
                    value: data.addressData.id_no,
                    icon: "fa-id-card"
                }
            ]));

            // 5. Family Information
            const familyCard = document.createElement("div");
            familyCard.className = "col-lg-6";
            familyCard.innerHTML = `
                <div class="card summary-card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Family Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6><i class="fas fa-female me-2"></i>Mother's Information</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>First Name:</strong> ${data.family.mother.first_name}</li>
                                    <li class="list-group-item"><strong>Father's Name:</strong> ${data.family.mother.father_name}</li>
                                    <li class="list-group-item"><strong>Grandfather's Name:</strong> ${data.family.mother.grandfather_name}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6><i class="fas fa-male me-2"></i>Father's Information</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>First Name:</strong> ${data.family.father.first_name}</li>
                                    <li class="list-group-item"><strong>Father's Name:</strong> ${data.family.father.father_name}</li>
                                    <li class="list-group-item"><strong>Grandfather's Name:</strong> ${data.family.father.grandfather_name}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>`;
            container.appendChild(familyCard);



            // 6. Attachments
            const attachmentsContent = Object.entries(data.attachments).map(([key, value]) => {
                const label = key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                return {
                    label,
                    value: `<div class="attachment-item">
                                <i class="fas fa-paperclip attachment-icon"></i>
                                <span>${value}</span>
                            </div>`,
                    icon: "fa-paperclip"
                };
            });
            container.appendChild(createCard("Uploaded Documents", attachmentsContent));
        }

        function createCard(title, items) {
            const card = document.createElement("div");
            card.className = "col-lg-6";

            let content = `<div class="card summary-card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas ${items[0].icon} me-2"></i>${title}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">`;

            items.forEach(item => {
                content += `<li class="list-group-item">
                    <strong>${item.label}:</strong> ${item.value}
                </li>`;
            });

            content += `</ul></div></div>`;
            card.innerHTML = content;
            return card;
        }

        function showError(message) {
            const errorBox = document.getElementById("errorCont");
            errorBox.textContent = message;
            errorBox.classList.remove("d-none");
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        async function confirmSubmission() {
            const checkbox = document.getElementById("Check");
            if (!checkbox.checked) {
                showError("Please confirm that all details match your identity documents by checking the box.");
                return;
            }

            const submitBtn = document.getElementById("submitBtn");
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...';

            try {
                const response = await axios.post(
                    'http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formController.php', {

                        registrationDate: new Date().toISOString().split('T')[0],
                        applicationNumber: generateAppNo()
                    }, {
                        withCredentials: true,
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }
                );

                if (response.data.success) {
                    alert("Your Appointment data saved correctly");
                    window.location.href = 'payment.php';
                } else {
                    showError(response.data.message || "Submission Failed Please Try Again...");
                }
            } catch (error) {
                console.error("Submission error:", error);
                showError("An error occurred during submission. Please try again later.");
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Confirm & Submit Application';
            }
        }
    </script>
</body>

</html>