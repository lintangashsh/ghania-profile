<?php
require 'config/database.php';
require 'config/lang.php';

require_once 'config/tracker.php';
record_visit($db, 'articles_index', 'Daftar Artikel');

if ($lang_code == 'en') {
    $page_title_text = "Latest Articles";
    $page_subtitle = "Insights, news, and technological innovations from Ghania Creative";
    $search_placeholder = "Search articles...";
    $btn_read = "Read More";
    $txt_no_result = "No articles found matching your search";
    $txt_page = "Page";
} else {
    $page_title_text = "Artikel Terbaru";
    $page_subtitle = "Wawasan, berita, dan inovasi teknologi dari Ghania Creative";
    $search_placeholder = "Cari artikel...";
    $btn_read = "Baca Selengkapnya";
    $txt_no_result = "Tidak ada artikel yang ditemukan";
    $txt_page = "Halaman";
}

$search = isset($_GET['q']) ? $_GET['q'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$query = $db->table('articles a')
    ->select('a.*, u.name as author_name')
    ->join('users u', 'a.author_id', '=', 'u.id');

if (!empty($search)) {
    $searchParam = "%{$search}%";
    $query->whereRaw("(a.title_id LIKE ? OR a.title_en LIKE ? OR a.content_id LIKE ?)", [$searchParam, $searchParam, $searchParam]);
}

$total_rows = $query->count();
$total_pages = ceil($total_rows / $limit);

$articles = $query->orderBy('a.created_at', 'DESC')->limit($limit)->offset($offset)->get();

$page_title = $page_title_text . " - Ghania Creative";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- animasi scroll progress bar di navbar -->
<div id="progress-bar" class="fixed top-0 left-0 h-1 bg-ghania-orange z-[60] w-0 transition-all duration-200"></div>

<div class="relative h-[40vh] md:h-[50vh] w-full overflow-hidden bg-ghania-dark">
    <img src="assets/img/hero-bg.png" class="w-full h-full object-cover opacity-40">
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>

    <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4 container mx-auto z-10">
        <span class="text-ghania-orange font-bold tracking-widest uppercase text-sm mb-4 animate-fade-in-up">
            <?= ($lang_code == 'id')
                ? "Blog Kami"
                : "Our Blog" ?>
        </span>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up delay-100">
            <?= $page_title_text ?>
        </h1>
        <p class="text-gray-300 text-lg max-w-2xl animate-fade-in-up delay-200">
            <?= $page_subtitle ?>
        </p>
    </div>
</div>

<!-- search logic & showing article logic -->
<section class="py-16 md:py-24 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">

        <div class="max-w-xl mx-auto mb-16 relative">
            <form action="" method="GET" class="relative">
                <input type="text" name="q" value="<?= htmlspecialchars($search) ?>"
                    placeholder="<?= $search_placeholder ?>"
                    class="w-full px-6 py-4 rounded-full border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-ghania-orange pl-12 transition">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <?php if (!empty($search)): ?>
                <a href="articles.php"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-sm text-red-500 hover:underline">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if (count($articles) > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($articles as $row):
                    if ($lang_code == 'en') {
                        $art_title = !empty($row['title_en']) ? $row['title_en'] : $row['title_id'];
                        $art_desc = !empty($row['content_en']) ? $row['content_en'] : $row['content_id'];
                    } else {
                        $art_title = $row['title_id'];
                        $art_desc = $row['content_id'];
                    }
                    $art_desc_clean = strip_tags(stripslashes($art_desc));
                    $art_title_clean = stripslashes($art_title);
                    $thumb = !empty($row['thumbnail']) ? $row['thumbnail'] : 'https://via.placeholder.com/800x600?text=No+Image';
                ?>

            <article
                class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full group border border-gray-100">
                <a href="article-detail.php?slug=<?= $row['slug'] ?>" class="block relative h-56 overflow-hidden">
                    <img src="<?= $thumb ?>" alt="<?= $art_title_clean ?>"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    <div
                        class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-ghania-orange shadow-sm">
                        <?= date('d M Y', strtotime($row['created_at'])) ?>
                    </div>
                </a>

                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center text-xs text-gray-400 mb-3 space-x-2">
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <?= $row['author_name'] ?? 'Admin' ?>
                        </span>
                        <span>&bull;</span>
                        <span class="flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <?= $row['views'] ?>
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 hover:text-ghania-orange transition">
                        <a href="article-detail.php?slug=<?= $row['slug'] ?>"><?= $art_title_clean ?></a>
                    </h3>

                    <p class="text-gray-500 text-sm mb-6 line-clamp-3 flex-grow leading-relaxed">
                        <?= substr($art_desc_clean, 0, 120) ?>...
                    </p>

                    <a href="article-detail.php?slug=<?= $row['slug'] ?>"
                        class="inline-flex items-center text-ghania-orange font-semibold text-sm hover:underline mt-auto">
                        <?= $btn_read ?>
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="flex justify-center mt-16 space-x-2">
            <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?><?= $search ? '&q=' . $search : '' ?>"
                class="px-4 py-2 bg-white border border-gray-200 rounded-lg hover:bg-ghania-orange hover:text-white transition shadow-sm">&laquo;</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?><?= $search ? '&q=' . $search : '' ?>"
                class="px-4 py-2 rounded-lg border transition shadow-sm <?= ($i == $page) ? 'bg-ghania-orange text-white border-ghania-orange' : 'bg-white border-gray-200 hover:bg-gray-50 text-gray-700' ?>">
                <?= $i ?>
            </a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?><?= $search ? '&q=' . $search : '' ?>"
                class="px-4 py-2 bg-white border border-gray-200 rounded-lg hover:bg-ghania-orange hover:text-white transition shadow-sm">&raquo;</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php else: ?>
        <div class="text-center py-20">
            <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2"><?= $txt_no_result ?></h3>
            <?php if (!empty($search)): ?>
            <p class="text-gray-500 mb-6">
                <?= ($lang_code == 'id') ? "Penelusuran untuk " : "Search for " ?><b>
                    <?= htmlspecialchars($search) ?>
                </b><?= ($lang_code == 'id') ? "tidak ditemukan." : "not found" ?>
            </p>
            <a href="articles.php"
                class="bg-ghania-orange text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">
                <?= ($lang_code == 'id') ? "Kembali ke Semua Artikel" : "Back to All Articles" ?>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script>
window.onscroll = function() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("progress-bar").style.width = scrolled + "%";
};
</script>

<style>
.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

.delay-100 {
    animation-delay: 0.1s;
}

.delay-200 {
    animation-delay: 0.2s;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>