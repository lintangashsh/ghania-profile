<?php
$params = $_GET;

$params['lang'] = 'id';
$link_id = '?' . http_build_query($params);

$params['lang'] = 'en';
$link_en = '?' . http_build_query($params);
?>

<nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md shadow-sm transition-all duration-300">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex-shrink-0 flex items-center">
                <a href="index.php">
                    <img class="h-14 w-auto" src="assets/img/logo-ghania.png" alt="Ghania Creative">
                </a>
            </div>

            <div class="hidden md:flex space-x-8 items-center">
                <a href="index.php"
                    class="font-medium hover:text-ghania-orange transition <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'text-ghania-orange font-semibold' : 'text-ghania-dark' ?>"><?= $t['nav_home'] ?></a>
                <a href="about.php"
                    class="font-medium hover:text-ghania-orange transition <?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'text-ghania-orange font-semibold' : 'text-ghania-dark' ?>"><?= $t['nav_about'] ?></a>

                <div class="relative group">
                    <button
                        class="font-medium hover:text-ghania-orange flex items-center outline-none text-ghania-dark">
                        <?= $t['nav_services'] ?>
                        <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 hidden group-hover:block ring-1 ring-black ring-opacity-5 border-t-4 border-ghania-orange">
                        <a href="service.php?slug=web-dev"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-ghania-orange">Website
                            Development</a>
                        <a href="service.php?slug=mobile-apps"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-ghania-orange">Mobile
                            Apps Development</a>
                        <a href="service.php?slug=social-media"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-ghania-orange">Social
                            Media Management</a>
                    </div>
                </div>

                <a href="articles.php"
                    class="font-medium hover:text-ghania-orange transition <?= basename($_SERVER['PHP_SELF']) == 'articles.php' ? 'text-ghania-orange font-semibold' : 'text-ghania-dark' ?>"><?= $t['nav_articles'] ?></a>
                <a href="contact.php"
                    class="font-medium hover:text-ghania-orange transition <?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'text-ghania-orange font-semibold' : 'text-ghania-dark' ?>"><?= $t['nav_contact'] ?></a>
            </div>

            <div class="hidden md:flex items-center space-x-3 text-sm font-semibold">
                <a href="<?= $link_id ?>"
                    class="<?= $lang_code == 'id' ? 'text-ghania-orange' : 'text-gray-400 hover:text-gray-600' ?>">ID</a>
                <span class="text-gray-300">|</span>
                <a href="<?= $link_en ?>"
                    class="<?= $lang_code == 'en' ? 'text-ghania-orange' : 'text-gray-400 hover:text-gray-600' ?>">EN</a>
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-ghania-orange focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-inner">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="index.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange"><?= $t['nav_home'] ?></a>
            <a href="about.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange"><?= $t['nav_about'] ?></a>
            <a href="articles.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange"><?= $t['nav_articles'] ?></a>
            <a href="contact.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange"><?= $t['nav_contact'] ?></a>

            <div class="px-3 py-3 border-t mt-2 flex space-x-4">
                <a href="<?= $link_id ?>"
                    class="<?= $lang_code == 'id' ? 'font-bold text-ghania-orange' : 'text-gray-500' ?>">Indonesia</a>
                <span class="text-gray-300">|</span>
                <a href="<?= $link_en ?>"
                    class="<?= $lang_code == 'en' ? 'font-bold text-ghania-orange' : 'text-gray-500' ?>">English</a>
            </div>
        </div>
    </div>
</nav>

<div class="h-20"></div>