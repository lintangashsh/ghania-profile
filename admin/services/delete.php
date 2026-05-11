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
    $data = $db->table('services')->select('thumbnail')->where('id', $id)->first();

    // 2. Hapus Data dari Database
    if ($db->execute("DELETE FROM services WHERE id = ?", [$id])) {
        // 3. Jika Sukses Hapus DB, Hapus File Gambarnya Juga (Clean Up)
        if ($data && !empty($data['thumbnail'])) {
            $file_path = "../../" . $data['thumbnail'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        header("Location: index.php?msg=deleted");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: index.php");
}
