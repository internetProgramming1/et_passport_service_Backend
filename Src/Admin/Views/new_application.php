<?php include ROOT_PATH . '/FrontEnd/Head_Foot/header.html'; ?>

<main>
    <h1>New Passport Applications</h1>

    <?php if (!empty($applications)): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Applicant Name</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $app): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($app['id']); ?></td>
                        <td><?php echo htmlspecialchars($app['applicant_name']); ?></td>
                        <td><?php echo htmlspecialchars($app['date_submitted']); ?></td>
                        <td><?php echo htmlspecialchars($app['status']); ?></td>
                        <td><a href="/admin/view-application?id=<?php echo urlencode($app['id']); ?>">View</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No new applications found.</p>
    <?php endif; ?>
</main>

<?php include ROOT_PATH . '/FrontEnd/Head_Foot/footer.html'; ?>
