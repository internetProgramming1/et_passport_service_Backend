<?php include ROOT_PATH . '/FrontEnd/Head_Foot/header.html'; ?>

<main>
    <h1>View Application Details</h1>

    <?php if (!empty($application)): ?>
        <ul>
            <li><strong>Application ID:</strong> <?php echo htmlspecialchars($application['id']); ?></li>
            <li><strong>Applicant Name:</strong> <?php echo htmlspecialchars($application['applicant_name']); ?></li>
            <li><strong>Application Type:</strong> <?php echo htmlspecialchars($application['type']); ?></li>
            <li><strong>Status:</strong> <?php echo htmlspecialchars($application['status']); ?></li>
            <li><strong>Date Submitted:</strong> <?php echo htmlspecialchars($application['date_submitted']); ?></li>
            <li><strong>Additional Info:</strong> <?php echo nl2br(htmlspecialchars($application['additional_info'] ?? 'N/A')); ?></li>
        </ul>
    <?php else: ?>
        <p>Application not found.</p>
    <?php endif; ?>

    <p><a href="/admin/dashboard">Back to Dashboard</a></p>
</main>

<?php include ROOT_PATH . '/FrontEnd/Head_Foot/footer.html'; ?>
