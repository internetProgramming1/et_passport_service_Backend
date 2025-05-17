<?php
include __DIR__ . '/../../../../FrontEnd/Head_Foot/header.html';
?>

<main>
    <h1>Login</h1>

    <form action="/admin/login" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="login_as">Login as:</label>
        <select id="login_as" name="login_as" required>
            <option value="">Select user type</option>
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
        </select>

        <button type="submit">Login</button>
    </form>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</main>

<?php
include __DIR__ . '/../../../../FrontEnd/Head_Foot/footer.html';
?>
