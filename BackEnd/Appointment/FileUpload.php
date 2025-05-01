<?php

/**
 * Handles file validation and uploading
 * @param array $files $_FILES array
 * @param string $uploadDir Directory to store files (must be writable)
 * @return array [success, message, filePaths]
 */
function validateAndUploadFiles(array $files, string $uploadDir = 'uploads/')
{
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $maxSize = 1 * 1024 * 1024; // 1MB
    $errors = [];
    $uploadedFiles = [];


    foreach ($files as $fieldName => $file) {
        // Skip if no file uploaded for this field
        if ($file['error'] === UPLOAD_ERR_NO_FILE) continue;

        // Validate
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Upload error for {$fieldName} (Code: {$file['error']})";
            continue;
        }

        if (!in_array($file['type'], $allowedTypes)) {
            $errors[] = "Invalid type for {$fieldName}. Only JPG/PNG/PDF allowed.";
            continue;
        }

        if ($file['size'] > $maxSize) {
            $errors[] = "File too large for {$fieldName} (Max 1MB)";
            continue;
        }

        // Generate safe filename
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFilename = uniqid("{$fieldName}_", true) . '.' . $fileExt;
        $destination = rtrim($uploadDir, '/') . '/' . $newFilename;

        // Move file
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $uploadedFiles[$fieldName] = [
                'original_name' => $file['name'],
                'stored_path' => $destination,
                'mime_type' => $file['type']
            ];
        } else {
            $errors[] = "Failed to save {$fieldName}";
        }
    }

    return [
        'success' => empty($errors),
        'message' => $errors ? implode("\n", $errors) : "Files uploaded successfully",
        'filePaths' => $uploadedFiles
    ];
}
