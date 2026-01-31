<?php
require 'config/database.php';
require 'config/lang.php';

// Ambil Slug
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

// Query
$stmt = $conn->prepare("SELECT * FROM services WHERE slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$service = $stmt->get_result()->fetch_assoc();

if (!$service) {
    header("Location: index.php");
    exit();
}

// Tracker
$conn->query("UPDATE services SET views = views + 1 WHERE id = " . $service['id']);
require_once 'config/tracker.php';
record_visit($conn, 'service', $service['title_id']);

// === LOGIC BAHASA ===
if ($lang_code == 'en') {
    $section_title = "Our Services";
    $title = !empty($service['title_en']) ? $service['title_en'] : $service['title_id'];
    $brief = !empty($service['brief_en']) ? $service['brief_en'] : $service['brief_id'];
    $content = !empty($service['content_en']) ? $service['content_en'] : $service['content_id'];
    $cta_text = "Consult Now";
    $back_text = "Back to Home";
    $sidebar_title = "Interested in this Service?";
    $sidebar_desc = "Discuss your project needs with our expert team. Free consultation!";
    $other_serv_title = "Other Services";
} else {
    $section_title = "Layanan Kami";
    $title = $service['title_id'];
    $brief = $service['brief_id'];
    $content = $service['content_id'];
    $cta_text = "Konsultasi Sekarang";
    $back_text = "Kembali ke Beranda";
    $sidebar_title = "Tertarik dengan Layanan Ini?";
    $sidebar_desc = "Diskusikan kebutuhan proyek Anda bersama tim ahli kami. Konsultasi gratis!";
    $other_serv_title = "Layanan Lainnya";
}

// === CLEANING DATA (AMAN) ===
// 1. Bersihkan backslash dari database
$clean_content = stripslashes($content);

// 2. Tidak ada lagi str_replace('rn', ...) yang menghapus kata "internal"
// TinyMCE sudah menghasilkan HTML (<p>), jadi kita tidak butuh nl2br juga.

$title = stripslashes($title);
$brief = stripslashes($brief);

$page_title = $title . " - Ghania Creative";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 bg-ghania-dark overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="assets/img/hero-bg.png" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="text-ghania-orange font-bold tracking-widest uppercase text-sm mb-4 block animate-fade-in-up">
            <?= $section_title ?>
        </span>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight animate-fade-in-up delay-100">
            <?= $title ?>
        </h1>
        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto animate-fade-in-up delay-200">
            <?= $brief ?>
        </p>
    </div>
</div>

<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">

            <div class="lg:w-2/3">
                <?php if (!empty($service['thumbnail'])): ?>
                <div
                    class="rounded-2xl overflow-hidden shadow-2xl mb-10 transform hover:scale-[1.01] transition duration-500">
                    <img src="<?= $service['thumbnail'] ?>?v=<?= time() ?>" alt="<?= $title ?>"
                        class="w-full h-auto object-cover">
                </div>
                <?php endif; ?>

                <div class="prose prose-lg prose-orange max-w-none text-gray-700">
                    <?= $clean_content ?>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-100">
                    <a href="index.php"
                        class="inline-flex items-center text-gray-500 hover:text-ghania-orange transition font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <?= $back_text ?>
                    </a>
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="sticky top-28 space-y-8">
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 shadow-lg text-center">
                        <div
                            class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm text-ghania-orange">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2"><?= $sidebar_title ?></h3>
                        <p class="text-gray-500 text-sm mb-6"><?= $sidebar_desc ?></p>
                        <a href="https://wa.me/6281234567890?text=Halo%20Ghania%20Creative,%20saya%20tertarik%20dengan%20layanan%20<?= urlencode($title) ?>"
                            target="_blank"
                            class="block w-full bg-ghania-orange text-white font-bold py-3 px-6 rounded-xl hover:bg-orange-600 transition shadow-lg transform hover:-translate-y-1">
                            <?= $cta_text ?>
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-md">
                        <h4 class="font-bold text-gray-800 mb-4 border-b pb-2"><?= $other_serv_title ?></h4>
                        <ul class="space-y-3">
                            <?php
                            $other_sql = "SELECT title_id, title_en, slug FROM services WHERE id != " . $service['id'] . " LIMIT 5";
                            $others = $conn->query($other_sql);
                            while ($os = $others->fetch_assoc()):
                                $os_title = ($lang_code == 'en') ? $os['title_en'] : $os['title_id'];
                            ?>
                            <li>
                                <a href="service.php?slug=<?= $os['slug'] ?>"
                                    class="flex items-center text-gray-600 hover:text-ghania-orange transition group">
                                    <span
                                        class="w-2 h-2 bg-gray-300 rounded-full mr-3 group-hover:bg-ghania-orange transition"></span>
                                    <span class="text-sm font-medium"><?= $os_title ?></span>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<style>
/* Styling khusus konten dari TinyMCE agar rapi */
.prose h1,
.prose h2,
.prose h3 {
    color: #1f2937;
    font-weight: 700;
    margin-top: 1.5em;
    margin-bottom: 0.5em;
}

.prose p {
    margin-bottom: 1em;
    line-height: 1.7;
}

.prose ul {
    list-style-type: disc;
    padding-left: 1.5em;
    margin-bottom: 1em;
}

.prose ol {
    list-style-type: decimal;
    padding-left: 1.5em;
    margin-bottom: 1em;
}

.prose strong {
    color: #F05A28;
}
</style>