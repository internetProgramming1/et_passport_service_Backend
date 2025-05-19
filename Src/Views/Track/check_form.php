<!DOCTYPE html>
<html lang="en">

<head>
    <title>Check Passport Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Load header -->

    <?php include __DIR__ . '/../../../Front/Header.html'; ?>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-4">Check Your Application Status</h4>
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST" action="/status/result">
                    <div class="mb-3">
                        <label for="application_no" class="form-label">Application Number</label>
                        <input type="text" name="application_no" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Check Status</button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>

    <?php include __DIR__ . '/../../../Front/footer.html'; ?>
</body>

</html>