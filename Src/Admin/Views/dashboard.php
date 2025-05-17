<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(__DIR__ . '/../../../')); 
    // Adjust the number of ../ depending on your views folder depth
}
?>

<?php include ROOT_PATH . '/FrontEnd/Head_Foot/header.html'; ?>

<main>
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?>!</p>

    <ul>
        <li><a href="/admin/new-applications">New Applications</a></li>
        <li><a href="/admin/renewal-applications">Renewal Applications</a></li>
        <li><a href="/admin/lost-applications">Lost Applications</a></li>
        <li><a href="/admin/correction-applications">Correction Applications</a></li>
        <li><a href="/admin/application-status">Check Application Status</a></li>
    </ul>
</main>

<?php include ROOT_PATH . '/FrontEnd/Head_Foot/footer.html'; ?>
