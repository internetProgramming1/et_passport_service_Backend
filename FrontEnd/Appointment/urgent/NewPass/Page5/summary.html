<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Application Summary</title>
    <script src=""></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <!-- Placeholder for Header -->
    <div id="header-placeholder"></div>

    <div class="container py-5">
        <h2 class="mb-5 text-center">Review and Confirm Your Application</h2>

        <!-- <div id="errorCont"></div> -->

        <div id="summaryContainer" class="row g-4">
            <!-- Loading indicator -->
            <div class="col-12 text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p>Loading your application data...</p>
            </div>
        </div>
        <br>
        <hr>
        <P class="mt-4 "><b>Please make sure these details exactly match the identity document.</b></P>
        <label for="Check">
            <input required type="checkbox" name="Check" id="Check"> Confirm Applicant Details.
        </label>
        <div class="text-center mt-4">
            <button class="btn btn-success btn-lg" onclick="confirmSubmission()">Confirm & Submit</button>
        </div>
    </div>
    <!-- Placeholder for Footer -->
    <div id="footer-placeholder"></div>

    <!-- Script to include header and footer -->
    <script src="../../../../Head_Foot/script.js">
    </script>

    <!-- Bootstrap Bundle JS (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Axios   -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>

        const RegDate = () => {
            let date = new Date();
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();

            // Combine into a string
            let formattedDate = `${day}/${month}/${year}`;
            return formattedDate;
        }
        const appNo = () => {
            let appno = "PNA"
            for (let i = 0; i < 10; i++) {
                rand = Math.random() * 10;
                round = Math.round(rand);
                appno = appno + round;
            }
            return appno;
        }
    </script>

    <script>
        // Load summary data on page load
        window.onload = function () {
            axios.get('http://localhost/website/project/et_passport_service_backend/BackEnd/Appointment/formHandlerurgent.php', { withCredentials: true })
                .then(res => {
                    if (res.data.success) {
                        displaySummary(res.data.data);
                    } else {
                        showError("No data found in session.");
                    }
                })
                .catch(err => {
                    console.error(err);
                    showError("Error loading session data.");
                });
        };

        function displaySummary(data) {
            const container = document.getElementById("summaryContainer");
            container.innerHTML = ""; // Clear loading spinner

            // 1. Type & Category Section
            container.appendChild(createCard("Appointment Type", {
                "Type": data.type,
                "Category": data.category,
                "Urgency Type": data.urgency,
                "Delivery Date": data.deliveryDate
            }));

            // 2. Site Data Section
            container.appendChild(createCard("Site Information", {
                "Site": data.siteData.site,
                "City": data.siteData.city,
                "Office": data.siteData.office,
                "Delivery Location": data.siteData.delivery
            }));



            // 3. Personal Info with Full Name
            const fullName = `${data.personalInfo.firstname} ${data.personalInfo.middlename} ${data.personalInfo.lastname}`;
            container.appendChild(createCard("Personal Information", {
                "Full Name": fullName,
                "Phone": data.personalInfo.phone,
                "Email": data.personalInfo.email,
                "Gender": data.personalInfo.gender,
                "Date of Birth": data.personalInfo.dob,
                "Under 18 Status": data.personalInfo.under18,
                "Birthplace": data.personalInfo.birthplace,
                "Adoption Status": data.personalInfo.adopted,
                "Birth Certificate No": data.personalInfo.birth_certificate,
                "Nationality": data.personalInfo.nationality,
                "Marital Status": data.personalInfo.marital_status,
                "Occupation": data.personalInfo.occupation
            }));

            // 4. Address Information
            container.appendChild(createCard("Address Information", {
                "Region": data.addressData.region,
                "City": data.addressData.city,
                "Subcity": data.addressData.subcity,
                "Woreda": data.addressData.woreda,
                "Kebele": data.addressData.kebele,
                "House No": data.addressData.house_no,
                "ID No": data.addressData.id_no
            }));

            // 5. Family Info
            container.appendChild(createCard("Mother's Information", {
                "First Name": data.family.mother.first_name,
                "Father Name": data.family.mother.father_name,
                "Grandfather Name": data.family.mother.grandfather_name
            }));

            container.appendChild(createCard("Father's Information", {
                "First Name": data.family.father.first_name,
                "Father Name": data.family.father.father_name,
                "Grandfather Name": data.family.father.grandfather_name
            }));

            container.appendChild(createCard("Spouse's Information", {
                "First Name": data.family.spouse.first_name || "N/A",
                "Father Name": data.family.spouse.father_name || "N/A",
                "Grandfather Name": data.family.spouse.grandfather_name || "N/A"
            }));

            // 6. Attachments
            container.appendChild(createCard("Uploaded Attachments", {
                "Birth Certificate Front": data.attachments.birth_cer_front,
                "Birth Certificate Back": data.attachments.birth_cer_back,
                "ID Front": data.attachments.id_front,
                "ID Back": data.attachments.id_back
            }));

            // 7. Page Number
            container.appendChild(createCard("Page Info", {
                "Passport Page Number": data.pageNo
            }));
        }

        // Reusable card creator function
        function createCard(title, fields) {
            const card = document.createElement("div");
            card.className = "col-lg-4";

            let content = `<div class="card">
                    <div class="card-header" style="background-color:#005f99; color: white;">
                        <h5 class="mb-0">${title}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">`;

            for (const key in fields) {
                content += `<li class="list-group-item"><strong>${key}:</strong> ${fields[key]}</li>`;
            }

            content += `</ul>
                </div>
            </div>`;

            card.innerHTML = content;
            return card;
        }


        function showError(message) {
            const container = document.getElementById("summaryContainer");
            container.innerHTML = `<div class="alert alert-danger text-center">${message}</div>`;
        }

        function confirmSubmission() {
            const checkbox = document.getElementById("Check");
            if (!checkbox.checked) {
                alert("⚠️ Please confirm your application details by checking the box.");
                return;
            }
            try {
                axios.post('http://localhost/website/project/et_passport_service_backend/BackEnd/Appointment/formHandlerurgent.php', {
                    regDate: RegDate(),
                    appNo: appNo()
                }, {
                    withCredentials: true,
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                alert("✅ Your application was submitted successfully!");
                window.location.href = 'payment.html';
            } catch (err) {
                alert("there is error")
                alert("❌ Submission failed: " + res.data.message);
            }

        }
    </script>



</body>

</html>