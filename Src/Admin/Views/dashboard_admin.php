<?php
include __DIR__ . '/../../../front/header.html';
?>

<main>
    <h1>Admin Dashboard</h1>
    <a href="/admin/logout">Logout</a>
    <p>Welcome, Admin! Here you can manage applications, users, and settings.</p>

    <button>New App</button>
    <button>Renewal App</button>
    <button>Correction App</button>
    <button>Lost App</button>

    <div class="dashboard-container">
        <h1>Passport Registration Dashboard</h1>

        <div class="filter-buttons">
            <a href="/application/correction" class="btn btn-primary">Correction</a>
            <a href="/application/new" class="btn btn-primary">New</a>
            <a href="/application/lost" class="btn btn-primary">Lost</a>
            <a href="/application/renewal" class="btn btn-primary">Renewal</a>
            <a href="/admin/dashboard" class="btn btn-secondary">Show All</a>
        </div>

        <br>
        <br>
</main>

<?php if (!empty($applications)): ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Status</th>
        </tr>
        <?php foreach ($applications as $app): ?>
            <tr>
                <td><?= htmlspecialchars($app['id']) ?></td>
                <td><?= htmlspecialchars($app['firstname']) ?></td>
                <td><?= htmlspecialchars($app['category']) ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No applications found.</p>
<?php endif; ?>



<hr>
<hr>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .header {
            margin-bottom: 30px;
        }

        .filter-nav {
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 15px;
            margin-right: 10px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
        }

        .btn-new {
            background-color: #28a745;
        }

        .btn-renewal {
            background-color: #17a2b8;
        }

        .btn-lost {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-correction {
            background-color: #6c757d;
        }

        .btn-all {
            background-color: #343a40;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
        }

        .error {
            color: #dc3545;
            padding: 10px;
            background-color: #f8d7da;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Passport Applications Dashboard</h1>
        <p>Welcome, Administrator</p>
    </div>

    <div class="filter-nav">
        <a href="?category=" class="btn btn-all">All Applications</a>
        <a href="?category=new" class="btn btn-new">New Applications</a>
        <a href="?category=renewal" class="btn btn-renewal">Renewals</a>
        <a href="?category=lost" class="btn btn-lost">Lost Passports</a>
        <a href="?category=correction" class="btn btn-correction">Corrections</a>
    </div>

    <?php if (isset($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Applicant Name</th>
                <th>Application Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($applications)): ?>
                <?php foreach ($applications as $app): ?>
                    <tr>
                        <td><?= htmlspecialchars($app['id']) ?></td>
                        <td><?= htmlspecialchars($app['full_name']) ?></td>
                        <td><?= date('M d, Y', strtotime($app['created_at'])) ?></td>
                        <td><?= htmlspecialchars($app['status']) ?></td>
                        <td>
                            <a href="/admin/application/view/<?= $app['id'] ?>?category=<?= $category ?>">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No applications found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>


<?php
include __DIR__ . '/../../../front/footer.html';
?>