<?php
require_once '../config/config.php';
require_once '../config/google_client.php';

session_start();

// Jika sudah login, langsung arahkan ke dashboard
if (isset($_SESSION['user_email'])) {
    header('Location: ../user/dashboard.php');
    exit();
}

// Buat URL login Google
$login_url = $googleClient->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - <?= $site_name ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login ke <?= $site_name ?></h2>
        <p>Masuk untuk membersihkan komentar spam di channel YouTube Anda.</p>
        <a href="<?= htmlspecialchars($login_url) ?>" class="btn-login-google">
            <img src="../assets/images/google-icon.png" alt="Google"> Login dengan Google
        </a>
    </div>
</body>
</html>
