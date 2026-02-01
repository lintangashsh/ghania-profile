<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ghania_profile";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Database Gagal: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");