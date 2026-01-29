<?php
require 'config/database.php';
require 'config/lang.php';
// Setup SEO
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- section awal/carousel -->
<section class="relative bg-gray-900 text-white py-32 lg:py-48 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="assets/img/hero-bg.png" alt="Background" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-transparent"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <div class="border-l-4 border-ghania-orange pl-6">
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    “Simplified Your <br> Business Problems”
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 font-light mb-8">
                    Ghania Creative Indonesia Sejak 2021 <br>
                    <span class="text-sm opacity-80">Business Management</span>
                </p>

                <a href="https://wa.me/6285158023383"
                    class="inline-block bg-ghania-orange text-white font-semibold px-8 py-3 rounded-md hover:bg-orange-700 transition shadow-lg transform hover:-translate-y-1">
                    <?= $t['btn_consult'] ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- section about us -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-ghania-orange mb-2">Ghania</h2>
            <p class="text-gray-500">Creative Indonesia</p>
        </div>
        <div class="text-center">
            <p class="max-w-2xl mx-auto text-gray-600 mb-8">
                Adalah sebuah perusahaan Digital Creative Agency yang memiliki layanan utama dalam Mobile Apps
                Development & Website Development.
            </p>
            <a href="about.php" class="text-ghania-orange font-semibold hover:underline"><?= $t['btn_read_more'] ?>
                &rarr;</a>
        </div>
    </div>
</section>

<!-- section our services -->
<section id="services" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-ghania-dark"><?= $t['nav_services'] ?></h2>
        <p class="text-gray-500 mb-12 max-w-2xl mx-auto">
            <?= ($lang_code == 'id') ? 'Solusi digital terbaik untuk pertumbuhan bisnis Anda.' : 'The best digital solutions for your business growth.' ?>
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            // memastikan kolom DB sesuai dengan bahasa (ID or EN)
            $sql = "SELECT * FROM services";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $title = ($lang_code == 'id') ? $row['title_id'] : $row['title_en'];
                    $brief = ($lang_code == 'id') ? $row['brief_id'] : $row['brief_en'];
            ?>

            <div
                class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 border-t-4 border-ghania-orange group flex flex-col h-full">
                <div
                    class="w-16 h-16 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-6 text-ghania-orange group-hover:bg-ghania-orange group-hover:text-white transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                        </path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold mb-3 text-ghania-dark"><?= $title ?></h3>
                <p class="text-gray-600 mb-6 text-sm flex-grow leading-relaxed">
                    <?= substr($brief, 0, 100) . '...' ?>
                </p>

                <a href="service.php?slug=<?= $row['slug'] ?>"
                    class="inline-block text-ghania-orange font-semibold hover:tracking-wide transition-all">
                    <?= $t['btn_read_more'] ?> &rarr;
                </a>
            </div>

            <?php
                endwhile;
            else:
                echo "<p class='col-span-3 text-gray-500'>Belum ada layanan tersedia.</p>";
            endif;
            ?>
        </div>

        <div class="mt-16">
            <a href="https://wa.me/6285158023383" target="_blank"
                class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                </svg>
                <?= $t['btn_consult'] ?>
            </a>
        </div>
    </div>
</section>

<!-- section our clients logo -->
<section class="py-16 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4 mb-10 text-center">
        <h2 class="text-2xl font-bold text-ghania-dark"><?= $t['title_clients'] ?></h2>
        <div class="w-16 h-1 bg-ghania-orange mx-auto mt-2 rounded"></div>
    </div>

    <div class="container mx-auto px-4">
        <div class="swiper clientSwiper px-4">
            <div class="swiper-wrapper items-center">
                <?php for ($i = 1; $i <= 20; $i++): ?>
                <div class="swiper-slide flex justify-center items-center p-4">
                    <div
                        class="grayscale opacity-40 hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer transform hover:scale-110">
                        <img src="assets/img/clients/client-<?= $i ?>.png" alt="Client <?= $i ?>"
                            class="h-16 md:h-16 w-auto object-contain"
                            onerror="this.src='https://via.placeholder.com/150x50?text=CLIENT+<?= $i ?>'; this.className='h-8 object-contain opacity-50';">
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<!-- section artikel -->
<section class="py-20 bg-gray-50 relative">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-ghania-dark mb-2"><?= $t['title_latest_articles'] ?></h2>
                <p class="text-gray-500">Update wawasan terbaru seputar dunia digital.</p>
            </div>
            <a href="articles.php"
                class="hidden md:inline-flex items-center text-ghania-orange font-semibold hover:underline">
                <?= $t['btn_all_articles'] ?> &rarr;
            </a>
        </div>

        <div class="swiper articleSwiper pb-12">
            <div class="swiper-wrapper">
                <?php
                // mengambil 5 artikel terbaru
                $sql_art = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 5";
                $res_art = $conn->query($sql_art);

                if ($res_art && $res_art->num_rows > 0):
                    while ($row = $res_art->fetch_assoc()):
                        // --- FIX LOGIC BAHASA ---
                        if ($lang_code == 'en' && !empty($row['title_en'])) {
                            $raw_title = $row['title_en'];
                            $raw_content = $row['content_en'];
                        } else {
                            $raw_title = $row['title_id'];
                            $raw_content = $row['content_id'];
                        }

                        // --- FIX CLEANING DATA ---
                        $display_title = stripslashes($raw_title);
                        $clean_text = strip_tags($raw_content);
                        $clean_text = str_replace(['\r\n', '\r', '\n', '\\'], ' ', $clean_text);
                        $clean_excerpt = substr($clean_text, 0, 100) . '...';

                        // in case thumbnail kosong
                        $thumb = !empty($row['thumbnail']) ? $row['thumbnail'] : 'https://via.placeholder.com/800x450?text=No+Image';
                ?>
                <div class="swiper-slide h-auto">
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 h-full flex flex-col group">
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?= $thumb ?>" alt="<?= $display_title ?>"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            <div
                                class="absolute top-4 left-4 bg-ghania-orange text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                Blog
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs text-gray-400 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <?= date('d M Y', strtotime($row['created_at'])) ?>
                            </div>
                            <h3
                                class="text-lg font-bold text-ghania-dark mb-3 line-clamp-2 group-hover:text-ghania-orange transition">
                                <a href="article-detail.php?slug=<?= $row['slug'] ?>">
                                    <?= $display_title ?>
                                </a>
                            </h3>
                            <p class="text-gray-500 text-sm line-clamp-3 mb-4 flex-grow">
                                <?= $clean_excerpt ?>
                            </p>
                            <a href="article-detail.php?slug=<?= $row['slug'] ?>"
                                class="text-ghania-orange font-semibold text-sm hover:underline mt-auto">
                                <?= $t['btn_read_more'] ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                else:
                    echo "<div class='text-center w-full py-10 text-gray-500'>Belum ada artikel.</div>";
                endif;
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="mt-8 text-center md:hidden">
            <a href="articles.php"
                class="inline-block border border-ghania-orange text-ghania-orange px-6 py-2 rounded-full font-semibold hover:bg-ghania-orange hover:text-white transition">
                <?= $t['btn_all_articles'] ?>
            </a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
var swiperClient = new Swiper(".clientSwiper", {
    slidesPerView: 2,
    spaceBetween: 20,
    loop: true,
    speed: 3000,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 50
        },
    },
    allowTouchMove: false,
});

var swiperArt = new Swiper(".articleSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        },
    },
});
</script>

<?php include 'includes/footer.php'; ?>