<?php
require 'config/database.php';
require 'config/lang.php';

$page_title = ($lang_code == 'en') ? "About Us - Ghania Creative" : "Tentang Kami - Ghania Creative";
include 'includes/header.php';
include 'includes/navbar.php';

// --- DATA NASKAH ---
$sections = [
    [
        'id' => 'identity',
        'img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1920&auto=format&fit=crop',
        'title_id' => 'Perjalanan Menuju Cakrawala Digital Dunia',
        'title_en' => 'Navigating the Global Digital Frontier',
        'content_id' => 'PT Ghania Creative Indonesia adalah manifestasi dari sebuah cita-cita besar yang lahir di jantung Kota Medan. Berdiri tegak sejak tahun 2021, kami bukan sekadar entitas bisnis; kami adalah katalisator transformasi bagi para pelaku usaha. Berlokasi strategis di Medan, kami hadir sebagai mitra strategis dalam layanan website, mobile apps, hingga transisi cloud server.',
        'content_en' => 'PT Ghania Creative Indonesia stands as the definitive manifestation of a visionary ambition conceived in the vibrant metropolis of Medan. Established in 2021, we are strategic catalysts for transformation. Headquartered in Medan, we serve as a pivotal partner in delivering bespoke website development, mobile apps, and sophisticated server migrations.'
    ],
    [
        'id' => 'origin',
        'img' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1920&auto=format&fit=crop',
        'title_id' => 'Menjawab Keresahan di Tengah Badai',
        'title_en' => 'A Response to Socio-Economic Unrest',
        'content_id' => 'Sejarah kami bermula dari diskusi kritis di tengah kelumpuhan pandemi COVID-19 tahun 2021. Kami melihat anomali: UMKM Medan punya semangat juang tinggi namun terhambat literasi digital. Keresahan inilah yang memicu lahirnya Ghania Creative Indonesia. Kami memutuskan bahwa di saat dunia berjarak fisik, teknologi harus menjadi jembatan.',
        'content_en' => 'Our lineage began amidst the paralysis of the COVID-19 pandemic in 2021. We identified a profound anomaly: SMEs in Medan possessed indomitable spirit yet were stifled by a digital literacy deficit. This unease sparked the birth of Ghania Creative Indonesia. We concluded that in an era of physical distancing, technology must serve as the ultimate bridge.'
    ],
    [
        'id' => 'expansion',
        'img' => 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?q=80&w=1920&auto=format&fit=crop',
        'title_id' => 'Melintasi Batas Geografis',
        'title_en' => 'Transcending Geographical Boundaries',
        'content_id' => 'Kepercayaan masyarakat Medan menjadi bahan bakar kami. Dari Medan, kami merambah ke Banda Aceh, Pekanbaru, Padang, Palembang, hingga Pangkal Pinang. Kami sadar keresahan digital adalah isu nasional. Kami pun mulai dipercaya oleh sektor pendidikan, memastikan infrastruktur digital mereka kokoh adalah tanggung jawab moral kami.',
        'content_en' => 'Trust from the Medan community propelled us further. From Medan, we expanded to Banda Aceh, Pekanbaru, Padang, Palembang, and Pangkal Pinang. This journey underscored that digital disenfranchisement is a national imperative. We diversified into the education sector, believing that robust digital infrastructure is our professional responsibility.'
    ],
    [
        'id' => 'national',
        'img' => 'https://images.unsplash.com/photo-1596401057633-565652b8ddbe?q=80&w=1920&auto=format&fit=crop',
        'title_id' => 'Jejak Langkah di Jawa & Dewata',
        'title_en' => 'The Journey through Java & Bali',
        'content_id' => 'Tahun 2023, kami ekspansi ke Pulau Jawa. Klien pertama kami adalah mahasiswa visioner di Malang. Keberhasilan ini menjadi batu loncatan hingga ke Pulau Bali. Ini membuktikan dedikasi kami pada kualitas dapat diterima berbagai lapisan, dari mahasiswa hingga pengusaha mapan.',
        'content_en' => 'In 2023, we expanded into Java. Our inaugural client was a group of visionary students in Malang. This success springboarded us to Bali. This growth affirmed that our unwavering commitment to quality resonated with a diverse clientele, from academic entrepreneurs to established business leaders.'
    ],
    [
        'id' => 'global',
        'img' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=1920&auto=format&fit=crop',
        'title_id' => 'Melompat ke Kancah Internasional',
        'title_en' => 'The Global Horizon',
        'content_id' => 'Tahun 2024 menjadi tonggak sejarah. Malaysia menjadi gerbang internasional pertama, disusul Singapura dan Thailand. Ini validasi bahwa talenta Medan mampu memenuhi standar global. Di awal 2026, kami telah membantu 500+ UMKM dan 50+ klien internasional. Ini adalah representasi ratusan impian yang berhasil kami akselerasikan.',
        'content_en' => '2024 heralded a momentous milestone. Malaysia became our gateway, followed by Singapore and Thailand. This validated that Medan talent satisfies stringent international benchmarks. By 2026, we have empowered 500+ SMEs and 50+ international clients. These figures represent hundreds of dreams accelerated through technology.'
    ],
    [
        'id' => 'future',
        'img' => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?q=80&w=1920&auto=format&fit=crop',
        'title_id' => 'Masa Depan: Harmonisasi AI',
        'title_en' => 'The Future: Harmonising AI',
        'content_id' => 'Dunia memasuki era AI. Di 2026 ini, kami meluncurkan layanan produk digital berbasis AI: chatbot cerdas dan Sistem Informasi Manajemen terintegrasi. Kami percaya AI memanusiakan teknologi. Kami berkomitmen membawa potensi lokal ke tingkat lebih tinggi: "Bringing your local potential to global impact!"',
        'content_en' => 'The world has entered the AI era. In 2026, we unveil AI-driven digital products: intelligent chatbots and integrated MIS. We believe AI humanises technology. We remain committed to elevating local potential: "Bringing your local potential to global impact!"'
    ]
];

