<?php
require 'config/database.php';
require 'config/lang.php';
$page_title = ($lang_code == 'id') ? 'Beranda' : 'Home';

// Setup SEO & Header
include 'includes/header.php';
include 'includes/navbar.php';
require 'config/tracker.php';
record_visit($conn, 'home', 'Halaman Utama');

// --- DATA BACKGROUND UNTUK SCROLLYTELLING (Section 2 ke bawah) ---
// Section 1 (Hero) punya background sendiri di dalam Slidernya.
// Section 2 (About) dibiarkan transparan/hitam agar fokus ke konten.
$bg_sections = [
    'about'     => '', // Kosongkan agar background hitam default (sesuai request)
    'services'  => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1920&auto=format&fit=crop', // Tech vibes
    'clients'   => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1920&auto=format&fit=crop', // Corporate vibes
    'articles'  => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1920&auto=format&fit=crop', // Coffee/Read vibes
];
?>

<style>
/* 1. HIDE SCROLLBAR */
html,
body {
    scrollbar-width: none !important;
    -ms-overflow-style: none !important;
    overflow-y: scroll;
    scroll-behavior: smooth;
    background-color: black;
    /* Default BG */
}

body::-webkit-scrollbar {
    display: none !important;
}

/* 2. NAVBAR OVERRIDE (Transparan ke 50% Dark saat scroll) */
.nav-link,
.lang-link {
    color: #ffffff !important;
}

.nav-link:hover,
.lang-link:hover {
    color: #FF6600 !important;
}

#nav-logo {
    filter: brightness(0) invert(1) !important;
}

#navbar.bg-white\/95 {
    background-color: rgba(0, 0, 0, 0.5) !important;
    backdrop-filter: blur(10px) !important;
    box-shadow: none !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
}

#navbar {
    transition: background-color 0.5s ease, padding 0.3s ease;
}

/* 3. ANIMASI TEKS */
.fade-up-enter {
    opacity: 0;
    transform: translateY(40px);
    transition: all 1s ease-out;
}

.fade-up-active {
    opacity: 1;
    transform: translateY(0);
}

/* 4. SWIPER CUSTOM */
.swiper-pagination-bullet {
    background: white !important;
    opacity: 0.5;
}

.swiper-pagination-bullet-active {
    background: #FF6600 !important;
    opacity: 1;
}

/* 5. FLOATING ANIMATION (Untuk Logo 3D) */
@keyframes float {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(-20px);
    }

    100% {
        transform: translateY(0px);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}
</style>

<div class="fixed inset-0 w-full h-full z-0 bg-black">
    <?php foreach ($bg_sections as $id => $img): ?>
    <?php if ($img): ?>
    <div id="bg-<?= $id ?>"
        class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0">
        <img src="<?= $img ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-black/40"></div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>

