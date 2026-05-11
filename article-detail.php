<?php
require 'config/database.php';
require 'config/lang.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

$article = $db->table('articles a')
    ->select('a.*, u.name as author_name')
    ->join('users u', 'a.author_id', '=', 'u.id')
    ->where('a.slug', $slug)
    ->first();

if (!$article) {
    header("Location: index.php");
    exit();
}

$db->execute("UPDATE articles SET views = views + 1 WHERE id = ?", [$article['id']]);

require_once 'config/tracker.php';
record_visit($db, 'article', $article['title_id']);

if ($lang_code == 'en') {
    $raw_title = !empty($article['title_en']) ? $article['title_en'] : $article['title_id'];
    $raw_content = !empty($article['content_en']) ? $article['content_en'] : $article['content_id'];
} else {
    $raw_title = $article['title_id'];
    $raw_content = $article['content_id'];
}

$display_title = stripslashes($raw_title);
$clean_content = stripslashes($raw_content);
$clean_content = str_replace(array('\r\n', '\r', '\n', '\\r\\n'), '<br>', $clean_content);

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

    article h1,
    article h2,
    article h3,
    article h4 {
        color: #111;
        font-weight: 700;
        margin-top: 1.5em;
        margin-bottom: 0.5em;
    }

    article p {
        margin-bottom: 1.5em;
        line-height: 1.8;
        color: #374151;
    }

    article ul {
        display: block;
        list-style-type: disc !important;
        padding-left: 2em !important;
        margin-bottom: 1.5em;
    }

    article ol {
        display: block;
        list-style-type: decimal !important;
        padding-left: 2em !important;
        margin-bottom: 1.5em;
    }

    article li {
        display: list-item;
        margin-bottom: 0.5em;
        padding-left: 0.5em;
    }

    article img {
        border-radius: 0.75rem;
        margin: 2em 0;
        width: 100%;
        height: auto;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    article blockquote {
        border-left: 4px solid #F05A28;
        background: #FFF7F0;
        padding: 1em 1.5em;
        font-style: italic;
        color: #555;
        margin-bottom: 1.5em;
    }

    article a {
        color: #F05A28;
        text-decoration: underline;
    }
</style>