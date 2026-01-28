<?php
// Konfigurasi Database Laragon Default
$host = "localhost";
$user = "root";     // Default user Laragon
$pass = "";         // Default password Laragon (kosong)
$db   = "ghania_profile"; // Pastikan database ini sudah dibuat di HeidiSQL

// Buat Koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek Koneksi (DevOps Mindset: Fail Fast)
if ($conn->connect_error) {
    // Di Production, jangan echo error asli ke user, tapi log ke file.
    // Untuk Development, kita tampilkan biar gampang debug.
    die("Koneksi Database Gagal: " . $conn->connect_error);
}

// Set Charset UTF-8 agar support emoji dan simbol khusus
$conn->set_charset("utf8mb4");