$contact_bg = "https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1920&auto=format&fit=crop";
?>

<style>
/* HIDE SCROLLBAR */
html,
body {
    scrollbar-width: none !important;
    -ms-overflow-style: none !important;
    overflow-y: scroll;
}

body::-webkit-scrollbar {
    display: none !important;
}

/* === LOGIKA NAVBAR KHUSUS === */

/* 1. Paksa Teks Selalu Putih (Walaupun discroll) */
.nav-link,
.lang-link {
    color: #ffffff !important;
}

.nav-link:hover,
.lang-link:hover {
    color: #FF6600 !important;
}

/* Logo selalu putih */
#nav-logo {
    filter: brightness(0) invert(1) !important;
}

/* 2. Override Background Saat Scroll */
/* Saat navbar.php mendeteksi scroll, dia nambahin class 'bg-white/95'. */
/* Kita timpa class itu khusus di halaman ini menjadi Hitam 50%. */
#navbar.bg-white\/95 {
    background-color: rgba(0, 0, 0, 0.5) !important;
    /* Hitam Transparan 50% */
    backdrop-filter: blur(8px) !important;
    /* Blur biar makin estetik */
    box-shadow: none !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
    /* Garis tipis biar tegas */
}

/* 3. Padding Navbar */
#navbar {
    transition: background-color 0.5s ease, padding 0.3s ease;
}

/* Animasi Teks */
.fade-up-enter {
    opacity: 0;
    transform: translateY(40px);
    transition: all 1s ease-out;
}

.fade-up-active {
    opacity: 1;
    transform: translateY(0);
}
</style>

<div class="fixed inset-0 w-full h-full z-0 bg-black">
    <?php foreach ($sections as $index => $section): ?>
    <div id="bg-<?= $section['id'] ?>"
        class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out <?= $index === 0 ? 'opacity-50' : 'opacity-0' ?>">
        <img src="<?= $section['img'] ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/95 via-black/70 to-black/30"></div>
    </div>
    <?php endforeach; ?>

    <div id="bg-contact" class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0">
        <img src="<?= $contact_bg ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-black/40"></div>
    </div>
</div>

