<?php

function fileProcessing($file)
{
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $maxSize = 1 * 1024 * 1024; // 1MB

    if ($file['size'] > $maxSize) {
        echo "File size exceeds the limit.";
        exit;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mimeType, $allowedTypes)) {
        echo "Potentially dangerous file detected.";
        exit;
    }

    $finalName = uniqid() . '_' . basename($file['name']);
    $uploadDir = realpath(__DIR__ . '/../../../Public/uploads');

    if (!$uploadDir) {
        echo "Upload directory not found.";
        exit;
    }

    $uploadFile = $uploadDir . DIRECTORY_SEPARATOR . $finalName;

    // ✅ Move the file immediately
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        return $finalName;
    } else {
        echo "❌ Failed to move uploaded file: " . $file['tmp_name'];
        exit;
    }
}

function fileSaving($tmpfile, $finalName)
{
    $uploadDir =  realpath(__DIR__ . '/../../../Public/uploads/');
    // echo $uploadDir;
    $uploadFile = $uploadDir . DIRECTORY_SEPARATOR . $finalName;
    return move_uploaded_file($tmpfile, $uploadFile);
}
