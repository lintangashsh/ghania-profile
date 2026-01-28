<?php
session_start();
// 1. Cek Login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

require '../config/database.php';

// 2. QUERY HITUNG TOTAL DATA (REAL TIME)
// Hitung Artikel
$sql_art = "SELECT COUNT(*) as total FROM articles";
$res_art = $conn->query($sql_art);
$count_art = $res_art->fetch_assoc()['total'];

// Hitung Layanan
$sql_srv = "SELECT COUNT(*) as total FROM services";
$res_srv = $conn->query($sql_srv);
$count_srv = $res_srv->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Ghania</title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        <?php include 'includes/sidebar.php'; ?>

        <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">

            <?php include 'includes/header.php'; ?>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">

                <h1 class="text-2xl font-bold text-ghania-dark mb-6">Overview</h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-ghania-orange">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Artikel</p>
                                <h3 class="text-2xl font-bold text-gray-800"><?= $count_art ?></h3>
                            </div>
                            <div class="bg-orange-100 p-3 rounded-full text-ghania-orange">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-blue-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Layanan Aktif</p>
                                <h3 class="text-2xl font-bold text-gray-800"><?= $count_srv ?></h3>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full text-blue-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Selamat Bekerja!</h3>
                    <p class="text-gray-600">Gunakan sidebar di sebelah kiri untuk mengelola konten website Anda.</p>
                </div>

            </main>
        </div>
    </div>

</body>

</html>