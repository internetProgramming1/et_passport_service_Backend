<?php
require 'formHandler.php'; // Include your form handling code


echo json_encode([
    'success' => true,
    'data' => $_SESSION
]);
