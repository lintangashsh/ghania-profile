<?php
session_start();
require '../../config/database.php';

// Cek Login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$error = '';
$success = '';

// Cek ID Artikel
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];

// Ambil Data Lama
$stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

if (!$article) {
    echo "Artikel tidak ditemukan!";
    exit();
}

// Logic Update Data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap Input (Tanpa real_escape_string manual, biar bind_param yang kerja)
    $title_id = $_POST['title_id'];
    $content_id = $_POST['content_id'];
    $title_en = $_POST['title_en'];
    $content_en = $_POST['content_en'];

    // Update Slug jika judul ID berubah
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title_id)));

    $meta_desc = $_POST['meta_description'];
    $meta_keys = $_POST['meta_keywords'];

    // Logic Gambar
    $thumbnail = $article['thumbnail']; // Default: pakai gambar lama

    // Jika user upload gambar baru
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === 0) {
        $target_dir = "../../assets/uploads/";
        $ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
        $new_name = uniqid() . '.' . $ext;
        $target_file = $target_dir . $new_name;

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array(strtolower($ext), $allowed)) {
            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_file)) {
                // Hapus gambar lama jika ada dan lokal
                if (!empty($article['thumbnail']) && file_exists("../../" . $article['thumbnail']) && !filter_var($article['thumbnail'], FILTER_VALIDATE_URL)) {
                    unlink("../../" . $article['thumbnail']);
                }
                // Set gambar baru
                $thumbnail = "assets/uploads/" . $new_name;
            } else {
                $error = "Gagal upload gambar baru.";
            }
        } else {
            $error = "Format gambar harus JPG, PNG, atau WEBP.";
        }
    }

    if (empty($error)) {
        // Query Update
        $update_sql = "UPDATE articles SET title_id=?, title_en=?, slug=?, content_id=?, content_en=?, thumbnail=?, meta_description=?, meta_keywords=? WHERE id=?";
        $stmt_up = $conn->prepare($update_sql);
        // ssssssssi (8 string, 1 int)
        $stmt_up->bind_param("ssssssssi", $title_id, $title_en, $slug, $content_id, $content_en, $thumbnail, $meta_desc, $meta_keys, $id);

        if ($stmt_up->execute()) {
            // Refresh data setelah update biar form terisi data baru
            header("Location: index.php?msg=updated"); // Redirect ke index biar aman
            exit();
        } else {
            $error = "Gagal update database: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel - Admin Ghania</title>
    <link rel="icon" type="image/png" href="/assets/img/ghania-3d.png">
    <link href="../../assets/css/style.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '.tinymce-editor',
        height: 500,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
        toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | removeformat | help',
        content_style: "@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap'); body { font-family: 'Poppins', sans-serif; font-size: 14px; color: #333; line-height: 1.6; } ul { list-style-type: disc; padding-left: 20px; } ol { list-style-type: decimal; padding-left: 20px; }",

        paste_as_text: true
    });
    </script>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        <?php include '../includes/sidebar.php'; ?>

        <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">
            <?php include '../includes/header.php'; ?>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">

                <div class="flex items-center mb-6">
                    <a href="index.php" class="mr-4 text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <h1 class="text-2xl font-bold text-ghania-dark">Edit Artikel</h1>
                </div>

                <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">

                        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
                            <h3 class="font-bold text-gray-700 mb-4">🇮🇩 Bahasa Indonesia</h3>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Judul (ID)</label>
                                <input type="text" name="title_id" required
                                    value="<?= htmlspecialchars($article['title_id'] ?? '') ?>"
                                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-red-200">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Konten (ID)</label>
                                <textarea name="content_id"
                                    class="tinymce-editor"><?= htmlspecialchars($article['content_id'] ?? '') ?></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                            <h3 class="font-bold text-gray-700 mb-4">🇬🇧 English (British)</h3>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Title (EN)</label>
                                <input type="text" name="title_en" required
                                    value="<?= htmlspecialchars($article['title_en'] ?? '') ?>"
                                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-200">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Content (EN)</label>
                                <textarea name="content_en"
                                    class="tinymce-editor"><?= htmlspecialchars($article['content_en'] ?? '') ?></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-gray-500">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Pengaturan SEO</h3>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-1">Meta Description</label>
                                <textarea name="meta_description" rows="2" maxlength="160"
                                    class="w-full px-4 py-2 border rounded-lg text-sm"><?= htmlspecialchars($article['meta_description'] ?? '') ?></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Keywords</label>
                                <input type="text" name="meta_keywords"
                                    value="<?= htmlspecialchars($article['meta_keywords'] ?? '') ?>"
                                    class="w-full px-4 py-2 border rounded-lg text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-xl shadow-sm sticky top-24">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Thumbnail Gambar</label>

                            <div class="mb-4">
                                <?php
                                $thumb_src = filter_var($article['thumbnail'], FILTER_VALIDATE_URL) ? $article['thumbnail'] : "../../" . $article['thumbnail'];
                                ?>
                                <img src="<?= $thumb_src ?>" class="w-full rounded shadow-sm mb-2">
                                <p class="text-xs text-gray-400">Gambar saat ini</p>
                            </div>

                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:bg-gray-50 transition relative">
                                <input type="file" name="thumbnail" accept="image/*"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    onchange="previewImage(this)">
                                <div id="preview-container" class="hidden">
                                    <img id="img-preview" src="#" class="mx-auto max-h-48 rounded shadow-sm">
                                </div>
                                <div id="upload-placeholder">
                                    <p class="mt-1 text-sm text-gray-600">Ganti Gambar</p>
                                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah
                                        gambar.</p>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-ghania-orange text-white font-bold py-3 mt-6 rounded-lg hover:bg-orange-600 transition shadow-lg">
                                💾 Simpan Perubahan
                            </button>

                            <a href="index.php"
                                class="block text-center mt-4 text-gray-500 hover:text-gray-700 text-sm">Batal</a>
                        </div>
                    </div>

                </form>

            </main>
        </div>
    </div>

    <script>
    function previewImage(input) {
        const previewContainer = document.getElementById('preview-container');
        const uploadPlaceholder = document.getElementById('upload-placeholder');
        const imgPreview = document.getElementById('img-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                uploadPlaceholder.innerHTML =
                    '<p class="mt-2 text-xs text-green-600 font-bold">Gambar baru dipilih</p>';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>