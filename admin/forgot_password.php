<?php
/**
 * @var Database $db
 */
session_start();
require '../config/database.php';

$error = '';
$success = '';
$dev_link = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    
    $user = $db->table('users')->select('id')->where('email', $email)->first();
    
    if ($user) {
        $token = bin2hex(random_bytes(32));
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $db->table('users')->where('email', $email)->update([
            'reset_token' => $token,
            'reset_token_expires_at' => $expires_at
        ]);
        
        $reset_link = "http://" . $_SERVER['HTTP_HOST'] . BASE_URL . "admin/reset_password.php?token=" . $token;
        
        // In a real application, you would send an email here using mail() or PHPMailer:
        $subject = "Reset Password Admin Ghania";
        $message = "Klik link berikut untuk reset password Anda: $reset_link \nLink ini berlaku selama 1 jam.";
        $headers = "From: noreply@ghania.com";
        // @mail($email, $subject, $message, $headers);
        
        $success = "Tautan reset password telah dikirimkan ke email Anda.";
        // FOR DEVELOPMENT: Show the link directly since local SMTP might not be configured
        $dev_link = $reset_link;
    } else {
        $error = "Email tidak ditemukan dalam sistem.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Ghania Creative</title>
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
            <h2 class="text-2xl font-bold text-white">Lupa Password</h2>
            <p class="text-gray-400 text-sm">Masukkan email untuk mereset password Anda</p>
        </div>

        <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm text-center shadow-sm">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <?php if ($success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm text-center shadow-sm">
            <?= $success ?>
        </div>
        <?php if ($dev_link): ?>
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4 text-sm text-center shadow-sm break-all">
            <strong>Link Reset (Dev Mode):</strong><br>
            <a href="<?= $dev_link ?>" class="underline hover:text-blue-900 text-xs"><?= $dev_link ?></a>
        </div>
        <?php endif; ?>
        <div class="text-center mt-4">
            <a href="login.php" class="text-gray-400 hover:text-white text-sm transition">Kembali ke halaman Login</a>
        </div>
        <?php else: ?>
        <form method="POST">
            <div class="mb-6">
                <label class="block text-gray-300 text-sm font-bold mb-2">Email Address</label>
                <input type="email" name="email" required placeholder="admin@ghania.com"
                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-ghania-orange focus:border-transparent transition duration-200 placeholder-gray-500">
            </div>

            <button type="submit"
                class="w-full bg-ghania-orange text-white font-bold py-3 px-4 rounded-lg hover:bg-orange-600 transition duration-300 shadow-md transform hover:-translate-y-1 mb-4">
                Kirim Link Reset
            </button>
            <div class="text-center">
                <a href="login.php" class="text-gray-400 hover:text-white text-sm transition">Kembali ke halaman Login</a>
            </div>
        </form>
        <?php endif; ?>

        <div class="mt-8 text-center text-xs text-gray-500 border-t border-gray-800 pt-4">
            &copy; <?= date('Y') ?> Ghania Creative System. All rights reserved.
        </div>
    </div>
</body>
</html>
