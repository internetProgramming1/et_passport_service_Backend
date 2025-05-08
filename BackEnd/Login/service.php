<?php
session_start();
$host = 'localhost';
$db = 'passport_system';
$user = 'root';
$pass = '';
$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

function register($pdo, $email, $password) {
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    return $stmt->execute([$email, password_hash($password, PASSWORD_BCRYPT)]);
}

function login($pdo, $email, $password) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];
        return true;
    }
    return false;
}

function submitApplication($pdo, $userId, $name, $dob, $address, $passportType) {
    $stmt = $pdo->prepare("INSERT INTO applications (user_id, name, dob, address, passport_type, status) VALUES (?, ?, ?, ?, ?, 'Pending')");
    return $stmt->execute([$userId, $name, $dob, $address, $passportType]);
}

function getApplications($pdo, $admin = false, $userId = null) {
    if ($admin) {
        $stmt = $pdo->query("SELECT * FROM applications");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM applications WHERE user_id = ?");
        $stmt->execute([$userId]);
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function reviewApplication($pdo, $appId, $status) {
    $stmt = $pdo->prepare("UPDATE applications SET status = ? WHERE id = ?");
    return $stmt->execute([$status, $appId]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'register':
                register($pdo, $_POST['email'], $_POST['password']);
                header('Location: login.php');
                break;
            case 'login':
                if (login($pdo, $_POST['email'], $_POST['password'])) {
                    header('Location: dashboard.php');
                } else {
                    echo "Login failed";
                }
                break;
            case 'submit_application':
                submitApplication($pdo, $_SESSION['user_id'], $_POST['name'], $_POST['dob'], $_POST['address'], $_POST['passport_type']);
                header('Location: dashboard.php');
                break;
            case 'review_application':
                if ($_SESSION['is_admin']) {
                    reviewApplication($pdo, $_POST['app_id'], $_POST['status']);
                }
                header('Location: admin.php');
                break;
        }
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
}
?>
