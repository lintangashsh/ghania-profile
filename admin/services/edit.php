<?php
session_start();
require '../../config/database.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$page_title = "Edit Layanan";
$error = '';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];

// Ambil Data
$stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    header("Location: index.php");
    exit();
}

// --- CLEANING FUNCTION ---
function clean_and_fix_content($text)
{
    if (empty($text)) return '';
    $text = stripslashes($text);
    // Hapus 'rn' hanya jika dia kata sendiri atau nempel aneh, bukan bagian kata
    $text = str_replace(array('\\r\\n', '\\n', '\\r'), "\n", $text);
    $text = preg_replace('/\brn\b/', '', $text);
    return htmlspecialchars($text);
}

// --- UPDATE DATA ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title_id = $_POST['title_id'];
    $title_en = $_POST['title_en'];
    $brief_id = $_POST['brief_id'];
    $brief_en = $_POST['brief_en'];
    $content_id = $_POST['content_id'];
    $content_en = $_POST['content_en'];

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title_en)));
    $thumbnail = $data['thumbnail'];

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../../assets/uploads/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);

        $file_ext = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
        $file_name = time() . '_' . uniqid() . '.' . $file_ext;
        $target_file = $target_dir . $file_name;
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($file_ext, $allowed)) {
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                if (!empty($data['thumbnail']) && file_exists("../../" . $data['thumbnail'])) {
                    unlink("../../" . $data['thumbnail']);
                }
                $thumbnail = "assets/uploads/" . $file_name;
            } else {
                $error = "Gagal upload gambar.";
            }
        } else {
            $error = "Format gambar salah.";
        }
    }

    if (empty($error)) {
        $stmt_up = $conn->prepare("UPDATE services SET title_id=?, title_en=?, slug=?, brief_id=?, brief_en=?, content_id=?, content_en=?, thumbnail=? WHERE id=?");
        $stmt_up->bind_param("ssssssssi", $title_id, $title_en, $slug, $brief_id, $brief_en, $content_id, $content_en, $thumbnail, $id);

        if ($stmt_up->execute()) {
            header("Location: edit.php?id=$id&msg=updated&t=" . time());
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
                </svg> Kembali
            </a>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            <?php if (isset($_GET['msg'])): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">Layanan
                berhasil diperbarui!</div>
            <?php endif; ?>
            <?php if ($error): ?><div
                class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
                        <h3 class="font-bold text-gray-700 mb-4 border-b pb-2 flex items-center"><span
                                class="mr-2">🇮🇩</span> Konten Bahasa Indonesia</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Judul (ID)</label>
                            <input type="text" name="title_id" value="<?= htmlspecialchars($data['title_id']) ?>"
                                required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-200 outline-none">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Brief Singkat (ID)</label>
                            <textarea name="brief_id" rows="3" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-200 outline-none"><?= htmlspecialchars($data['brief_id']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Konten Lengkap (ID)</label>
                            <textarea name="content_id"
                                class="tinymce-editor"><?= clean_and_fix_content($data['content_id']) ?></textarea>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                        <h3 class="font-bold text-gray-700 mb-4 border-b pb-2 flex items-center"><span
                                class="mr-2">🇬🇧</span> Content in English (UK)</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Title (EN)</label>
                            <input type="text" name="title_en" value="<?= htmlspecialchars($data['title_en']) ?>"
                                required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200 outline-none">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Short Brief (EN)</label>
                            <textarea name="brief_en" rows="3" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200 outline-none"><?= htmlspecialchars($data['brief_en']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Full Content (EN)</label>
                            <textarea name="content_en"
                                class="tinymce-editor"><?= clean_and_fix_content($data['content_en']) ?></textarea>
                        </div>
                    </div>

                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm sticky top-24">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Thumbnail Layanan</label>
                        <?php if (!empty($data['thumbnail'])): ?>
                        <div class="mb-4">
                            <img src="../../<?= $data['thumbnail'] ?>?v=<?= time() ?>"
                                class="w-full rounded shadow-sm mb-2 object-cover">
                            <p class="text-xs text-gray-400">Gambar saat ini</p>
                        </div>
                        <?php endif; ?>

                        <div class="flex items-center justify-center w-full mb-4">
                            <label for="dropzone-file" id="dropzone-label"
                                class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition relative overflow-hidden">
                                <div id="dropzone-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-bold">Ganti gambar</span>
                                    </p>
                                </div>
                                <img id="image-preview" src="#"
                                    class="absolute inset-0 w-full h-full object-contain bg-white hidden p-2">
                                <input id="dropzone-file" name="thumbnail" type="file" class="hidden"
                                    accept="image/*" />
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition shadow-lg transform hover:-translate-y-1 flex justify-center items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>

            </form>
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '.tinymce-editor',
    height: 500,
    menubar: false,
    plugins: 'advlist autolink lists link charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime table code help wordcount',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat | code',
    content_style: 'body { font-family:Poppins,sans-serif; font-size:14px; color:#333; line-height:1.6; } p { margin-bottom: 1em; }',
    forced_root_block: 'p'
});

const dropzoneFile = document.getElementById('dropzone-file');
const dropzoneContent = document.getElementById('dropzone-content');
const imagePreview = document.getElementById('image-preview');

dropzoneFile.addEventListener('change', function(e) {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
            dropzoneContent.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
});
</script>
</body>

</html>