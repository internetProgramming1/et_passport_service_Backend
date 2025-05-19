<!DOCTYPE html>
<html lang="en">

<head>
    <title>Status Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 80px;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .logo-img {
            height: 60px;
            object-fit: contain;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light bg-white ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/Images/passport-1.webp" alt="Logo" class="logo-img">
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-3"><a href="/home" class="btn btn-outline-primary">← Back to Home</a></li>

            </ul>

        </div>
    </header>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-4">Application Status Result</h4>
                <?php if ($result): ?>
                    <p><strong>Application Found In:</strong> <?= ucwords(str_replace('_', ' ', $result['table'])) ?></p>
                    <p><strong>Status:</strong>
                        <span class="badge bg-outline-primary text-dark"><?= strtoupper($result['status']) ?></span>
                    </p>
                    <p><strong>Submitted At:</strong> <?= $result['created_at'] ?></p>
                <?php else: ?>
                    <div class="alert alert-warning">No application found with that number.</div>
                <?php endif; ?>
                <a href="/status/check" class="btn btn-secondary mt-3">Check Another</a>
            </div>
        </div>
    </div>

    <br><br><br>

    <?php include __DIR__ . '/../../../Front/footer.html'; ?>
</body>

</html>