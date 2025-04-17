<?php
require_once '../config/config.php';
require_once '../config/google_client.php';
session_start();

if (isset($_GET['code'])) {
    // Ambil token dari Google
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    
    if (!isset($token["error"])) {
        // Set token ke objek client
        $googleClient->setAccessToken($token['access_token']);

        // Ambil info user dari Google
        $google_oauth = new Google_Service_Oauth2($googleClient);
        $google_account_info = $google_oauth->userinfo->get();

        $email = $conn->real_escape_string($google_account_info->email);
        $name = $conn->real_escape_string($google_account_info->name);
        $google_id = $conn->real_escape_string($google_account_info->id);

        // Cek apakah user sudah ada di database
        $check = $conn->query("SELECT * FROM users WHERE email='$email'");
        if ($check->num_rows == 0) {
            // Tambahkan user baru
            $conn->query("INSERT INTO users (google_id, name, email, created_at) 
                          VALUES ('$google_id', '$name', '$email', NOW())");
        }

        // Ambil info user yang login (baru atau lama)
        $getUser = $conn->query("SELECT * FROM users WHERE email='$email'")->fetch_assoc();

        // Simpan sesi login
        $_SESSION['user_id'] = $getUser['id'];
        $_SESSION['user_name'] = $getUser['name'];
        $_SESSION['user_email'] = $getUser['email'];

        // Redirect ke dashboard
        header('Location: ../user/dashboard.php');
        exit;
    }
}

// Jika gagal login
header('Location: login.php?error=gagal_login');
exit;
