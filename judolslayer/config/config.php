<?php
// Konfigurasi Database
$host = 'localhost';
$dbname = 'judolslayer';
$username = 'root';
$password = '';

// Koneksi MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Base URL (ganti sesuai domain hosting kamu)
$base_url = "http://localhost/judolslayer/";

// Konfigurasi sistem umum
$site_name = "JudolSlayer";
$site_slogan = "Bersihkan Channel dari Komentar Judi Online";
