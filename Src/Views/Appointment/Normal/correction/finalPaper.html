<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Final Paper</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Header Placeholder -->
    <div id="header-placeholder"></div>

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
                    <p><strong>Appointment Date:</strong> <span id="apptDate"></span></p>
                    <p><strong>Appointment Time:</strong> <span id="apptTime"></span></p>
                    <p><strong>Form Page Number:</strong> <span id="pageNo"></span></p>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-dark" onclick="downloadPDF()">Download as PDF</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Placeholder -->
    <div id="footer-placeholder"></div>

    <!-- Header/Footer Script -->
    <script src="http://localhost/website/project/et_passport_service_backend/FrontEnd/Head_Foot/script.js"></script>

    <script>
        window.onload = function () {
            axios.get('http://localhost/website/project/et_passport_service_backend/BackEnd/Appointment/formHandler.php', {
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
            document.getElementById("apptDate").textContent = data.dateTime.date;
            document.getElementById("apptTime").textContent = data.dateTime.time;
            document.getElementById("pageNo").textContent = data.pageNo;
        }

        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const content = document.getElementById("summaryBox");

            doc.html(content, {
                callback: function (pdf) {
                    pdf.save("FinalPaper.pdf");

                    // After saving, destroy session
                    axios.get("http://localhost/website/project/et_passport_service_backend/BackEnd/destroySession.php")
                        .then(() => console.log("Session destroyed"));
                    setTimeout(() => {
                        window.location.href = "#";
                    }, 1000);

                },
                x: 10,
                y: 10,
                width: 180
            });
        }

    </script>
</body>

</html>