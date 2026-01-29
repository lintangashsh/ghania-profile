<?php
session_start();
require '../../config/database.php';

// Cek Login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

// Cek ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 1. Ambil info gambar dulu sebelum dihapus
    $stmt = $conn->prepare("SELECT thumbnail FROM services WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // 2. Hapus Data dari Database
    $stmt_del = $conn->prepare("DELETE FROM services WHERE id = ?");
    $stmt_del->bind_param("i", $id);

    if ($stmt_del->execute()) {
        // 3. Jika Sukses Hapus DB, Hapus File Gambarnya Juga (Clean Up)
        if ($data && !empty($data['thumbnail'])) {
            $file_path = "../../" . $data['thumbnail'];
            if (file_exists($file_path)) {
                unlink($file_path); // Delete file fisik
            }
        }

        header("Location: index.php?msg=deleted");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: index.php");
}