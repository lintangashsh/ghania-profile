<?php
session_start();
require '../../config/database.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$error = '';
$success = '';

// Logic Simpan Data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title_id = $_POST['title_id'];
    $content_id = $_POST['content_id'];
    $title_en = $_POST['title_en'];
    $content_en = $_POST['content_en'];

    // Slug otomatis dari Judul ID
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title_id)));

    $meta_desc = $_POST['meta_description'];
    $meta_keys = $_POST['meta_keywords'];
    $author_id = $_SESSION['admin_id'];

    // Logic Upload Gambar
    $thumbnail = '';
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === 0) {
        $target_dir = "../../assets/uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $file_name;

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array(strtolower($file_extension), $allowed)) {
            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_file)) {
                $thumbnail = "assets/uploads/" . $file_name;
            } else {
                $error = "Gagal upload gambar.";
            }
        } else {
            $error = "Format gambar harus JPG, PNG, atau WEBP.";
        }
    } else {
        $error = "Wajib upload thumbnail artikel!";
    }

    // Insert Database
    if (empty($error)) {
        $stmt = $conn->prepare("INSERT INTO articles (title_id, title_en, slug, content_id, content_en, thumbnail, meta_description, meta_keywords, author_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssssi", $title_id, $title_en, $slug, $content_id, $content_en, $thumbnail, $meta_desc, $meta_keys, $author_id);

        if ($stmt->execute()) {
            header("Location: index.php?msg=success");
            exit();
        } else {
            $error = "Gagal menyimpan ke database: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel - Admin Ghania</title>
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
                    <h1 class="text-2xl font-bold text-ghania-dark">Tulis Artikel Baru</h1>
                </div>

                <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 space-y-6">

                        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
                            <h3 class="font-bold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <span class="mr-2">🇮🇩</span> Konten Bahasa Indonesia
                            </h3>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Judul (ID)</label>
                                <input type="text" name="title_id" required
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-200 outline-none"
                                    placeholder="Judul artikel dalam Bahasa Indonesia">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Konten (ID)</label>
                                <textarea name="content_id" class="tinymce-editor"></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                            <h3 class="font-bold text-gray-700 mb-4 border-b pb-2 flex items-center">
                                <span class="mr-2">🇬🇧</span> Content in English (British)
                            </h3>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Title (EN)</label>
                                <input type="text" name="title_en" required
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200 outline-none"
                                    placeholder="Article title in English">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Content (EN)</label>
                                <textarea name="content_en" class="tinymce-editor"></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-gray-500">
                            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Pengaturan SEO
                            </h3>
                            <div class="mb-4">
                                <label class="block text-sm font-bold text-gray-700 mb-1">Meta Description</label>
                                <textarea name="meta_description" rows="2" maxlength="160"
                                    class="w-full px-4 py-2 border rounded-lg text-sm"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Keywords</label>
                                <input type="text" name="meta_keywords"
                                    class="w-full px-4 py-2 border rounded-lg text-sm"
                                    placeholder="Contoh: digital agency, web design medan">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-xl shadow-sm sticky top-24">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Thumbnail Gambar</label>
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:bg-gray-50 transition relative">
                                <input type="file" name="thumbnail" accept="image/*" required
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    onchange="previewImage(this)">
                                <div id="preview-container" class="hidden">
                                    <img id="img-preview" src="#" class="mx-auto max-h-48 rounded shadow-sm">
                                    <p class="text-xs text-gray-400 mt-2">Klik untuk ganti gambar</p>
                                </div>
                                <div id="upload-placeholder">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-1 text-sm text-gray-600">Upload file</p>
                                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, WEBP</p>
                                    <p class="mt-2 text-xs text-ghania-orange font-bold">Rekomendasi: 16:9 Landscape</p>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-ghania-orange text-white font-bold py-3 mt-6 rounded-lg hover:bg-orange-600 transition shadow-lg">
                                🚀 Terbitkan Artikel!
                            </button>
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
                uploadPlaceholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>