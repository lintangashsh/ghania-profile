<?php
$current_dir = basename(dirname($_SERVER['PHP_SELF']));

$active_class = "bg-ghania-orange text-white shadow-lg transform translate-x-1";
$inactive_class = "text-gray-400 hover:bg-gray-800 hover:text-white transition-all duration-200";
?>

<aside
    class="w-64 bg-ghania-dark text-white hidden md:flex flex-col flex-shrink-0 h-screen fixed left-0 top-0 z-20 shadow-2xl font-poppins">

    <?php
    $admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'ADMIN';
    $profile_img = ($admin_name == 'Lintang Antum') ? BASE_URL . 'assets/img/antum_profile.png' : BASE_URL . 'assets/img/logo-ghania.png';
    ?>
    <div class="h-20 flex items-center px-6 border-b border-gray-700 bg-gray-900/50">
        <img src="<?= $profile_img ?>" class="h-10 w-10 object-cover rounded-full bg-white p-0.5 mr-3 shadow-sm">
        <span class="font-bold text-sm tracking-wide text-white truncate" title="<?= htmlspecialchars($admin_name) ?>">
            <?= htmlspecialchars($admin_name) ?>
        </span>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

        <a href="<?= BASE_URL ?>admin/index.php"
            class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-300 <?= ($current_dir == 'admin') ? $active_class : $inactive_class ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            Dashboard
        </a>

        <a href="<?= BASE_URL ?>admin/articles/index.php"
            class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-300 <?= ($current_dir == 'articles') ? $active_class : $inactive_class ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                </path>
            </svg>
            Artikel/Blog
        </a>

        <a href="<?= BASE_URL ?>admin/services/index.php"
            class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-300 <?= ($current_dir == 'services') ? $active_class : $inactive_class ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
            Layanan Kami
        </a>

    </nav>

    <div class="p-4 border-t border-gray-700 bg-gray-900/50">
        <a href="<?= BASE_URL ?>admin/logout.php"
            class="flex items-center justify-center w-full px-4 py-3 rounded-xl font-bold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 shadow-lg transform hover:-translate-y-1 transition-all duration-300">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
            Keluar
        </a>
    </div>
</aside>