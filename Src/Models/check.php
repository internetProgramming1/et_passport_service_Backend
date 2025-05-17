<?php

// require __DIR__ . '/../../config/db.php';
// $conn = getDatabaseConnection();

// if ($conn) {
//     echo " connected";
// }

require __DIR__ . '/saveToDbu.php';
saveUrgentRenewalApplication($_SESSION);
echo "saved correctly";
