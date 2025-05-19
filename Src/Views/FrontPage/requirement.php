<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirement</title>
</head>

<body>
    <?php include __DIR__ . '/../../../Front/Header.html'; ?>

    <main class="main-content py-4">
        <div class="container">
            <div class="row">
                <!-- Regular Passport Services -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h2 class="h5 mb-0">Regular Passport Services</h2>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="regularPassportAccordion">
                                <!-- New Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingNew1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNew1" aria-expanded="false" aria-controls="collapseNew1">
                                            New Passport
                                        </button>
                                    </h3>
                                    <div id="collapseNew1" class="accordion-collapse collapse" aria-labelledby="headingNew1" data-bs-parent="#regularPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Valid Kebele ID, Authenticated Birth Certificate</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 5000 Birr</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-primary w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expired Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingExpired1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExpired1" aria-expanded="false" aria-controls="collapseExpired1">
                                            Expired Passport
                                        </button>
                                    </h3>
                                    <div id="collapseExpired1" class="accordion-collapse collapse" aria-labelledby="headingExpired1" data-bs-parent="#regularPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Copy of expired passport information page</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 5000 Birr</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-primary w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Page Run Out -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingRun1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRun1" aria-expanded="false" aria-controls="collapseRun1">
                                            Page Run Out
                                        </button>
                                    </h3>
                                    <div id="collapseRun1" class="accordion-collapse collapse" aria-labelledby="headingRun1" data-bs-parent="#regularPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Copy of passport's information page</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 5000 Birr</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-primary w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Damaged Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingDamaged1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDamaged1" aria-expanded="false" aria-controls="collapseDamaged1">
                                            Damaged Passport
                                        </button>
                                    </h3>
                                    <div id="collapseDamaged1" class="accordion-collapse collapse" aria-labelledby="headingDamaged1" data-bs-parent="#regularPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Copy of damaged passport's information page</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 8000 Birr</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-primary w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lost Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingLost1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLost1" aria-expanded="false" aria-controls="collapseLost1">
                                            Lost Passport
                                        </button>
                                    </h3>
                                    <div id="collapseLost1" class="accordion-collapse collapse" aria-labelledby="headingLost1" data-bs-parent="#regularPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Valid Kebele ID, Police Evidence Letter, Copy of Passport (if available)</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 8000 Birr</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-primary w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Under 18 -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingUnder1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUnder1" aria-expanded="false" aria-controls="collapseUnder1">
                                            For Those Aged Under 18
                                        </button>
                                    </h3>
                                    <div id="collapseUnder1" class="accordion-collapse collapse" aria-labelledby="headingUnder1" data-bs-parent="#regularPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Valid Kebele ID of parent/guardian, Court evidence for guardian (if applicable), Authenticated Birth Certificate of applicant</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 5000 Birr</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-primary w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Urgent Passport Services -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h2 class="h5 mb-0">Urgent Passport Services</h2>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="urgentPassportAccordion">
                                <!-- Urgent New Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingNew2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNew2" aria-expanded="false" aria-controls="collapseNew2">
                                            Urgent New Passport
                                        </button>
                                    </h3>
                                    <div id="collapseNew2" class="accordion-collapse collapse" aria-labelledby="headingNew2" data-bs-parent="#urgentPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Valid Kebele ID, Authenticated Birth Certificate</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 25000 Birr (Two days), 20000 Birr (Five days)</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-danger w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Urgent Expired Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingExpired2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExpired2" aria-expanded="false" aria-controls="collapseExpired2">
                                            Urgent Expired Passport
                                        </button>
                                    </h3>
                                    <div id="collapseExpired2" class="accordion-collapse collapse" aria-labelledby="headingExpired2" data-bs-parent="#urgentPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Copy of expired passport information page</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 25000 Birr (Two days), 20000 Birr (Five days)</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-danger w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Urgent Page Run Out -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingRun2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRun2" aria-expanded="false" aria-controls="collapseRun2">
                                            Urgent Page Run Out
                                        </button>
                                    </h3>
                                    <div id="collapseRun2" class="accordion-collapse collapse" aria-labelledby="headingRun2" data-bs-parent="#urgentPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Copy of passport's information page</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 25000 Birr (Two days), 20000 Birr (Five days)</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-danger w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Urgent Damaged Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingDamaged2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDamaged2" aria-expanded="false" aria-controls="collapseDamaged2">
                                            Urgent Damaged Passport
                                        </button>
                                    </h3>
                                    <div id="collapseDamaged2" class="accordion-collapse collapse" aria-labelledby="headingDamaged2" data-bs-parent="#urgentPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Copy of damaged passport's information page</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 33000 Birr (Two days), 28000 Birr (Five days)</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-danger w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Urgent Lost Passport -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingLost2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLost2" aria-expanded="false" aria-controls="collapseLost2">
                                            Urgent Lost Passport
                                        </button>
                                    </h3>
                                    <div id="collapseLost2" class="accordion-collapse collapse" aria-labelledby="headingLost2" data-bs-parent="#urgentPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Valid Kebele ID, Police Evidence Letter, Copy of Passport (if available)</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 33000 Birr (Two days), 28000 Birr (Five days)</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-danger w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Under 18 (Urgent) -->
                                <div class="accordion-item mb-2 border-0 shadow-sm">
                                    <h3 class="accordion-header" id="headingUnder2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUnder2" aria-expanded="false" aria-controls="collapseUnder2">
                                            For Those Aged Under 18 (Urgent)
                                        </button>
                                    </h3>
                                    <div id="collapseUnder2" class="accordion-collapse collapse" aria-labelledby="headingUnder2" data-bs-parent="#urgentPassportAccordion">
                                        <div class="accordion-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item"><strong>Documents:</strong> Valid Kebele ID of parent/guardian, Court evidence for guardian (if applicable), Authenticated Birth Certificate of applicant</li>
                                                <li class="list-group-item"><strong>Service Fee:</strong> 25000 Birr (Two days), 20000 Birr (Five days)</li>
                                                <li class="list-group-item"><strong>Payment:</strong> Online or through bank</li>
                                            </ul>
                                            <a href="#" class="btn btn-danger w-100">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?php include __DIR__ . '/../../../Front/footer.html' ?>
</body>

</html>