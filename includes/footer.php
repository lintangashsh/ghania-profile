<footer class="bg-ghania-dark text-white pt-16 pb-8 mt-auto border-t border-gray-800">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">

            <div>
                <div class="flex items-center mb-6">
                    <img src="assets/img/logo-ghania.png" alt="Ghania Logo" class="h-12 mr-3 bg-white rounded-md p-1">
                    <div>
                        <h3 class="text-xl font-bold text-white">GHANIA</h3>
                        <p class="text-xs text-gray-400 tracking-widest">CREATIVE INDONESIA</p>
                    </div>
                </div>
                <p class="text-gray-400 mb-6 text-sm leading-relaxed">
                    Simplified Your Business Problems. Partner digital terbaik untuk transformasi bisnis Anda.
                </p>

                <div class="space-y-3 text-sm text-gray-300">
                    <a href="https://wa.me/6285158023383" class="flex items-center hover:text-ghania-orange transition">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                        +62 851-5802-3383
                    </a>
                    <a href="mailto:lintang.labs@gmail.com"
                        class="flex items-center hover:text-ghania-orange transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        lintang.labs@gmail.com
                    </a>
                </div>

                <div class="mt-6 text-sm">
                    <a href="?lang=id"
                        class="<?= $lang_code == 'id' ? 'text-ghania-orange font-bold' : 'text-gray-500' ?>">INDONESIA</a>
                    <span class="mx-2 text-gray-600">|</span>
                    <a href="?lang=en"
                        class="<?= $lang_code == 'en' ? 'text-ghania-orange font-bold' : 'text-gray-500' ?>">ENGLISH</a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 text-white border-b border-gray-700 pb-2 inline-block">
                    <?= $t['footer_quick_access'] ?></h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="index.php"
                            class="hover:text-ghania-orange transition block transform hover:translate-x-2">→
                            <?= $t['nav_home'] ?></a></li>
                    <li><a href="about.php"
                            class="hover:text-ghania-orange transition block transform hover:translate-x-2">→
                            <?= $t['nav_about'] ?></a></li>
                    <li><a href="articles.php"
                            class="hover:text-ghania-orange transition block transform hover:translate-x-2">→
                            <?= $t['nav_articles'] ?></a></li>
                    <li><a href="contact.php"
                            class="hover:text-ghania-orange transition block transform hover:translate-x-2">→
                            <?= $t['nav_contact'] ?></a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 text-white border-b border-gray-700 pb-2 inline-block">
                    <?= $t['footer_leave_msg'] ?></h4>
                <form action="mailto:lintang.labs@gmail.com" method="post" enctype="text/plain" class="space-y-3">
                    <input type="text" name="nama" placeholder="<?= $t['form_name'] ?>"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-ghania-orange transition">
                    <input type="email" name="email" placeholder="<?= $t['form_email'] ?>"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-ghania-orange transition">
                    <input type="text" name="subjek" placeholder="<?= $t['form_subject'] ?>"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-ghania-orange transition">
                    <textarea name="pesan" rows="3" placeholder="<?= $t['form_message'] ?>"
                        class="w-full bg-gray-800 border border-gray-700 rounded px-4 py-2 text-sm text-white focus:outline-none focus:border-ghania-orange transition"></textarea>

                    <button type="submit"
                        class="bg-ghania-orange text-white px-6 py-2 rounded text-sm font-semibold hover:bg-orange-600 transition w-full">
                        <?= $t['btn_send'] ?>
                    </button>
                </form>
            </div>
        </div>

        <div
            class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
            <p>&copy; <?= date('Y') ?> PT Ghania Creative Indonesia. <?= $t['copyright'] ?></p>
            <p class="mt-2 md:mt-0">Designed by <span class="text-white font-semibold">Ghania Creative Indonesia</span>
            </p>
        </div>
    </div>
</footer>

<script>
const btnMobile = document.getElementById('mobile-menu-btn');
const menuMobile = document.getElementById('mobile-menu');

if (btnMobile && menuMobile) {
    btnMobile.addEventListener('click', () => {
        menuMobile.classList.toggle('hidden');
    });
}
</script>

</body>

</html>