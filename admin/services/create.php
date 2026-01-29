<?php
session_start();
require '../../config/database.php';

// Cek Login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$page_title = "Tambah Layanan Baru";
$error = '';

// --- PROSES SIMPAN DATA ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title_id = $conn->real_escape_string($_POST['title_id']);
    $title_en = $conn->real_escape_string($_POST['title_en']);
    $brief_id = $conn->real_escape_string($_POST['brief_id']);
    $brief_en = $conn->real_escape_string($_POST['brief_en']);
    $content_id = $conn->real_escape_string($_POST['content_id']);
    $content_en = $conn->real_escape_string($_POST['content_en']);

    // Auto Generate Slug
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title_en)));

    // --- HANDLE UPLOAD GAMBAR ---
    $thumbnail = '';

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../../assets/uploads/";

        // Safety check folder
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Rename file agar aman
        $file_ext = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
        $file_name = time() . '_' . uniqid() . '.' . $file_ext;
        $target_file = $target_dir . $file_name;

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($file_ext, $allowed)) {
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $thumbnail = "assets/uploads/" . $file_name;
            } else {
                $error = "Gagal mengupload gambar. Pastikan folder assets/uploads ada.";
            }
        } else {
            $error = "Format gambar harus JPG, PNG, atau WEBP.";
        }
    }

    if (empty($error)) {
        $stmt = $conn->prepare("INSERT INTO services (title_id, title_en, slug, brief_id, brief_en, content_id, content_en, thumbnail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $title_id, $title_en, $slug, $brief_id, $brief_en, $content_id, $content_en, $thumbnail);

        if ($stmt->execute()) {
            header("Location: index.php?msg=added");
            exit();
        } else {
            $error = "Database Error: " . $conn->error;
        }
    }
}

include '../../admin/includes/header.php';
?>

<div class="flex h-screen overflow-hidden">
    <?php include '../../admin/includes/sidebar.php'; ?>

    <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">

        <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center z-10">
            <h2 class="text-xl font-bold text-gray-800">Tambah Layanan</h2>
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

                <form method="POST" enctype="multipart/form-data" id="serviceForm">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-4 bg-orange-50 p-4 rounded-lg border border-orange-100">
                            <h3 class="font-bold text-ghania-orange border-b border-orange-200 pb-2 flex items-center">
                                <img src="https://flagcdn.com/20x15/id.png" class="mr-2 shadow-sm"> Bahasa Indonesia
                            </h3>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Judul Layanan (ID)</label>
                                <input type="text" name="title_id" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-ghania-orange transition bg-white"
                                    placeholder="Contoh: Pembuatan Website">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat
                                    (Brief)</label>
                                <textarea name="brief_id" rows="3" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-ghania-orange transition bg-white"
                                    placeholder="Teks pendek untuk halaman depan..."></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Konten Lengkap</label>
                                <textarea name="content_id" rows="8" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-ghania-orange transition bg-white"
                                    placeholder="Penjelasan detail layanan secara lengkap..."></textarea>
                            </div>
                        </div>

                        <div class="space-y-4 bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <h3 class="font-bold text-blue-700 border-b border-blue-200 pb-2 flex items-center">
                                <img src="https://flagcdn.com/20x15/gb.png" class="mr-2 shadow-sm"> English (UK)
                            </h3>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Service Title (EN)</label>
                                <input type="text" name="title_en" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500 transition bg-white"
                                    placeholder="Ex: Website Development">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Short Brief</label>
                                <textarea name="brief_en" rows="3" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500 transition bg-white"
                                    placeholder="Short text for homepage..."></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Full Content</label>
                                <textarea name="content_en" rows="8" required
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500 transition bg-white"
                                    placeholder="Detailed service explanation..."></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6 border-gray-200">

                    <div class="mb-8">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnail Layanan (Opsional)</label>

                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" id="dropzone-label"
                                class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition relative overflow-hidden">

                                <div id="dropzone-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-bold">Klik untuk
                                            upload</span> atau drag gambar</p>
                                    <p class="text-xs text-gray-500">JPG, PNG, WEBP (Max 2MB)</p>
                                </div>

                                <img id="image-preview" src="#" alt="Preview"
                                    class="absolute inset-0 w-full h-full object-contain bg-white hidden p-2">

                                <input id="dropzone-file" name="thumbnail" type="file" class="hidden"
                                    accept="image/*" />
                            </label>
                        </div>
                        <p id="file-name" class="text-sm text-center mt-2 text-ghania-orange font-semibold h-5"></p>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-ghania-orange text-white font-bold py-3 px-8 rounded-lg hover:bg-orange-600 transition shadow-lg transform hover:-translate-y-1 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Simpan Layanan
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>
</div>

<script>
const dropzoneFile = document.getElementById('dropzone-file');
const dropzoneContent = document.getElementById('dropzone-content');
const imagePreview = document.getElementById('image-preview');
const fileNameDisplay = document.getElementById('file-name');
const dropzoneLabel = document.getElementById('dropzone-label');

// 1. Saat User Memilih File (Klik)
dropzoneFile.addEventListener('change', function(e) {
    const file = this.files[0];
    handleFile(file);
});

// 2. Fitur Drag & Drop
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropzoneLabel.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

// Efek visual saat drag
['dragenter', 'dragover'].forEach(eventName => {
    dropzoneLabel.addEventListener(eventName, () => dropzoneLabel.classList.add('bg-orange-50',
        'border-ghania-orange'));
});

['dragleave', 'drop'].forEach(eventName => {
    dropzoneLabel.addEventListener(eventName, () => dropzoneLabel.classList.remove('bg-orange-50',
        'border-ghania-orange'));
});

// Saat file dijatuhkan (Drop)
dropzoneLabel.addEventListener('drop', function(e) {
    const dt = e.dataTransfer;
    const file = dt.files[0];

    // Masukkan file ke input secara manual
    dropzoneFile.files = dt.files;
    handleFile(file);
});

// Fungsi Utama Handle Preview
function handleFile(file) {
    if (file) {
        // Cek Ukuran (Limit 2MB via JS biar user tau duluan)
        if (file.size > 2 * 1024 * 1024) {
            alert("File terlalu besar! Maksimal 2MB. File Mas: " + (file.size / 1024 / 1024).toFixed(2) + " MB");
            dropzoneFile.value = ""; // Reset
            return;
        }

        // Tampilkan Nama File
        fileNameDisplay.textContent = "File terpilih: " + file.name;

        // Tampilkan Preview Gambar
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
            dropzoneContent.classList.add('hidden'); // Sembunyikan icon upload
        }
        reader.readAsDataURL(file);
    }
}
</script>

</body>

</html>