<?php include __DIR__ . '/../../../FrontEnd/Head_Foot/header.html'; ?>
<main style="text-align:center; margin-top:100px;">
    <h2>Track Your Passport Status</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="/track-status">
        <label for="appointment_id">Enter Appointment ID:</label><br><br>
        <input type="text" name="appointment_id" id="appointment_id" required>
        <br><br>
        <button type="submit">Check Status</button>
    </form>
</main>
<?php include __DIR__ . '/../../../FrontEnd/Head_Foot/footer.html'; ?>
