<?php
session_start();
require '../config/database.php';

// Cek jika user sudah login, langsung lempar ke dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit();
}

$error = '';

// Tangkap pesan Timeout
if (isset($_GET['timeout'])) {
    $error = "Sesi Anda telah habis (30 Menit Inaktif). Silakan login kembali.";
}

// Proses Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query Cari Email
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verifikasi Password (HASH)
    if ($user && password_verify($password, $user['password'])) {

        // --- LOGIN SUKSES ---
        // Security: Ganti ID Session biar fresh (Anti Session Fixation)
        session_regenerate_id(true);

        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_name'] = $user['name'];
        $_SESSION['admin_id'] = $user['id'];

        // SET TIMEOUT
        $_SESSION['last_activity'] = time();

        header("Location: index.php");
        exit();
    } else {
        $error = "Email atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Ghania Creative</title>
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border-t-4 border-ghania-orange">
        <div class="text-center mb-8">
            <img src="/assets/img/logo-ghania.png" class="h-20 w-auto mx-auto mb-4" alt="Ghania Creative">
            <h2 class="text-2xl font-bold text-ghania-dark">Admin Login</h2>
            <p class="text-gray-500 text-sm">Masuk untuk mengelola website.</p>
        </div>

        <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm text-center shadow-sm">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                <input type="email" name="email" required placeholder="admin@ghania.com"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ghania-orange focus:border-transparent transition duration-200">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ghania-orange focus:border-transparent transition duration-200">
            </div>

            <button type="submit"
                class="w-full bg-ghania-orange text-white font-bold py-3 px-4 rounded-lg hover:bg-orange-600 transition duration-300 shadow-md transform hover:-translate-y-1">
                Masuk Dashboard
            </button>
        </form>

        <div class="mt-8 text-center text-xs text-gray-400 border-t border-gray-100 pt-4">
            &copy; <?= date('Y') ?> Ghania Creative System. All rights reserved.
        </div>
    </div>

</body>

</html>