<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Choose Passport Request Type </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /*for the main of the body*/
        .maincont {
            width: 80%;
            margin: 30px auto;
            padding: 35px;
            border-radius: 20px;
        }

        .maincont p {
            margin: 20px;
            display: flex;
            /* Enables Flexbox */
            align-items: center;
            /* Aligns the text and image vertically */
            gap: 10px;
        }

        .maincont h1 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 40px;
            font-size: 35px;
        }

        .main3 h4 {
            text-align: center;
        }

        .main3 {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10%;
            margin: 50px 0 100px;
        }

        .main3 a {
            color: #eaf4f9;
            text-decoration: none;
        }

        .main3 section {
            width: 35%;
            height: 150px;
            background-color: #005f99;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            color: white;
            cursor: pointer;
        }

        .button {
            margin: 10px;
            height: 38px;
            width: 100px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Load header -->

    <?php include __DIR__ . '/../../../Front/Header.html'; ?>

    <!-- Main content -->

    <main>
        <div class="maincont">
            <h1 class="text-center mb-5">Request Passport Appointment</h1>
            <div class="row main2">
                <section class="col-md-6">
                    <p><i class="fas fa-check"></i>
                        Passport application shall be applied only by Ethiopian nationals.</p>
                    <p><i class="fas fa-check"></i>
                        New applicants who are unable to attend on the appointment date will apply again.</p>
                    <p><i class="fas fa-check"></i>
                        Using more than one passport is strictly prohibited.</p>
                    <p><i class="fas fa-check"></i>
                        An applicant should not apply for a new passport if they already have one.</p>
                    <p><i class="fas fa-check"></i>
                        When ICS needs the applicant for a further inquiry like for a photo change or any other cases, the applicant
                        should be aware and respond accordingly. If the applicant does not respond on time, ICS is not responsible
                        for delays in urgent passport service.</p>
                    <p><i class="fas fa-check"></i>
                        New passport applicants may be asked to bring additional documents when needed, and they should also be
                        willing to cooperate.</p>
                </section>
                <section class="col-md-6">
                    <p><i class="fas fa-check"></i>
                        Urgent passport application shall only be applied to Addis Ababa, Main ICS Office.</p>
                    <p><i class="fas fa-check"></i>
                        Urgent passport applicants shall accept the responsibility for supplying, checking, and verifying the
                        information's accuracy and correctness. Incorrect or inaccurate information may result in delays in urgent
                        passport service.</p>
                    <p><i class="fas fa-check"></i>
                        New passport applicants shall bring a valid Kebele identity card and authenticated birth certificate at the
                        date of appointment.</p>
                    <p><i class="fas fa-check"></i>
                        Application fees are non-refundable.</p>
                    <p><i class="fas fa-check"></i>
                        Bring your original documents including your passport during collection.</p>
                    <p><i class="fas fa-check"></i>
                        When picking up their passport, applicants must bring both the printout paper and their passport for
                        renewal.</p>
                </section>
            </div>
        </div>
        <div class="container mt-1">
            <form id="myForm" method="post">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox" required>
                    <label class="form-check-label" for="checkbox">I agree to terms and conditions</label>
                </div>

                <div id="alertContainer"></div>


                <div class="main3">
                    <section>
                        <h4>Appointment Schedule</h4>
                        <button class="button" id="normbtn" type="button" value="normal"
                            onclick="checkAgreement('normal/page1.php',this)">Start</button>
                    </section>

                    <section>
                        <h4>Urgent Appointment</h4>
                        <button class="button" type="button" value="urgent" id="urgentbtn"
                            onclick="checkAgreement('urgent/page1.php',this)">Start</button>
                    </section>

                </div>
            </form>
        </div>

    </main>

    <?php include __DIR__ . '/../../../Front/footer.html' ?>


    <!-- Axios   -->

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function checkAgreement(redirectUrl, buttonElement) {
            $('#alertContainer').empty();

            if (!$('#checkbox').is(':checked')) {
                $('<div>')
                    .addClass('alert alert-danger mt-3')
                    .attr('role', 'alert')
                    .text('You must agree to the terms and conditions!')
                    .appendTo('#alertContainer');
                $('#checkbox').focus();
                return;
            }

            const value = $(buttonElement).val();
            let url;

            if (value === "urgent") {
                url = 'http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formControllerUrgent.php';
            } else {
                url = 'http://localhost/Website/Project/et_passport_service_Backend/src/Controllers/Appointment/formController.php';
            }

            axios.post(url, {
                    type: value
                }, {
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    withCredentials: true
                })
                .then((response) => {
                    console.log('Data sent successfully:', response.data);
                    window.location.href = redirectUrl;
                })
                .catch((error) => {
                    $('<div>')
                        .addClass('alert alert-danger mt-3')
                        .attr('role', 'alert')
                        .text('Failed to send data: ' + error.message)
                        .appendTo('#alertContainer');
                });
        }
    </script>

</body>

</html>