<?php
session_start();
require '../../config/database.php';

// Cek Login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$page_title = "Edit Layanan";
$error = '';

// Cek ID di URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Ambil Data Lama
$stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    header("Location: index.php");
    exit();
}

// --- PROSES UPDATE DATA ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title_id = $conn->real_escape_string($_POST['title_id']);
    $title_en = $conn->real_escape_string($_POST['title_en']);
    $brief_id = $conn->real_escape_string($_POST['brief_id']);
    $brief_en = $conn->real_escape_string($_POST['brief_en']);
    $content_id = $conn->real_escape_string($_POST['content_id']);
    $content_en = $conn->real_escape_string($_POST['content_en']);

    // Update Slug (ikut berubah kalau judul berubah)
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title_en)));

    // --- HANDLE GAMBAR ---
    $thumbnail = $data['thumbnail']; // Default: pakai gambar lama

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../../assets/uploads/";
        $file_name = time() . '_' . basename($_FILES["thumbnail"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($imageFileType, $allowed)) {
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                // HAPUS GAMBAR LAMA (Jika ada & file-nya eksis)
                if (!empty($data['thumbnail']) && file_exists("../../" . $data['thumbnail'])) {
                    unlink("../../" . $data['thumbnail']);
                }
                $thumbnail = "assets/uploads/" . $file_name;
            } else {
                $error = "Gagal upload gambar baru.";
            }
        } else {
            $error = "Format gambar harus JPG, PNG, atau WEBP.";
        }
    }

    if (empty($error)) {
        $stmt_update = $conn->prepare("UPDATE services SET title_id=?, title_en=?, slug=?, brief_id=?, brief_en=?, content_id=?, content_en=?, thumbnail=? WHERE id=?");
        $stmt_update->bind_param("ssssssssi", $title_id, $title_en, $slug, $brief_id, $brief_en, $content_id, $content_en, $thumbnail, $id);

        if ($stmt_update->execute()) {
            header("Location: index.php?msg=updated");
            exit();
        } else {
            $error = "Gagal update: " . $conn->error;
        }
    }
}

include '../../admin/includes/header.php';
?>

<div class="flex h-screen overflow-hidden">
    <?php include '../../admin/includes/sidebar.php'; ?>

    <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">

        <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center z-10">
            <h2 class="text-xl font-bold text-gray-800">Edit Layanan</h2>
            <a href="index.php"
                class="bg-ghania-orange text-white px-5 py-2 rounded-lg hover:bg-orange-600 transition shadow-md flex items-center font-bold text-sm transform hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">

            <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg">

                <?php if ($error): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <?= $error ?>
                </div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-4 bg-orange-50 p-4 rounded-lg border border-orange-100">
                            <h3 class="font-bold text-ghania-orange border-b border-orange-200 pb-2 flex items-center">
                                <img src="https://flagcdn.com/20x15/id.png" class="mr-2 shadow-sm"> Bahasa Indonesia
                            </h3>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Judul (ID)</label>
                                <input type="text" name="title_id" value="<?= htmlspecialchars($data['title_id']) ?>"
                                    required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-ghania-orange">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Brief (ID)</label>
                                <textarea name="brief_id" rows="3" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-ghania-orange"><?= htmlspecialchars($data['brief_id']) ?></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Konten (ID)</label>
                                <textarea name="content_id" rows="8" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-ghania-orange"><?= htmlspecialchars($data['content_id']) ?></textarea>
                            </div>
                        </div>

                        <div class="space-y-4 bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <h3 class="font-bold text-blue-700 border-b border-blue-200 pb-2 flex items-center">
                                <img src="https://flagcdn.com/20x15/gb.png" class="mr-2 shadow-sm"> English (UK)
                            </h3>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Title (EN)</label>
                                <input type="text" name="title_en" value="<?= htmlspecialchars($data['title_en']) ?>"
                                    required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Brief (EN)</label>
                                <textarea name="brief_en" rows="3" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"><?= htmlspecialchars($data['brief_en']) ?></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Content (EN)</label>
                                <textarea name="content_en" rows="8" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"><?= htmlspecialchars($data['content_en']) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6 border-gray-200">

                    <div class="mb-8">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnail Layanan</label>

                        <?php if (!empty($data['thumbnail'])): ?>
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Gambar Saat Ini:</p>
                            <img src="../../<?= $data['thumbnail'] ?>"
                                class="h-32 w-auto rounded-lg shadow-md border p-1">
                        </div>
                        <?php endif; ?>

                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk ganti
                                            gambar</span> (Biarkan kosong jika tidak ingin ubah)</p>
                                    <p class="text-xs text-gray-500">JPG, PNG, WEBP (Max 2MB)</p>
                                </div>
                                <input id="dropzone-file" name="thumbnail" type="file" class="hidden"
                                    accept="image/*" />
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="submit"
                            class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition shadow-lg transform hover:-translate-y-1 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Update Perubahan
                        </button>
                    </div>

                </form>
            </div>

        </main>
    </div>
</div>

</body>

</html>