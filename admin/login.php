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
            <p class="text-gray-500 text-sm">Masuk untuk mengelola website</p>
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
                <div class="relative">
                    <input type="password" name="password" id="passwordInput" required placeholder="••••••"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-ghania-orange focus:border-transparent transition duration-200 pr-10">

                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">

                        <svg id="eyeOpen" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>

                        <svg id="eyeClosed" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
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

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('passwordInput');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        if (passwordInput.type === 'password') {
            // Ubah jadi lihat password
            passwordInput.type = 'text';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        } else {
            // Ubah jadi hidden password
            passwordInput.type = 'password';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        }
    }
    </script>

</body>

</html>