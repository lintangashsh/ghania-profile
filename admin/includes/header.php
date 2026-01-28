<!-- <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-10">
    <button class="md:hidden text-gray-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <h2 class="text-xl font-bold text-gray-800 hidden md:block">
        Admin Dashboard
    </h2>

    <div class="flex items-center space-x-3">
        <div class="text-right hidden sm:block">
            <div class="text-sm font-bold text-gray-700"><?= $_SESSION['admin_name'] ?></div>
            <div class="text-xs text-gray-500">Super Admin</div>
        </div>
        <div
            class="h-10 w-10 rounded-full bg-ghania-orange flex items-center justify-center text-white font-bold text-lg">
            <?= substr($_SESSION['admin_name'], 0, 1) ?>
        </div>
    </div>
</header> -->
<!DOCTYPE html>
<html lang="<?= $lang_code ?? 'id' ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($page_title) ? $page_title . ' - Ghania Creative' : 'PT Ghania Creative Indonesia' ?></title>

    <?php if (isset($meta_desc) && !empty($meta_desc)): ?>
    <meta name="description" content="<?= $meta_desc ?>">
    <?php else: ?>
    <meta name="description" content="Digital Agency Medan: Website, Mobile Apps, & Social Media Management.">
    <?php endif; ?>

    <?php if (isset($meta_keys) && !empty($meta_keys)): ?>
    <meta name="keywords" content="<?= $meta_keys ?>">
    <?php endif; ?>

    <?php if (isset($og_image)): ?>
    <meta property="og:image" content="<?= $og_image ?>">
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="/assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="font-sans text-ghania-dark antialiased bg-white flex flex-col min-h-screen">