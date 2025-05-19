<?php include __DIR__ . '/../../../front/header.html'; ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    <h1 class="display-4 mb-4" style="color: #005f99;">Welcome to the Passport Service</h1>
                    <p class="lead mb-5">Please choose your login type:</p>

                    <div class="d-flex flex-column flex-md-row justify-content-center gap-4">
                        <a href="admin/login" class="btn btn-primary btn-lg px-4 py-3">
                            <i class="fas fa-user-shield me-2"></i> Admin Login
                        </a>
                        <a href="customer/login" class="btn btn-success btn-lg px-4 py-3">
                            <i class="fas fa-user-tie me-2"></i> Application Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../../../front/footer.html'; ?>