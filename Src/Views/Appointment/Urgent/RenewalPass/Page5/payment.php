<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .payment-img {
            height: 120px;
            object-fit: contain;
            padding: 10px;
        }

        .payment-option {
            cursor: pointer;
            transition: all 0.2s ease;
            height: 100%;
        }

        .payment-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .payment-option.selected {
            border: 2px solid #005f99 !important;
            background-color: rgba(0, 95, 153, 0.05);
        }

        .payment-method-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #005f99;
            margin-top: 10px;
        }

        .instructions-section {
            position: sticky;
            top: 20px;
        }

        @media (max-width: 768px) {
            .payment-img {
                height: 80px;
            }

            .instructions-section {
                margin-top: 30px;
            }
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../../../../../../Front/header.html' ?>

    <div class="container-fluid my-4 py-2">
        <div class="row">
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
                    <a href="../Page4/personalinfo.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action" style="color: white; background-color: #005f99;">Personal Information</li>
                    </a>
                    <a href="./passportPage.php" class="text-decoration-none">
                        <li class="list-group-item list-group-item-action">Payment</li>
                    </a>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="col-lg-9">
                <!-- Step Navigation -->
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a href="./passportPage.php" class="nav-link" style="color: #005f99;">Passport Page
                            No.</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./summary.php" style="color: #005f99;">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./payment.php" style="background-color:#005f99; color: white;">Payment</a>
                    </li>
                </ul>

                <!-- Form & Notes -->
                <div class="row">
                    <div class="col-md-7">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <h4 class="mb-4">Choose Payment Method</h4>
                                <div id="uploadErrorAlert" class="alert alert-danger d-none mb-3"></div>

                                <form id="paymentForm" method="post">
                                    <div class="row g-3" id="paymentOptions">
                                        <!-- CBE Branch -->
                                        <div class="col-md-6">
                                            <div class="payment-option card p-3 text-center"
                                                data-method="CBE Branch"
                                                role="button"
                                                tabindex="0"
                                                aria-label="Pay at CBE Branch">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7ez1BpY9-aGeuro6XFN-aA-V-htXvXzWtWVhDLBvB2xgCgS9bXm3zZaA7TZ0VAZ1_VkY&usqp=CAU"
                                                    alt="CBE Branch" class="payment-img">
                                                <h5 class="payment-method-title mt-2">CBE Branch</h5>
                                            </div>
                                        </div>

                                        <!-- CBE Mobile Banking -->
                                        <div class="col-md-6">
                                            <div class="payment-option card p-3 text-center"
                                                data-method="CBE Mobile Banking"
                                                role="button"
                                                tabindex="0"
                                                aria-label="Pay with CBE Mobile Banking">
                                                <img src="https://pbs.twimg.com/media/GFfOgOKW8AAS0jN.jpg:large"
                                                    alt="CBE Mobile Banking" class="payment-img">
                                                <h5 class="payment-method-title mt-2">CBE Mobile Banking</h5>
                                            </div>
                                        </div>

                                        <!-- Telebirr -->
                                        <div class="col-md-6">
                                            <div class="payment-option card p-3 text-center"
                                                data-method="Telebirr"
                                                role="button"
                                                tabindex="0"
                                                aria-label="Pay with Telebirr">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnrTKkSVPXsru6PZzp_tJ4_gHRM-HDvWoR1d970LsdV3bKSiUB3dOvD0tfyy8WN9pzwOU&usqp=CAU"
                                                    alt="Telebirr" class="payment-img">
                                                <h5 class="payment-method-title mt-2">Telebirr</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="paymentMethod" id="selectedMethod" required>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-outline-primary ">
                                            Continue to Payment <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="col-md-5">
                        <div class="card shadow-sm instructions-section">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="bi bi-info-circle-fill me-2"></i>Payment Instructions</h5>

                                <div class="accordion" id="instructionsAccordion">
                                    <!-- CBE Branch Instructions -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cbeBranch">
                                                <i class="bi bi-bank me-2"></i> Pay via CBE Branch
                                            </button>
                                        </h2>
                                        <div id="cbeBranch" class="accordion-collapse collapse show" data-bs-parent="#instructionsAccordion">
                                            <div class="accordion-body">
                                                <ul class="mb-3">
                                                    <li>Visit any Commercial Bank of Ethiopia (CBE) branch.</li>
                                                    <li>Inform the cashier you are paying for a specific service (mention the service name).
                                                    </li>
                                                    <li>Provide the following details:
                                                        <ul>
                                                            <li>Application or Reference Number</li>
                                                            <li>Full Name and Phone Number</li>
                                                        </ul>
                                                    </li>
                                                    <li>Pay the required amount in cash or from your account.</li>
                                                    <li>Keep the receipt which contains the Transaction Reference Number.</li>
                                                    <li>This number may be required online to confirm your payment.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Telebirr Instructions -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#telebirr">
                                                <i class="bi bi-phone me-2"></i> Pay via Telebirr
                                            </button>
                                        </h2>
                                        <div id="telebirr" class="accordion-collapse collapse" data-bs-parent="#instructionsAccordion">
                                            <div class="accordion-body">
                                                <ul class="mb-3">
                                                    <li>Open the Telebirr app or dial <strong>*127#</strong>.</li>
                                                    <li>Select "Pay Bills" or "Merchant Payment".</li>
                                                    <li>Choose the correct organization/institution.</li>
                                                    <li>Enter:
                                                        <ul>
                                                            <li>Reference Number (Application Number)</li>
                                                            <li>Amount to pay</li>
                                                        </ul>
                                                    </li>
                                                    <li>Confirm payment with your PIN.</li>
                                                    <li>Save or screenshot the Transaction ID for your records.</li>
                                                    <li>You may also receive an SMS confirmation.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CBE Mobile Instructions -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cbeMobile">
                                                <i class="bi bi-app-indicator me-2"></i> Pay via CBE Mobile Banking
                                            </button>
                                        </h2>
                                        <div id="cbeMobile" class="accordion-collapse collapse" data-bs-parent="#instructionsAccordion">
                                            <div class="accordion-body">
                                                <ul class="mb-3">
                                                    <li>Login to the CBE Mobile App.</li>
                                                    <li>Select "Payment" and choose the appropriate bill or merchant.</li>
                                                    <li>Enter:
                                                        <ul>
                                                            <li>Application or Reference Number</li>
                                                            <li>Amount to pay</li>
                                                        </ul>
                                                    </li>
                                                    <li>Confirm and enter your PIN to complete the payment.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include __DIR__ . '/../../../../../../Front/footer.html' ?>


    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            // Payment method selection
            $('.payment-option').on('click', function() {
                $('.payment-option').removeClass('selected');
                $(this).addClass('selected');
                $('#selectedMethod').val($(this).data('method'));
                $('#uploadErrorAlert').addClass('d-none');
            });

            // Keyboard accessibility
            $('.payment-option').on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    $(this).trigger('click');
                }
            });

            // Form submission
            $('#paymentForm').on('submit', async function(e) {
                e.preventDefault();

                const errorAlert = $('#uploadErrorAlert');
                errorAlert.addClass('d-none').empty();

                const method = $('#selectedMethod').val();
                if (!method) {
                    errorAlert.removeClass('d-none').text('Please select a payment method.');
                    errorAlert.focus();
                    return;
                }

                // Show loading state
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true).html(`
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Processing...
                `);

                try {
                    const response = await axios.post('/path/to/paymentController.php', {
                        paymentMethod: method
                    }, {
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        withCredentials: true
                    });

                    if (response.data.success) {
                        // Redirect to payment gateway or confirmation
                        if (response.data.redirectUrl) {
                            window.location.href = response.data.redirectUrl;
                        } else {
                            window.location.href = 'finalPaper.php';
                        }
                    } else {
                        throw new Error(response.data.message || 'Payment processing failed');
                    }
                } catch (error) {
                    console.error('Payment error:', error);
                    errorAlert.removeClass('d-none').html(`
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        ${error.response?.data?.message || 'An error occurred. Please try again.'}
                    `);

                    // Scroll to error
                    $('html, body').animate({
                        scrollTop: errorAlert.offset().top - 20
                    }, 500);
                } finally {
                    submitBtn.prop('disabled', false).html('Continue to Payment <i class="bi bi-arrow-right ms-2"></i>');
                }
            });
        });
    </script>
</body>

</html>