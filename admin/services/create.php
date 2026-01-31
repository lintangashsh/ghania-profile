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
    $title_id = $_POST['title_id'];
    $title_en = $_POST['title_en'];
    $brief_id = $_POST['brief_id'];
    $brief_en = $_POST['brief_en'];
    $content_id = $_POST['content_id'];
    $content_en = $_POST['content_en'];

    // Auto Generate Slug
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title_en)));

    // --- HANDLE UPLOAD GAMBAR ---
    $thumbnail = '';

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../../assets/uploads/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);

        $file_ext = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
        $file_name = time() . '_' . uniqid() . '.' . $file_ext;
        $target_file = $target_dir . $file_name;
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($file_ext, $allowed)) {
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $thumbnail = "assets/uploads/" . $file_name;
            } else {
                $error = "Gagal mengupload gambar.";
            }
        } else {
            $error = "Format gambar harus JPG, PNG, atau WEBP.";
        }
    } else {
        $error = "Wajib upload thumbnail layanan!";
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
            <?php if ($error): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm"><?= $error ?>
            </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" id="serviceForm"
                class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
                        <h3 class="font-bold text-gray-700 mb-4 border-b pb-2 flex items-center">
                            <span class="mr-2">🇮🇩</span> Konten Bahasa Indonesia
                        </h3>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Judul (ID)</label>
                            <input type="text" name="title_id" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-200 outline-none"
                                placeholder="Judul Layanan ID">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Brief Singkat (ID)</label>
                            <textarea name="brief_id" rows="3" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-200 outline-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Konten Lengkap (ID)</label>
                            <textarea name="content_id" class="tinymce-editor"></textarea>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                        <h3 class="font-bold text-gray-700 mb-4 border-b pb-2 flex items-center">
                            <span class="mr-2">🇬🇧</span> Content in English (UK)
                        </h3>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Title (EN)</label>
                            <input type="text" name="title_en" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200 outline-none"
                                placeholder="Service Title EN">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Short Brief (EN)</label>
                            <textarea name="brief_en" rows="3" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200 outline-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Full Content (EN)</label>
                            <textarea name="content_en" class="tinymce-editor"></textarea>
                        </div>
                    </div>

                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm sticky top-24">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Thumbnail Layanan</label>

                        <div class="flex items-center justify-center w-full mb-4">
                            <label for="dropzone-file" id="dropzone-label"
                                class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition relative overflow-hidden group">
                                <div id="dropzone-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400 group-hover:text-ghania-orange transition"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-bold">Klik upload</span></p>
                                    <p class="text-xs text-gray-500">JPG, PNG, WEBP</p>
                                </div>
                                <img id="image-preview" src="#"
                                    class="absolute inset-0 w-full h-full object-contain bg-white hidden p-2">
                                <input id="dropzone-file" name="thumbnail" type="file" class="hidden" accept="image/*"
                                    required />
                            </label>
                        </div>
                        <p id="file-name" class="text-sm text-center text-ghania-orange font-semibold h-5 mb-4"></p>

                        <button type="submit"
                            class="w-full bg-ghania-orange text-white font-bold py-3 px-4 rounded-lg hover:bg-orange-600 transition shadow-lg transform hover:-translate-y-1 flex justify-center items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                </path>
                            </svg>
                            Simpan Layanan
                        </button>
                    </div>
                </div>

            </form>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
// TinyMCE Init - Full Width (Sama persis Artikel)
tinymce.init({
    selector: '.tinymce-editor',
    height: 500, // Tinggi disamakan dengan artikel
    menubar: false,
    plugins: 'advlist autolink lists link charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime table code help wordcount',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat | code',
    content_style: 'body { font-family:Poppins,sans-serif; font-size:14px; color:#333; line-height:1.6; } p { margin-bottom: 1em; }',
    forced_root_block: 'p'
});

const dropzoneFile = document.getElementById('dropzone-file');
const dropzoneContent = document.getElementById('dropzone-content');
const imagePreview = document.getElementById('image-preview');
const fileNameDisplay = document.getElementById('file-name');
const dropzoneLabel = document.getElementById('dropzone-label');

function handleFile(file) {
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert("File terlalu besar! Maks 2MB.");
            dropzoneFile.value = "";
            return;
        }
        fileNameDisplay.textContent = "File: " + file.name;
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
            dropzoneContent.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
}

dropzoneFile.addEventListener('change', function(e) {
    handleFile(this.files[0]);
});
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropzoneLabel.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
    }, false);
});
['dragenter', 'dragover'].forEach(eventName => {
    dropzoneLabel.addEventListener(eventName, () => dropzoneLabel.classList.add('bg-orange-50',
        'border-ghania-orange'));
});
['dragleave', 'drop'].forEach(eventName => {
    dropzoneLabel.addEventListener(eventName, () => dropzoneLabel.classList.remove('bg-orange-50',
        'border-ghania-orange'));
});
dropzoneLabel.addEventListener('drop', function(e) {
    const dt = e.dataTransfer;
    handleFile(dt.files[0]);
    dropzoneFile.files = dt.files;
});
</script>
</body>

</html>