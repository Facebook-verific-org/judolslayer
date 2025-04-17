<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Library Google API Client

$googleClient = new Google_Client();
$googleClient->setClientId('YOUR_CLIENT_ID_HERE');
$googleClient->setClientSecret('YOUR_CLIENT_SECRET_HERE');
$googleClient->setRedirectUri($base_url . 'auth/callback.php');
$googleClient->addScope("email");
$googleClient->addScope("profile");
$googleClient->addScope("https://www.googleapis.com/auth/youtube.force-ssl");

// Jika perlu simpan token untuk reuse
$googleClient->setAccessType("offline");
$googleClient->setPrompt("consent");

