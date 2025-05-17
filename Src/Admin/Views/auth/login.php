<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<body>

    <!-- Shared Header -->
    <div id="header-placeholder"></div>

    <!-- Admin Login Form -->
    <main>
        <h2>Admin Login</h2>

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="post" action="/admin/login">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>

            <button type="submit">Login</button>
        </form>
    </main>

    <!-- Shared Footer -->
    <div id="footer-placeholder"></div>

    <!-- Header/Footer Script -->
    <script src="/FrontEnd/Head_Foot/script.js"></script>
</body>
</html>