<div class="relative z-10">
    <div class="h-20"></div>

    <?php foreach ($sections as $index => $section): ?>
    <section id="sec-<?= $section['id'] ?>"
        class="min-h-screen flex items-center justify-start px-6 md:px-24 lg:px-32 py-20 snap-section"
        data-target="bg-<?= $section['id'] ?>">

        <div class="max-w-4xl w-full fade-up-enter">
            <div class="flex items-center space-x-4 mb-6">
                <span
                    class="text-ghania-orange font-mono text-xl md:text-2xl font-bold tracking-widest">0<?= $index + 1 ?></span>
                <div class="h-px w-12 bg-white/30"></div>
                <span class="text-white/50 uppercase tracking-widest text-sm">Our Journey</span>
            </div>

            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-8 leading-tight drop-shadow-lg">
                <?= ($lang_code == 'en') ? $section['title_en'] : $section['title_id'] ?>
            </h2>

            <div
                class="bg-white/5 backdrop-blur-md border-l-4 border-ghania-orange p-6 md:p-10 rounded-r-2xl shadow-2xl hover:bg-white/10 transition duration-500">
                <p class="text-gray-200 text-lg md:text-xl leading-relaxed font-light text-justify">
                    <?= ($lang_code == 'en') ? $section['content_en'] : $section['content_id'] ?>
                </p>
            </div>
        </div>

    </section>
    <?php endforeach; ?>

    <section id="sec-contact" class="min-h-screen flex items-center justify-center px-4 py-20 snap-section"
        data-target="bg-contact">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center fade-up-enter">

            <div class="text-white space-y-8">
                <div>
                    <span class="text-ghania-orange font-bold tracking-widest uppercase mb-2 block">Collaboration</span>
                    <h2 class="text-4xl md:text-6xl font-bold leading-tight">
                        <?= ($lang_code == 'en') ? "Ready to Start Your<br>Digital Transformation?" : "Siap Memulai<br>Transformasi Digital?" ?>
                    </h2>
                </div>
                <p class="text-gray-300 text-lg leading-relaxed">
                    <?= ($lang_code == 'en') ? "We are ready to listen, analyze, and provide the best technological solutions for you." : "Kami siap mendengar, menganalisa, dan memberikan solusi teknologi terbaik untuk Anda." ?>
                </p>
                <div class="space-y-4 pt-4">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-12 h-12 bg-ghania-orange rounded-full flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase">Email Us</p>
                            <p class="text-xl font-semibold">hello@ghaniacreative.com</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center text-white"><svg
                                class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg></div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase">WhatsApp</p>
                            <p class="text-xl font-semibold">+62 812 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-2xl transform hover:scale-[1.02] transition duration-300">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">
                    <?= ($lang_code == 'en') ? "Free Consultation" : "Konsultasi Gratis" ?></h3>
                <form action="#" method="POST" class="space-y-5">
                    <input type="text"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange"
                        placeholder="Nama Lengkap">
                    <input type="email"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange"
                        placeholder="Email Bisnis">
                    <textarea rows="3"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange"
                        placeholder="Ceritakan kebutuhan Anda..."></textarea>
                    <button type="submit"
                        class="w-full bg-ghania-orange text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition shadow-lg transform hover:-translate-y-1"><?= ($lang_code == 'en') ? "Send Message" : "Kirim Pesan" ?></button>
                </form>
            </div>
        </div>
    </section>

    <div class="bg-ghania-dark relative z-20">
        <?php include 'includes/footer.php'; ?>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll(".snap-section");
    const backgrounds = document.querySelectorAll("[id^='bg-']");
    const observerOptions = {
        root: null,
        threshold: 0.4
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const targetBgId = entry.target.getAttribute("data-target");
                backgrounds.forEach(bg => {
                    bg.classList.remove("opacity-50");
                    bg.classList.add("opacity-0");
                });
                const activeBg = document.getElementById(targetBgId);
                if (activeBg) {
                    activeBg.classList.remove("opacity-0");
                    activeBg.classList.add("opacity-50");
                }
                const textContent = entry.target.querySelector(".fade-up-enter");
                if (textContent) textContent.classList.add("fade-up-active");
            }
        });
    }, observerOptions);
    sections.forEach((section) => observer.observe(section));
});
</script>