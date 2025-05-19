<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            background-color: #f5f5f5;
            font-family: "Noto Serif", serif;
        }

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

</body>

</html>