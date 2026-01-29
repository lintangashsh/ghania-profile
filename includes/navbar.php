<?php
$params = $_GET;

// Logic Bahasa
$params['lang'] = 'id';
$link_id = '?' . http_build_query($params);
$params['lang'] = 'en';
$link_en = '?' . http_build_query($params);

// Deteksi Halaman Aktif
$current_page = basename($_SERVER['PHP_SELF']);

// Fungsi Helper Helper Styling
function getNavClass($page_name, $current_page)
{
    if ($current_page == $page_name) {
        return 'active-nav text-ghania-orange font-bold border-b-2 border-current pb-1';
    } else {
        return 'nav-link text-white hover:text-ghania-orange transition pb-1 border-b-2 border-transparent hover:border-current';
    }
}
?>

<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-2">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex-shrink-0 flex items-center">
                <a href="index.php">
                    <img id="nav-logo" class="w-auto transition-all duration-300" src="/assets/img/logo-ghania.png"
                        alt="Ghania Creative" style="height: 55px; filter: brightness(0) invert(1);">
                </a>
            </div>

            <div class="hidden md:flex space-x-8 items-center">
                <a href="index.php" class="<?= getNavClass('index.php', $current_page) ?>">
                    <?= $t['nav_home'] ?>
                </a>

                <a href="about.php" class="<?= getNavClass('about.php', $current_page) ?>">
                    <?= $t['nav_about'] ?>
                </a>

                <?php
                $is_service_active = ($current_page == 'service.php');
                $service_class = $is_service_active
                    ? 'text-ghania-orange font-bold border-b-2 border-current pb-1'
                    : 'text-white hover:text-ghania-orange hover:border-current border-b-2 border-transparent pb-1';
                ?>
                <div class="relative group">
                    <button class="nav-link flex items-center outline-none <?= $service_class ?>">
                        <?= $t['nav_services'] ?>
                        <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 hidden group-hover:block ring-1 ring-black ring-opacity-5 border-t-4 border-ghania-orange text-gray-800">
                        <a href="service.php?slug=web-dev"
                            class="block px-4 py-2 text-sm hover:bg-orange-50 hover:text-ghania-orange">Website
                            Development</a>
                        <a href="service.php?slug=mobile-apps"
                            class="block px-4 py-2 text-sm hover:bg-orange-50 hover:text-ghania-orange">Mobile Apps</a>
                        <a href="service.php?slug=social-media"
                            class="block px-4 py-2 text-sm hover:bg-orange-50 hover:text-ghania-orange">Social Media
                            Mgmt</a>
                    </div>
                </div>

                <a href="articles.php" class="<?= getNavClass('articles.php', $current_page) ?>">
                    <?= $t['nav_articles'] ?>
                </a>

                <a href="contact.php" class="<?= getNavClass('contact.php', $current_page) ?>">
                    <?= $t['nav_contact'] ?>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-3">
                <a href="<?= $link_id ?>" title="Bahasa Indonesia" class="transition transform hover:scale-110">
                    <img src="https://flagcdn.com/h24/id.png" alt="ID"
                        class="h-5 w-auto rounded shadow-sm transition <?= $lang_code == 'id' ? 'ring-2 ring-ghania-orange opacity-100' : 'opacity-50 hover:opacity-100' ?>">
                </a>

                <a href="<?= $link_en ?>" title="English (UK)" class="transition transform hover:scale-110">
                    <img src="https://flagcdn.com/h24/gb.png" alt="EN"
                        class="h-5 w-auto rounded shadow-sm transition <?= $lang_code == 'en' ? 'ring-2 ring-ghania-orange opacity-100' : 'opacity-50 hover:opacity-100' ?>">
                </a>
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="nav-link text-white hover:text-ghania-orange focus:outline-none">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-inner text-gray-800">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="index.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange <?= $current_page == 'index.php' ? 'text-ghania-orange font-bold bg-orange-50' : 'text-gray-800' ?>"><?= $t['nav_home'] ?></a>
            <a href="about.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange <?= $current_page == 'about.php' ? 'text-ghania-orange font-bold bg-orange-50' : 'text-gray-800' ?>"><?= $t['nav_about'] ?></a>
            <a href="articles.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange <?= $current_page == 'articles.php' ? 'text-ghania-orange font-bold bg-orange-50' : 'text-gray-800' ?>"><?= $t['nav_articles'] ?></a>
            <a href="contact.php"
                class="block px-3 py-2 rounded-md text-base font-medium hover:bg-orange-50 hover:text-ghania-orange <?= $current_page == 'contact.php' ? 'text-ghania-orange font-bold bg-orange-50' : 'text-gray-800' ?>"><?= $t['nav_contact'] ?></a>

            <div class="px-3 py-3 border-t mt-2 flex items-center space-x-4">
                <span class="text-gray-500 text-sm">Language:</span>
                <a href="<?= $link_id ?>" class="flex items-center space-x-2">
                    <img src="https://flagcdn.com/h24/id.png" alt="ID"
                        class="h-6 w-auto rounded shadow-sm <?= $lang_code == 'id' ? 'ring-2 ring-ghania-orange opacity-100' : 'opacity-40' ?>">
                </a>
                <a href="<?= $link_en ?>" class="flex items-center space-x-2">
                    <img src="https://flagcdn.com/h24/gb.png" alt="EN"
                        class="h-6 w-auto rounded shadow-sm <?= $lang_code == 'en' ? 'ring-2 ring-ghania-orange opacity-100' : 'opacity-40' ?>">
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
const navbar = document.getElementById('navbar');
const navLinks = document.querySelectorAll('.nav-link:not(.active-nav)');

// NOTE: Saya hapus variabel langLinks & divider karena sudah diganti gambar (tidak perlu diubah warnanya oleh JS)

const navLogo = document.getElementById('nav-logo');
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const menu = document.getElementById('mobile-menu');

function updateNavbar() {
    const isMenuOpen = !menu.classList.contains('hidden');

    if (window.scrollY > 50 || isMenuOpen) {
        // STATE SCROLL DOWN (WHITE BG)
        navbar.classList.remove('bg-transparent', 'py-2');
        navbar.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-sm', 'py-0');

        // Link biasa jadi Hitam
        navLinks.forEach(link => {
            link.classList.remove('text-white');
            link.classList.add('text-ghania-dark');
        });

        navLogo.style.filter = "none";

    } else {
        // STATE TOP (TRANSPARENT)
        navbar.classList.add('bg-transparent', 'py-2');
        navbar.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-sm', 'py-0');

        // Link biasa jadi Putih
        navLinks.forEach(link => {
            link.classList.add('text-white');
            link.classList.remove('text-ghania-dark');
        });

        navLogo.style.filter = "brightness(0) invert(1)";
    }
}

window.addEventListener('scroll', updateNavbar);

const btn = document.getElementById('mobile-menu-btn');
btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    updateNavbar();
});

updateNavbar();
</script>