<?php include __DIR__ . '/../../../FrontEnd/Head_Foot/header.html'; ?>
<main style="text-align:center; margin-top:100px;">
    <h2>Status Result</h2>
    <p><strong>Status:</strong> <?= htmlspecialchars($statusData['status']) ?></p>
    <p><strong>Last Updated:</strong> <?= htmlspecialchars($statusData['updated_at']) ?></p>
    <p><strong>Remarks:</strong> <?= htmlspecialchars($statusData['remarks']) ?></p>
    <br>
    <a href="/track-status">Check Another</a>
</main>
<?php include __DIR__ . '/../../../FrontEnd/Head_Foot/footer.html'; ?>
