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
    return $finalName;
}
