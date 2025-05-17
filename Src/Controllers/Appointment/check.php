 <?php
    session_start();
    // require_once __DIR__ . '/../../Models/saveToDbU.php';
    // $saved = false;

    // switch ($_SESSION['category']) {
    //     case 'new':
    //         $saved = saveUrgentNewApplication($_SESSION);
    //         break;
    //     case 'lost':
    //         $saved = saveUrgentLostApplication($_SESSION);
    //         break;
    //     case 'renewal':
    //         $saved = saveUrgentRenewalApplication($_SESSION);
    //         break;
    //     case 'correction':
    //         $saved = saveUrgentCorrectionApplication($_SESSION);
    //         break;
    // }


    require_once __DIR__ . '/../../Models/saveToDbS.php';
    $saved = false;
    switch ($_SESSION['category']) {
        case 'new':
            $saved = saveNewApplication($_SESSION);
            break;
        case 'lost':
            $saved = saveLostApplication($_SESSION);
            break;
        case 'renewal':
            $saved = saveRenewalApplication($_SESSION);
            break;
        case 'correction':
            $saved = saveCorrectionApplication($_SESSION);
            break;
    }
    if ($saved == false) {
        $response = [
            'success' => false,
            'message' => 'Registration Failed',
        ];
        echo "can;t saved ";
    } else {
        $response = [
            'success' => true,
            'message' => 'Registered successfully',
            'data' => $_SESSION['Registered']
        ];
        echo "saved successfully <br>";
    }
    // require 'FileUpload.php';
    // $allSaved = true;
    // foreach ($_SESSION['attachmentsSaving'] as $key => $fileData) {
    //     $tmp = $fileData['tmp_name'];
    //     $finalName = $fileData['name'];
    //     if (!fileSaving($tmp, $finalName)) {
    //         $allSaved = false;
    //         break;
    //     }
    // }

    // if ($allSaved) {
    //     echo "saved";
    // } else {
    //     $value = isset($allSaved);
    //     echo "can;t <br>";
    //     echo $value . " value";
    //     echo "<br>Can't saved to the file.";
    // }

    echo "saved perfectly";
