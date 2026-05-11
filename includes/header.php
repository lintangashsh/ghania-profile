<?php
/**
 * @var string $lang_code
 * @var string $page_title
 */
?>
<!DOCTYPE html>
<html lang="<?= $lang_code ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title . ' - ' : '' ?>PT Ghania Creative Indonesia</title>

    <!-- logo icon 3d ghania -->
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/ghania-3d.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/swiper-bundle.min.css" />
</head>

<body class="font-sans text-ghania-dark antialiased bg-white">