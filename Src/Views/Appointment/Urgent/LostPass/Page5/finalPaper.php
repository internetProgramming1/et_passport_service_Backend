<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Final Paper</title>

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
    </style>
</head>

<body>
    <?php include __DIR__ . '/../../../../../../Front/header.html' ?>


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Main Summary Card -->
                <div id="summaryBox" class="border p-4" style="font-family: sans-serif; font-size: 16px;">
                    <div class="text-center mb-3">
                        <img src="http://localhost/website/project/et_passport_service_backend/FrontEnd/Images/passport-1.webp"
                            alt="logo" style="max-height: 80px;">
                    </div>
                    <h4 class="text-center mb-4">Final Appointment Confirmation Slip</h4>

                    <p><strong>Full Name:</strong> <span id="fullName"></span></p>
                    <p><strong>Phone Number:</strong> <span id="phone"></span></p>
                    <p><strong>Registration Number:</strong> <span id="regNo"></span></p>
                    <p><strong>Registration Date:</strong> <span id="regDate"></span></p>
                    <p><strong>Appointment Type:</strong> <span id="apptType"></span></p>
                    <p><strong>Category:</strong> <span id="category"></span></p>
                    <p><strong>Delivery Date:</strong> <span id="deliveryDate"></span></p>
                    <p><strong>Form Page Number:</strong> <span id="pageNo"></span></p>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-dark" onclick="downloadPDF()">Download as PDF</button>
                </div>
            </div>
            <!-- Important Note -->
            <div class=" col-md-8 alert alert-danger mt-5" role="alert">
                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i>Important Notice</h5>
                Please ensure that you make the exact payment within <strong>1 hour</strong>
                after making the request order.
                If you do not get any SMS or email confirmation in 2 hours after making the payment, please contact us
                by this email address:
                <a
                    href="mailto:support@ethiopianpassportservices.gov.et">support@ethiopianpassportservices.gov.et</a><br>
                Phone Number: <strong>8133</strong><br>
                Only payment through payment order is acceptable (direct depositing and transferring a payment to the
                account is not acceptable).
            </div>

        </div>
    </div>

    <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>

    <!-- Axios   -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        window.onload = function() {
            axios.get('http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php', {
                    withCredentials: true
                })
                .then(res => {
                    if (res.data.success) {
                        fillSummary(res.data.data);
                    } else {
                        document.getElementById("summaryBox").innerHTML = "<p>No data found.</p>";
                    }
                })
                .catch(error => {
                    document.getElementById("summaryBox").innerHTML = "<p>Error loading data.</p>";
                    console.error(error);
                });
        };

        function fillSummary(data) {
            const fullName = `${data.personalInfo.firstname} ${data.personalInfo.middlename} ${data.personalInfo.lastname}`;
            const regNo = data.Registered.appNo;
            const regDate = data.Registered.regDate;

            document.getElementById("fullName").textContent = fullName;
            document.getElementById("phone").textContent = data.personalInfo.phone;
            document.getElementById("regNo").textContent = regNo;
            document.getElementById("regDate").textContent = regDate;
            document.getElementById("apptType").textContent = data.type;
            document.getElementById("category").textContent = data.category;
            document.getElementById("deliveryDate").textContent = data.deliveryDate;
            document.getElementById("pageNo").textContent = data.pageNo;
        }

        function downloadPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF({
                orientation: "portrait",
                unit: "mm",
                format: "a4" // ensures 210mm x 297mm (standard PDF size)
            });
            const content = document.getElementById("summaryBox");
            doc.html(content, {
                callback: function(pdf) {
                    pdf.save("FinalPaper.pdf");

                    // After saving, destroy session
                    axios.get("http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/destroysession.php", {
                            params: {
                                destroySession: true
                            },
                            withCredentials: true
                        })
                        .then(() => console.log("Session destroyed"));
                    setTimeout(() => {
                        window.location.href = "#";
                    }, 1000);

                },
                x: 10,
                y: 10,
                width: 200,
                windowWidth: 800 // matches your actual screen width
            });
        }
    </script>
</body>

</html>