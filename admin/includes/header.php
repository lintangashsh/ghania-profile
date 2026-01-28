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