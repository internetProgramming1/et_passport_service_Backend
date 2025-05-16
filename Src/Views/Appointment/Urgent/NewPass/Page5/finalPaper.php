<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Final Paper</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jsPDF (for PDF generation) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        img {
            max-width: 100%;
            height: auto;
        }

        .summary-box {
            border: 2px solid #005f99;
            border-radius: 10px;
            padding: 25px;
            background-color: #f8f9fa;
        }

        .summary-item {
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #eee;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .important-note {
            border-left: 4px solid #dc3545;
        }

        .qr-code {
            max-width: 150px;
            margin: 20px auto;
            display: block;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../../../../../../Front/header.html' ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Main Summary Card -->
                <div id="summaryBox" class="summary-box">
                    <div class="text-center mb-4">
                        <img src="http://localhost/website/project/et_passport_service_backend/Public/Images/passport-1.webp"
                            alt="logo" style="max-height: 80px;">
                        <h4 class="mt-3">Final Appointment Confirmation Slip</h4>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode('http://localhost/website/project/et_passport_service_backend/'); ?>"
                            alt="QR Code" class="qr-code">
                    </div>

                    <div class="summary-item">
                        <h5>Personal Information</h5>
                        <p><strong>Full Name:</strong> <span id="fullName"></span></p>
                        <p><strong>Phone Number:</strong> <span id="phone"></span></p>
                        <p><strong>Email:</strong> <span id="email"></span></p>
                    </div>

                    <div class="summary-item">
                        <h5> Application Details</h5>
                        <p><strong>Application Number:</strong> <span id="appNo" class="fw-bold text-primary"></span></p>
                        <p><strong>Registration Date:</strong> <span id="regDate"></span></p>
                        <p><strong>Application Type:</strong> <span id="apptType"></span></p>
                        <p><strong>Category:</strong> <span id="category"></span></p>
                        <p><strong>Processing Time:</strong> <span id="urgencyType"></span></p>

                    </div>

                    <div class="summary-item">
                        <h5>Location Information</h5>
                        <p><strong>Processing Office:</strong> <span id="processingOffice"></span></p>
                        <p><strong>Delivery Location:</strong> <span id="deliveryLocation"></span></p>
                    </div>

                    <div class="summary-item">
                        <h5>Timeline</h5>
                        <p><strong>Estimated Delivery Date:</strong> <span id="deliveryDate" class="fw-bold"></span></p>
                    </div>

                    <div class="summary-item">
                        <h5> Payment Information</h5>
                        <p><strong>Payment Method:</strong> <span id="paymentMethod" class="fw-bold"></span></p>

                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-dark me-2" onclick="downloadPDF()">
                        <i class="bi bi-download me-2"></i>Download as PDF
                    </button>

                </div>
            </div>

            <!-- Important Note -->
            <div class="col-md-8 alert alert-danger mt-5 important-note" role="alert">
                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i>Important Notice</h5>
                <ul class="mb-0">
                    <li>Please complete your payment within <strong>1 hour</strong> to secure your application</li>
                    <li>You will receive SMS/email confirmation within 2 hours after payment</li>
                    <li>Contact <a href="mailto:support@ethiopianpassportservices.gov.et">support@ethiopianpassportservices.gov.et</a> or call <strong>8133</strong> for assistance</li>
                    <li>Only official payment methods are accepted - no direct transfers</li>
                    <li>Bring this confirmation and original documents to your appointment</li>
                </ul>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Get payment method from session storage
        const paymentMethod = sessionStorage.getItem('selectedPaymentMethod') || 'Not specified';
        const {
            jsPDF
        } = window.jspdf;

        document.addEventListener('DOMContentLoaded', function() {
            loadApplicationData();

        });

        async function loadApplicationData() {
            try {
                const response = await axios.get(
                    'http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', {
                        withCredentials: true
                    }
                );

                if (response.data.success) {
                    displayApplicationData(response.data.data);
                } else {
                    showError("No application data found. Please start a new application.");
                }
            } catch (error) {
                console.error("Error loading application:", error);
                showError("Failed to load application data. Please try again later.");
            }
        }

        function displayApplicationData(data) {
            // Format dates
            const formatDate = (dateString) => {
                if (!dateString) return 'N/A';
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                return new Date(dateString).toLocaleDateString('en-US', options);
            };

            // Personal Information
            document.getElementById("fullName").textContent =
                `${data.personalInfo.firstname} ${data.personalInfo.middlename} ${data.personalInfo.lastname}`;
            document.getElementById("phone").textContent = data.personalInfo.phone || 'N/A';
            document.getElementById("email").textContent = data.personalInfo.email || 'N/A';

            // Application Details
            document.getElementById("appNo").textContent = data.Registered.applicationNumber;
            document.getElementById("regDate").textContent = data.Registered.registrationDate;
            document.getElementById("apptType").textContent = data.type ? data.type.charAt(0).toUpperCase() + data.type.slice(1) : 'N/A';
            document.getElementById("category").textContent = data.category || 'N/A';
            document.getElementById("urgencyType").textContent = data.urgency === '2days' ? '2 Working Days' : '5 Working Days';


            // Location Information
            document.getElementById("processingOffice").textContent = data.siteData?.office || 'N/A';
            document.getElementById("deliveryLocation").textContent = data.siteData?.delivery || 'N/A';

            // Timeline
            document.getElementById("deliveryDate").textContent = formatDate(data.deliveryDate);

            // Payment Information
            document.getElementById("paymentMethod").textContent = paymentMethod;
        }

        function downloadPDF() {
            const doc = new jsPDF({
                orientation: "portrait",
                unit: "mm",
                format: "a4"
            });

            doc.html(document.getElementById("summaryBox"), {
                callback: function(pdf) {
                    pdf.save("Ethiopian_Passport_Application.pdf");
                    clearSessionData();
                },
                x: 10,
                y: 10,
                width: 190,
                windowWidth: 800
            });
        }



        async function clearSessionData() {
            try {
                sessionStorage.removeItem('selectedPaymentMethod');
                await axios.get(
                    "http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/destroysession.php", {
                        params: {
                            destroySession: true
                        },
                        withCredentials: true
                    }
                );
                console.log("Session data cleared");
            } catch (error) {
                console.error("Error clearing session:", error);
            }
        }

        function showError(message) {
            const summaryBox = document.getElementById("summaryBox");
            summaryBox.innerHTML = `
                <div class="alert alert-danger text-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    ${message}
                </div>`;
        }
    </script>
</body>

</html>