<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .navbar {
            border-bottom: 2px solid #005f99;
        }

        .navbar-brand img {
            height: 80px;
            /* Increased logo size */
        }

        .login-form {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #005f99;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #004873;
        }

        .error {
            color: red;
        }

        h2 {
            color: #005f99;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4">
        <a class="navbar-brand" href="/">
            <img src="/Images/passport-1.webp" alt="logo">
        </a>
        <div class="ms-auto">
            <a href="/" class="btn btn-outline-primary">← Back to Home</a>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="login-form shadow">
        <h2 class="text-center mb-4">Admin Login</h2>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="/project/et_passport_service_Backend/Public/admin/login">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>