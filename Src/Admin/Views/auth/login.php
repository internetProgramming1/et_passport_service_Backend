<?php include ROOT_PATH . '/FrontEnd/Head_Foot/header.html'; ?>

<main>
    <h1>Admin Login</h1>
    <form action="/admin/login" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</main>

<?php include ROOT_PATH . '/FrontEnd/Head_Foot/footer.html'; ?>
