<aside
    class="w-64 bg-ghania-dark text-white hidden md:block flex-shrink-0 h-screen fixed left-0 top-0 overflow-y-auto z-20">
    <div class="p-6 flex items-center border-b border-gray-700">
        <img src="../assets/img/logo-ghania.png" class="h-8 bg-white rounded p-1 mr-3">
        <span class="font-bold text-lg tracking-wider">ADMIN</span>
    </div>

    <nav class="mt-6 px-4 space-y-2">
        <a href="/admin/index.php"
            class="flex items-center px-4 py-3 rounded-lg transition-colors <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'bg-ghania-orange text-white' : 'hover:bg-gray-800 text-gray-300' ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            Dashboard
        </a>

        <a href="/admin/articles/index.php"
            class="flex items-center px-4 py-3 rounded-lg transition-colors <?= strpos($_SERVER['PHP_SELF'], '/articles/') !== false ? 'bg-ghania-orange text-white' : 'hover:bg-gray-800 text-gray-300' ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                </path>
            </svg>
            Artikel/Blog
        </a>

        <a href="/admin/services/index.php"
            class="flex items-center px-4 py-3 rounded-lg transition-colors <?= strpos($_SERVER['PHP_SELF'], '/services/') !== false ? 'bg-ghania-orange text-white' : 'hover:bg-gray-800 text-gray-300' ?>">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
            Layanan Kami
        </a>

        <a href="/admin/logout.php"
            class="flex items-center px-4 py-3 rounded-lg text-red-400 hover:bg-red-500/10 mt-8">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
            Keluar
        </a>
    </nav>
</aside>