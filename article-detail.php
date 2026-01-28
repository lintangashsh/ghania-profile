<?php
require 'config/database.php';
require 'config/lang.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Ambil Data
$stmt = $conn->prepare("SELECT a.*, u.name as author_name FROM articles a LEFT JOIN users u ON a.author_id = u.id WHERE a.slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$article = $stmt->get_result()->fetch_assoc();

if (!$article) {
    header("Location: index.php");
    exit();
}

// Update Views
$conn->query("UPDATE articles SET views = views + 1 WHERE id = " . $article['id']);

// Logic Bahasa
if ($lang_code == 'en') {
    $raw_title = !empty($article['title_en']) ? $article['title_en'] : $article['title_id'];
    $raw_content = !empty($article['content_en']) ? $article['content_en'] : $article['content_id'];
} else {
    $raw_title = $article['title_id'];
    $raw_content = $article['content_id'];
}

// === FIX CLEANING DATA (Pembersih) ===
// 1. Hapus garis miring ganda (Indonesia\'s -> Indonesia's)
$display_title = stripslashes($raw_title);
$clean_content = stripslashes($raw_content);

// 2. Hapus teks "\r\n" literal yang muncul di layar
// Kita ganti literal "\r\n" menjadi <br> HTML agar turun baris, atau spasi jika di judul
$clean_content = str_replace(array('\r\n', '\r', '\n', '\\r\\n'), '<br>', $clean_content);

// Setup SEO
$page_title = $display_title;
$meta_desc  = $article['meta_description'];
$meta_keys  = $article['meta_keywords'];
$og_image   = 'http://' . $_SERVER['HTTP_HOST'] . '/ghania-profile/' . $article['thumbnail'];

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div id="progress-bar" class="fixed top-0 left-0 h-1 bg-ghania-orange z-[60] w-0 transition-all duration-200"></div>

<div class="relative h-[50vh] md:h-[60vh] w-full overflow-hidden">
    <img src="<?= $article['thumbnail'] ?>" class="w-full h-full object-cover brightness-50">
    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full p-4 md:p-12 text-white container mx-auto">
        <div class="max-w-4xl mx-auto">
            <span
                class="bg-ghania-orange text-white text-xs font-bold px-3 py-1 rounded-full uppercase mb-4 inline-block">Blog</span>
            <h1 class="text-3xl md:text-5xl font-bold mb-6 leading-tight"><?= $display_title ?></h1>
            <div class="flex gap-6 text-sm text-gray-300">
                <span><?= $article['author_name'] ?? 'Admin' ?></span>
                <span><?= date('d M Y', strtotime($article['created_at'])) ?></span>
                <span><?= $article['views'] ?> Views</span>
            </div>
        </div>
    </div>
</div>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <nav class="flex mb-8 text-sm text-gray-500">
                <a href="index.php">Home</a> <span class="mx-2">/</span> <span
                    class="text-gray-800"><?= substr($display_title, 0, 30) ?>...</span>
            </nav>

            <article class="prose prose-lg prose-orange max-w-none text-gray-700">
                <?= $clean_content ?>
            </article>

            <?php if ($article['meta_keywords']): ?>
            <div class="mt-12 pt-8 border-t">
                <div class="flex flex-wrap gap-2">
                    <?php foreach (explode(',', $article['meta_keywords']) as $tag): ?>
                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs">#<?= trim($tag) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script>
window.onscroll = function() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById("progress-bar").style.width = (winScroll / height) * 100 + "%";
};
</script>

<style>
article,
article * {
    font-family: 'Poppins', sans-serif !important;
}

article h2 {
    font-size: 1.8em;
    font-weight: 700;
    margin-top: 1.5em;
    color: #111;
}

article p {
    margin-bottom: 1.5em;
    line-height: 1.8;
}

article ul {
    list-style: disc;
    padding-left: 1.5em;
}
</style>