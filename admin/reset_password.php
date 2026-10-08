<?php
/**
 * @var Database $db
 */
session_start();
require '../config/database.php';

$error = '';
$success = '';
$token = $_GET['token'] ?? '';
$user = null;

if (empty($token)) {
    header("Location: login.php");
    exit();
}

$user = $db->table('users')
           ->select('id, reset_token_expires_at')
           ->where('reset_token', $token)
           ->first();

if (!$user || strtotime($user['reset_token_expires_at']) < time()) {
    $error = "Tautan reset password tidak valid atau sudah kedaluwarsa.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$error) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Konfirmasi password tidak cocok.";
    } elseif (strlen($password) < 6) {
        $error = "Password minimal 6 karakter.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        
        $db->table('users')->where('id', $user['id'])->update([
            'password' => $hashed,
            'reset_token' => null,
            'reset_token_expires_at' => null
        ]);
        
        $success = "Password berhasil diperbarui. Silakan login dengan password baru Anda.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Ghania Creative</title>
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/ghania-3d.png">
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
</head>
<body class="relative h-screen flex items-center justify-center font-sans antialiased">
    <div class="fixed inset-0 w-full h-full z-[-1]">
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="<?= BASE_URL ?>assets/img/admin_index.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
    </div>

    <div class="bg-gray-900/90 backdrop-blur-md p-8 rounded-xl shadow-2xl w-full max-w-md border-t-4 border-ghania-orange border border-gray-800 z-10 mx-4">
        <div class="text-center mb-8">
            <img src="<?= BASE_URL ?>assets/img/logo-ghania.png" class="h-20 w-auto mx-auto mb-4 filter brightness-0 invert" alt="Ghania Creative">
            <h2 class="text-2xl font-bold text-white">Reset Password</h2>
            <p class="text-gray-400 text-sm">Masukkan password baru Anda</p>
        </div>

        <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm text-center shadow-sm">
            <?= $error ?>
        </div>
        <div class="text-center mt-4">
            <a href="login.php" class="text-gray-400 hover:text-white text-sm transition">Kembali ke halaman Login</a>
        </div>
        <?php elseif ($success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm text-center shadow-sm">
            <?= $success ?>
        </div>
        <div class="text-center mt-4">
            <a href="login.php" class="inline-block bg-ghania-orange text-white font-bold py-2 px-6 rounded-lg hover:bg-orange-600 transition duration-300">
                Menuju Halaman Login
            </a>
        </div>
        <?php else: ?>
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2">Password Baru</label>
                <div class="relative">
                    <input type="password" name="password" id="passwordInput1" required placeholder="••••••"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-ghania-orange focus:border-transparent transition duration-200 pr-10 placeholder-gray-500">
                    <button type="button" onclick="togglePassword('passwordInput1', 'eyeOpen1', 'eyeClosed1')"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white focus:outline-none">
                        <svg id="eyeOpen1" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eyeClosed1" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-bold mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" name="confirm_password" id="passwordInput2" required placeholder="••••••"
                        class="w-full px-4 py-2 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-ghania-orange focus:border-transparent transition duration-200 pr-10 placeholder-gray-500">
                    <button type="button" onclick="togglePassword('passwordInput2', 'eyeOpen2', 'eyeClosed2')"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white focus:outline-none">
                        <svg id="eyeOpen2" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eyeClosed2" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-ghania-orange text-white font-bold py-3 px-4 rounded-lg hover:bg-orange-600 transition duration-300 shadow-md transform hover:-translate-y-1">
                Simpan Password
            </button>
        </form>
        <?php endif; ?>

        <div class="mt-8 text-center text-xs text-gray-500 border-t border-gray-800 pt-4">
            &copy; <?= date('Y') ?> Ghania Creative System. All rights reserved.
        </div>
    </div>

    <script>
    function togglePassword(inputId, eyeOpenId, eyeClosedId) {
        const passwordInput = document.getElementById(inputId);
        const eyeOpen = document.getElementById(eyeOpenId);
        const eyeClosed = document.getElementById(eyeClosedId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        } else {
            passwordInput.type = 'password';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        }
    }
    </script>
</body>
</html>