<div class="relative z-10">

    <section class="relative h-screen w-full overflow-hidden bg-black snap-section" data-target="none">
        <div class="swiper heroSwiper h-full w-full">
            <div class="swiper-wrapper">

                <div class="swiper-slide relative bg-black">
                    <div class="absolute inset-0">
                        <img src="assets/img/hero-bg.png" class="w-full h-full object-cover opacity-60">
                        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-transparent"></div>
                    </div>
                    <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-center">
                        <div class="max-w-4xl fade-up-active">
                            <div class="border-l-8 border-ghania-orange pl-8">
                                <h1
                                    class="text-4xl md:text-6xl lg:text-7xl text-white font-bold italic mb-4 leading-tight">
                                    "Bringing your local potential to global impact"
                                </h1>
                                <h2 class="text-2xl md:text-3xl text-gray-300 font-light mb-2">
                                    Ghania Creative Indonesia
                                </h2>
                                <p class="text-gray-400 text-lg mb-8 tracking-wider uppercase font-semibold">
                                    <?= ($lang_code == 'id') ? 'Digital Creative Agency Sejak 2021' : 'Digital Creative Agency Since 2021' ?>
                                </p>
                                <a href="https://wa.me/6281234567890" target="_blank"
                                    class="inline-block bg-ghania-orange text-white font-bold px-8 py-4 rounded-xl hover:bg-orange-600 transition shadow-lg transform hover:-translate-y-1">
                                    <?= $t['btn_consult'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative bg-black">
                    <div class="absolute inset-0">
                        <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?q=80&w=1920&auto=format&fit=crop"
                            class="w-full h-full object-cover opacity-50">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/30"></div>
                    </div>
                    <div
                        class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
                        <div class="max-w-3xl">
                            <div
                                class="w-20 h-20 bg-ghania-orange/20 rounded-full flex items-center justify-center mx-auto mb-6 text-ghania-orange backdrop-blur-sm border border-ghania-orange/30">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-4xl md:text-6xl font-bold text-white mb-6">Website Development</h2>
                            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                                <?= ($lang_code == 'id')
                                    ? "Bangun identitas digital profesional dengan website yang cepat, responsif, dan elegan. Dari Company Profile hingga E-Commerce."
                                    : "Build a professional digital identity with fast, responsive, and elegant websites. From Company Profiles to E-Commerce." ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative bg-black">
                    <div class="absolute inset-0">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=1920&auto=format&fit=crop"
                            class="w-full h-full object-cover opacity-50">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/30"></div>
                    </div>
                    <div
                        class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
                        <div class="max-w-3xl">
                            <div
                                class="w-20 h-20 bg-ghania-orange/20 rounded-full flex items-center justify-center mx-auto mb-6 text-ghania-orange backdrop-blur-sm border border-ghania-orange/30">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-4xl md:text-6xl font-bold text-white mb-6">Mobile Apps Development</h2>
                            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                                <?= ($lang_code == 'id')
                                    ? "Ubah ide brilian Anda menjadi aplikasi Android & iOS yang powerful dan user-friendly."
                                    : "Transform your brilliant ideas into powerful and user-friendly Android & iOS applications." ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative bg-black">
                    <div class="absolute inset-0">
                        <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?q=80&w=1920&auto=format&fit=crop"
                            class="w-full h-full object-cover opacity-50">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/30"></div>
                    </div>
                    <div
                        class="relative z-10 container mx-auto px-6 h-full flex items-center justify-center text-center">
                        <div class="max-w-3xl">
                            <div
                                class="w-20 h-20 bg-ghania-orange/20 rounded-full flex items-center justify-center mx-auto mb-6 text-ghania-orange backdrop-blur-sm border border-ghania-orange/30">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                    </path>
                                </svg>
                            </div>
                            <h2 class="text-4xl md:text-6xl font-bold text-white mb-6">Social Media Management</h2>
                            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                                <?= ($lang_code == 'id')
                                    ? "Tingkatkan engagement dan brand awareness bisnis Anda dengan strategi konten kreatif."
                                    : "Boost engagement and brand awareness for your business with creative content strategies." ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section id="sec-about" class="min-h-screen flex items-center snap-section relative" data-target="bg-about">
        <div class="container mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center fade-up-enter">

                <div class="flex justify-center lg:justify-end order-1 lg:order-1">
                    <div class="relative w-64 h-64 md:w-96 md:h-96">
                        <div class="absolute inset-0 bg-ghania-orange/20 blur-[100px] rounded-full"></div>
                        <img src="assets/img/logo-ghania-3d.PNG" alt="Ghania 3D Logo"
                            class="relative w-full h-full object-contain animate-float drop-shadow-2xl filter brightness-110">
                    </div>
                </div>

                <div class="text-white text-center lg:text-left order-2 lg:order-2">
                    <span class="text-ghania-orange font-bold tracking-widest uppercase mb-2 block">Who We Are</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Ghania Creative<br>Indonesia</h2>
                    <p class="text-gray-300 text-lg leading-relaxed mb-8 font-light">
                        <?= ($lang_code == 'id')
                            ? "Ghania Creative Indonesia merupakan sebuah perusahaan <b>Digital Creative Agency</b> yang memiliki layanan utama dalam Mobile Apps Development, Website Development, dan Social Media Management. Kami lahir untuk mendigitalisasi potensi lokal menuju dampak global."
                            : "Ghania Creative Indonesia is a <b>Digital Creative Agency</b> specializing in Mobile Apps Development, Website Development, and Social Media Management. We were born to digitalize local potential for global impact." ?>
                    </p>
                    <a href="about.php"
                        class="inline-flex items-center text-white border-b-2 border-ghania-orange pb-1 hover:text-ghania-orange transition-all font-semibold text-lg group">
                        <?= $t['btn_read_more'] ?>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="sec-services" class="min-h-screen flex items-center py-20 snap-section" data-target="bg-services">
        <div class="container mx-auto px-6 fade-up-enter">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4"><?= $t['nav_services'] ?></h2>
                <div class="w-24 h-1 bg-ghania-orange mx-auto rounded"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Logic Icon
                $icon_web = '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>';
                $icon_app = '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>';
                $icon_socmed = '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>';
                $icon_default = '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';

                $result = $conn->query("SELECT * FROM services");
                if ($result && $result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                        $title = ($lang_code == 'id') ? $row['title_id'] : $row['title_en'];
                        $brief = ($lang_code == 'id') ? $row['brief_id'] : $row['brief_en'];

                        $check_title = strtolower($row['title_en']);
                        if (strpos($check_title, 'website') !== false) $current_icon = $icon_web;
                        elseif (strpos($check_title, 'mobile') !== false) $current_icon = $icon_app;
                        elseif (strpos($check_title, 'social') !== false) $current_icon = $icon_socmed;
                        else $current_icon = $icon_default;
                ?>
                <div
                    class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl hover:bg-white/20 transition duration-300 group hover:-translate-y-2 flex flex-col h-full">
                    <div
                        class="w-16 h-16 bg-ghania-orange/20 rounded-full flex items-center justify-center mb-6 text-ghania-orange group-hover:bg-ghania-orange group-hover:text-white transition-all">
                        <?= $current_icon ?>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white"><?= $title ?></h3>
                    <p class="text-gray-300 text-sm mb-6 flex-grow leading-relaxed">
                        <?= substr($brief, 0, 100) . '...' ?>
                    </p>
                    <a href="service.php?slug=<?= $row['slug'] ?>"
                        class="inline-flex items-center text-ghania-orange font-semibold hover:text-white transition">
                        <?= $t['btn_read_more'] ?> <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </section>

    <section id="sec-clients" class="min-h-[60vh] flex items-center py-20 snap-section" data-target="bg-clients">
        <div class="container mx-auto px-6 fade-up-enter text-center">
            <h2 class="text-3xl font-bold text-white mb-10 uppercase tracking-widest"><?= $t['title_clients'] ?></h2>

            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/10">
                <div class="swiper clientSwiper">
                    <div class="swiper-wrapper items-center">
                        <?php for ($i = 1; $i <= 20; $i++): ?>
                        <div class="swiper-slide flex justify-center p-4">
                            <img src="assets/img/clients/client-<?= $i ?>.png"
                                class="h-12 w-auto object-contain filter brightness-0 invert opacity-60 hover:opacity-100 hover:scale-110 transition duration-300"
                                onerror="this.style.display='none'">
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sec-articles" class="min-h-screen flex items-center py-20 snap-section" data-target="bg-articles">
        <div class="container mx-auto px-6 fade-up-enter">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-white mb-2"><?= $t['title_latest_articles'] ?></h2>
                    <p class="text-gray-300"><?= $t['txt_articles'] ?></p>
                </div>
                <a href="articles.php"
                    class="hidden md:inline-flex items-center text-ghania-orange font-semibold hover:text-white mt-4 md:mt-0 transition">
                    <?= $t['btn_all_articles'] ?> &rarr;
                </a>
            </div>

            <div class="swiper articleSwiper pb-12">
                <div class="swiper-wrapper">
                    <?php
                    $res_art = $conn->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 5");
                    if ($res_art && $res_art->num_rows > 0):
                        while ($row = $res_art->fetch_assoc()):
                            if ($lang_code == 'en' && !empty($row['title_en'])) {
                                $d_title = $row['title_en'];
                                $d_content = $row['content_en'];
                            } else {
                                $d_title = $row['title_id'];
                                $d_content = $row['content_id'];
                            }
                            $thumb = !empty($row['thumbnail']) ? $row['thumbnail'] : 'https://via.placeholder.com/800x450';
                    ?>
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl overflow-hidden hover:bg-white/20 transition duration-300 h-full flex flex-col group">
                            <div class="relative h-48 overflow-hidden">
                                <img src="<?= $thumb ?>"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div
                                    class="absolute top-4 left-4 bg-ghania-orange text-white text-xs font-bold px-3 py-1 rounded-full uppercase">
                                    Blog</div>
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-xs text-gray-400 mb-2">
                                    <?= date('d M Y', strtotime($row['created_at'])) ?></div>
                                <h3
                                    class="text-lg font-bold text-white mb-3 line-clamp-2 group-hover:text-ghania-orange transition">
                                    <a href="article-detail.php?slug=<?= $row['slug'] ?>"><?= $d_title ?></a>
                                </h3>
                                <p class="text-gray-400 text-sm line-clamp-3 mb-4 flex-grow">
                                    <?= substr(strip_tags($d_content), 0, 100) . '...' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                    endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="text-center md:hidden mt-6">
                <a href="articles.php"
                    class="inline-block border border-ghania-orange text-ghania-orange px-6 py-2 rounded-full font-semibold hover:bg-ghania-orange hover:text-white transition">
                    <?= $t['btn_all_articles'] ?>
                </a>
            </div>
        </div>
    </section>

    <div class="bg-ghania-dark relative z-20">
        <?php include 'includes/footer.php'; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // 1. SCROLLYTELLING LOGIC
    const sections = document.querySelectorAll(".snap-section");
    const backgrounds = document.querySelectorAll("[id^='bg-']");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const targetBgId = entry.target.getAttribute("data-target");

                // Matikan semua background
                backgrounds.forEach(bg => {
                    bg.classList.remove("opacity-100");
                    bg.classList.add("opacity-0");
                });

                // Nyalakan background target (kecuali Hero/None)
                if (targetBgId !== "none" && targetBgId) {
                    const activeBg = document.getElementById(targetBgId);
                    if (activeBg) {
                        activeBg.classList.remove("opacity-0");
                        activeBg.classList.add("opacity-100");
                    }
                }

                // Animasi Teks
                const textContent = entry.target.querySelector(".fade-up-enter");
                if (textContent) textContent.classList.add("fade-up-active");
            }
        });
    }, {
        threshold: 0.4
    });
    sections.forEach(sec => observer.observe(sec));


    // 2. HERO SWIPER (FIX GHOSTING: fadeEffect: { crossFade: true })
    new Swiper(".heroSwiper", {
        spaceBetween: 0,
        effect: "fade",
        fadeEffect: {
            crossFade: true
        }, // ANTI GHOSTING
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        allowTouchMove: false,
    });

    // 3. CLIENT SWIPER
    new Swiper(".clientSwiper", {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        speed: 3000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false
        },
        breakpoints: {
            640: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 4
            },
            1024: {
                slidesPerView: 5
            },
        },
        allowTouchMove: false,
    });

    // 4. ARTICLE SWIPER
    new Swiper(".articleSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
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
});
</script>