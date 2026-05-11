<?php
/**
 * @var Database $db
 */
session_start();
// 1. Cek Login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

require '../../config/database.php';

// 2. Logic Hapus Artikel
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus gambar fisik
    $data = $db->table('articles')->select('thumbnail')->where('id', $id)->first();

    if ($data && !filter_var($data['thumbnail'], FILTER_VALIDATE_URL)) {
        $file_path = "../../" . $data['thumbnail'];
        if (file_exists($file_path)) unlink($file_path);
    }

    // Hapus dari DB
    $db->execute("DELETE FROM articles WHERE id = ?", [$id]);
    $success_msg = "Artikel berhasil dihapus!";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Artikel - Admin Ghania</title>
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/ghania-3d.png">
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        <?php include '../includes/sidebar.php'; ?>

        <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">
            <?php include '../includes/header.php'; ?>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-ghania-dark">Daftar Artikel</h1>
                    <a href="create.php"
                        class="bg-ghania-orange text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition shadow-sm flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Artikel
                    </a>
                </div>

                <?php if (isset($success_msg)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?= $success_msg ?></div>
                <?php endif; ?>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-600 uppercase text-xs leading-normal">
                                    <th class="py-3 px-6 text-left">No</th>
                                    <th class="py-3 px-6 text-left">Thumbnail</th>
                                    <th class="py-3 px-6 text-left">Judul (ID / EN)</th>
                                    <th class="py-3 px-6 text-center">Tanggal</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                <?php
                                $articles = $db->table('articles')->orderBy('created_at', 'DESC')->get();
                                $no = 1;

                                if (count($articles) > 0):
                                    foreach ($articles as $row):
                                        $t_id = $row['title_id'] ? $row['title_id'] : '(No Title ID)';
                                        $t_en = $row['title_en'] ? $row['title_en'] : '-';

                                        $thumb = !empty($row['thumbnail']) ? $row['thumbnail'] : 'https://via.placeholder.com/150';
                                        if (!filter_var($thumb, FILTER_VALIDATE_URL)) {
                                            $thumb = "../../" . $thumb;
                                        }
                                ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                                    <td class="py-3 px-6 text-left"><?= $no++ ?></td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="w-16 h-10 overflow-hidden rounded shadow-sm bg-gray-100">
                                            <img src="<?= $thumb ?>" class="w-full h-full object-cover">
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="font-bold text-gray-800"><?= $t_id ?></div>
                                        <div class="text-xs text-gray-400 mt-1">EN: <?= $t_en ?></div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-blue-100 text-blue-600 py-1 px-3 rounded-full text-xs">
                                            <?= date('d M Y', strtotime($row['created_at'])) ?>
                                        </span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center space-x-2">
                                            <a href="edit.php?id=<?= $row['id'] ?>"
                                                class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center hover:bg-yellow-200 transition"
                                                title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="?action=delete&id=<?= $row['id'] ?>"
                                                onclick="return confirm('Hapus artikel ini?')"
                                                class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200 transition"
                                                title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;
                                else: ?>
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-500">Belum ada artikel.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>