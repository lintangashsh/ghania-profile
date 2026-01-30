<?php
require 'config/database.php';
require 'config/lang.php';
$page_title = ($lang_code == 'en') ? "About Us - Ghania Creative" : "Tentang Kami - Ghania Creative";
include 'includes/header.php';
include 'includes/navbar.php';

// data keseluruhan tentang kami/about us
$sections = [
    [
        'id' => 'identity',
        'img' => 'assets/img/about/scene_1.PNG',
        'title_id' => 'Perjalanan Menuju Cakrawala Digital Dunia dari Pusat Kota Medan',
        'title_en' => 'Navigating the Global Digital Frontier from the Heart of Medan',
        'content_id' => 'PT Ghania Creative Indonesia, atau yang lebih dikenal di ruang kreatif sebagai Ghania Creative Indonesia adalah manifestasi dari sebuah cita-cita besar yang lahir di jantung Kota Medan. Berdiri tegak sejak tahun 2021, kami bukan sekadar entitas bisnis; kami adalah katalisator transformasi bagi para pelaku usaha yang siap menghadapi kompleksitas era digital. Berlokasi strategis di salah satu kecamatan besar di Kota Medan, Indonesia, kami hadir sebagai mitra strategis dalam menyediakan layanan website development, mobile apps development, social media management, hingga transisi infrastruktur digital melalui server migration dari sistem on-premises menuju efisiensi cloud server.',
        'content_en' => 'PT Ghania Creative Indonesia, known within the creative sphere as Ghania Creative Indonesia, stands as the definitive manifestation of a visionary ambition conceived in the vibrant metropolis of Medan. Established in 2021, we are far more than a mere commercial entity; we are the strategic catalysts for transformation, empowering enterprises to navigate the intricate labyrinth of the digital epoch. Headquartered at one of the major subdistricts in Medan City, Indonesia, we serve as a pivotal partner in delivering bespoke website development, mobile applications, social media management, and sophisticated server migrations, transitioning legacy on-premises systems into the seamless efficiency of cloud environments.'
    ],
    [
        'id' => 'origin',
        'img' => 'assets/img/about/scene_2.PNG',
        'title_id' => 'Menjawab Keresahan di Tengah Badai Pandemi',
        'title_en' => 'A Response to Socio-Economic Unrest Amidst a Global Crisis',
        'content_id' => 'Sejarah kami tidak dimulai di ruang rapat yang mewah, melainkan dari sebuah diskusi kritis antara pendiri dan dua rekan seperjuangan. Di tahun 2021, dunia sedang dilumpuhkan oleh pandemi COVID-19. Namun, di balik krisis tersebut, kami melihat sebuah anomali: para pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) di Kota Medan memiliki semangat juang yang luar biasa namun terhambat oleh keterbatasan literasi digital. Ada sebuah jarak yang menganga antara keterbukaan pikiran para pelaku usaha terhadap teknologi dengan minimnya dukungan sistematis dari sektor publik dalam memfasilitasi digitalisasi tersebut. <br><br>Keresahan inilah yang memicu lahirnya Ghania Creative Indonesia. Kami memutuskan bahwa di saat dunia sedang berjarak secara fisik, teknologi harus menjadi jembatan. Kami memulai misi kami dari Medan, bukan sebagai pemain pertama, melainkan sebagai pemain yang paling berempati terhadap kebutuhan lokal. Fokus kami sejak awal sangat jelas: mendigitalisasi sektor UMKM yang selama ini menjadi tulang punggung ekonomi namun seringkali terlupakan dalam ekosistem teknologi tinggi.',
        'content_en' => 'Our lineage did not originate within the confines of a corporate boardroom, but rather through a rigorous, critical discourse between the founder and two pioneering associates. In 2021, the world was gripped by the paralysis of the COVID-19 pandemic. However, amidst this unprecedented upheaval, we identified a profound anomaly: the Small and Medium-Sized Enterprises (SMEs) of Medan possessed an indomitable entrepreneurial spirit, yet were stifled by a palpable digital literacy deficit. There existed a stark disparity between the burgeoning technological openness of business owners and the inadequate systematic support from the public sector in facilitating this vital digital transition. <br><br>This collective unease served as the catalyst for the founding of Ghania Creative Indonesia. We concluded that in an era defined by physical distancing, technology must serve as the ultimate bridge. We inaugurated our mission in Medan, not as a mere participant, but as a specialist uniquely attuned to local exigencies. Our objective was unequivocal: to digitalise the SME sector, the very backbone of the national economy, which had too often been marginalized within the high-technology ecosystem.'
    ],
    [
        'id' => 'expansion',
        'img' => 'assets/img/about/scene_3.PNG',
        'title_id' => 'Melintasi Batas Geografis',
        'title_en' => 'Transcending Geographical Boundaries',
        'content_id' => 'Seiring berjalannya waktu, kepercayaan yang diberikan oleh masyarakat Medan menjadi bahan bakar bagi kami untuk melangkah lebih jauh. Ghania Creative Indonesia mulai memperlebar jendela layanannya melintasi batas-batas provinsi. Dari Medan, kami merambah ke Banda Aceh, Pekanbaru, Padang, Palembang, hingga mencapai Pangkal Pinang. Perjalanan ini menyadarkan kami bahwa keresahan digital bukan hanya milik UMKM di Medan, melainkan isu nasional yang memerlukan solusi lokal berkualitas global. <br><br>Kami pun mulai membuka diri bagi berbagai sektor. Tidak hanya UMKM, kami juga mulai dipercaya oleh organisasi pendidikan, sekolah, lembaga bimbingan belajar, hingga penyedia kursus online. Kami percaya bahwa edukasi adalah fondasi dari ekonomi digital, dan memastikan infrastruktur digital mereka kokoh adalah bagian dari tanggung jawab moral kami.',
        'content_en' => 'As our reputation for excellence solidified, the trust bestowed upon us by the Medan community propelled us to venture beyond regional confines. Ghania Creative Indonesia began to extend its operational purview across provincial borders. From our base in Medan, we expanded our reach to Banda Aceh, Pekanbaru, Padang, Palembang, and eventually Pangkal Pinang. This journey underscored a vital truth: digital disenfranchisement was not merely a local concern, but a national imperative requiring local solutions underpinned by global standards. <br><br>Consequently, we diversified our portfolio to encompass a broader spectrum of sectors. Our expertise was increasingly sought after by educational institutions, schools, tutoring centres, and online course providers. We maintain the conviction that education is the bedrock of the digital economy; ensuring their digital infrastructure is robust remains a cornerstone of our professional responsibility.'
    ],
    [
        'id' => 'national',
        'img' => 'assets/img/about/scene_4.PNG',
        'title_id' => 'Jejak Langkah di Jawa & Dewata',
        'title_en' => 'The Journey through Java & Bali',
        'content_id' => 'Memasuki tahun 2023, di tengah hiruk-pikuk kondisi ekonomi nasional yang penuh tantangan, Ghania Creative Indonesia memberanikan diri melakukan ekspansi ke Pulau Jawa. Klien pertama kami di tanah Jawa berasal dari Kota Malang, sekelompok mahasiswa visioner yang ingin merintis UMKM di tengah dinamika ekonomi yang tak menentu. Keberhasilan proyek di Malang menjadi batu loncatan bagi kami untuk meluaskan jangkauan hingga ke Pulau Bali. Kepercayaan ini membuktikan bahwa dedikasi kami pada kualitas dapat diterima oleh berbagai lapisan masyarakat, dari mahasiswa hingga pengusaha mapan.',
        'content_en' => 'In 2023, amidst the complexities of a challenging national economic landscape, Ghania Creative Indonesia undertook a strategic expansion into the island of Java. Our inaugural client in Java was located in the city of Malang, a group of visionary university students determined to launch SMEs despite the prevailing economic fluctuations. The success of our endeavours in Malang served as a springboard for further expansion into Bali. This growth affirmed that our unwavering commitment to quality resonated with a diverse clientele, ranging from academic entrepreneurs to established business leaders.'
    ],
    [
        'id' => 'global',
        'img' => 'assets/img/about/scene_5.PNG',
        'title_id' => 'Melompat ke Kancah Internasional',
        'title_en' => 'The Global Horizon',
        'content_id' => 'Tahun 2024 menjadi tonggak sejarah baru. Kami memutuskan untuk membuka jendela peluang di luar batas teritorial Indonesia. Malaysia menjadi gerbang internasional pertama kami, yang kemudian disusul dengan masuknya klien-klien strategis dari Singapura dan Thailand. Keberhasilan menembus pasar Asia Tenggara ini bukan sekadar pencapaian komersial, melainkan pengakuan bahwa talenta dari Medan mampu memenuhi standar kualitas internasional yang sangat ketat. <br><br>Dengan Hingga saat ini, di awal tahun 2026, catatan sejarah kami telah diwarnai dengan keberhasilan membantu lebih dari 500 UMKM di Indonesia serta lebih dari 50 klien internasional di Singapura, Malaysia, dan Thailand. Angka ini bukan sekadar statistik bagi kami; ini adalah representasi dari ratusan impian yang berhasil kami bantu akselerasikan melalui teknologi.',
        'content_en' => 'The year 2024 heralded a momentous milestone in our corporate history as we ventured beyond the sovereign borders of Indonesia. Malaysia became our inaugural international gateway, followed by the acquisition of strategic clients in Singapore and Thailand. Successfully penetrating the Southeast Asian market was not merely a commercial triumph; it was a formal validation that talent originating from Medan could satisfy the most stringent international quality benchmarks. <br><br>As we stand at the threshold of 2026, our chronicle is distinguished by the successful empowerment of over 500 SMEs across Indonesia and more than 50 prestigious international clients in Singapore, Malaysia, and Thailand. To us, these figures are not merely cold statistics; they represent the successful acceleration of hundreds of entrepreneurial dreams through the judicious application of technology.'
    ],
    [
        'id' => 'future',
        'img' => 'assets/img/about/scene_6.PNG',
        'title_id' => 'Harmonisasi AI dan Integritas Digital',
        'title_en' => 'Harmonising Artificial Intelligence with Digital Integrity',
        'content_id' => 'Dunia kini memasuki babak baru, era Kecerdasan Buatan (AI). Ghania Creative Indonesia tidak hanya sekadar menjadi penonton. Di tahun 2026 ini, kami meluncurkan layanan inovatif terbaru kami: penjualan produk digital berbasis AI yang difokuskan pada aplikasi chatbot cerdas dan Sistem Informasi Manajemen (SIM) yang terintegrasi. Kami percaya bahwa AI adalah instrumen untuk memanusiakan teknologi, mempermudah akses informasi, dan mengoptimalkan efisiensi bisnis klien kami. <br><br>Kami berkomitmen untuk tetap rendah hati dalam pencapaian namun tetap agresif dalam inovasi. Kami akan terus membawa potensi lokal ke tingkat yang lebih tinggi, sesuai dengan moto yang senantiasa menjiwai setiap baris kode yang kami tulis… <br><br><span class="block font-bold italic text-ghania-orange text-xl">"Bringing your local potential to global impact!"</span>',
        'content_en' => 'The global landscape has entered a transformative new chapter, the era of Artificial Intelligence (AI). Ghania Creative Indonesia refuses to be a mere spectator in this revolution. In 2026, we are proud to unveil our latest suite of innovative services: bespoke AI-driven digital products, focusing on sophisticated intelligent chatbots and integrated Management Information Systems (MIS). We believe that AI is the definitive instrument for humanising technology, streamlining information accessibility, and optimising operational efficiency for our clientele. <br><br>We remain steadfast in our commitment to humility in achievement, yet aggressive in our pursuit of innovation. We shall continue to elevate local potential to unprecedented heights, guided by the ethos that permeates every line of code we craft… <br><br><span class="block font-bold italic text-ghania-orange text-xl">"Bringing your local potential to global impact!"</span>'
    ]
];

$contact_bg = "assets/img/about/scene_7.PNG";
?>


<style>
html,
body {
    scrollbar-width: none !important;
    -ms-overflow-style: none !important;
    overflow-y: scroll;
}

body::-webkit-scrollbar {
    display: none !important;
}

/* LOGIC NAVBAR KHUSUS */
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

/* Override Background Saat Scroll */
#navbar.bg-white\/95 {
    background-color: rgba(0, 0, 0, 0.5) !important;
    backdrop-filter: blur(8px) !important;
    box-shadow: none !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
}

/* Padding Navbar */
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
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>
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
                <span class="text-white/50 uppercase tracking-widest text-sm">
                    <?= ($lang_code == 'en') ? "Our Journey" : "Perjalanan Kami" ?>
                </span>
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

    <!-- section collaboration form -->
    <section id="sec-contact" class="min-h-screen flex items-center justify-center px-4 py-20 snap-section"
        data-target="bg-contact">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center fade-up-enter">

            <div class="text-white space-y-8">
                <div>
                    <span class="text-ghania-orange font-bold tracking-widest uppercase mb-2 block">Collaboration</span>
                    <h2 class="text-4xl md:text-6xl font-bold leading-tight">
                        <?= ($lang_code == 'en') ? "Ready to Start<br>Your Digital Transformation?" : "Siap Memulai<br>Transformasi Digital Anda?" ?>
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
                            <p class="text-xs text-gray-400 uppercase">
                                <?= ($lang_code == 'en') ? "Email Us" : "Email kepada Kami" ?></p>
                            <p class="text-xl font-semibold">hello@ghaniacreative.id</p>
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
                        placeholder="<?= ($lang_code == 'en') ? "Your Full Name" : "Nama Lengkap Anda" ?>">
                    <input type=" email"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange"
                        placeholder="<?= ($lang_code == 'en') ? "Email Address" : "Alamat Email Anda" ?>">
                    <textarea rows="3"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange"
                        placeholder="<?= ($lang_code == 'en') ? "Tell us What You Need..." : "Beritahu Kami Apa Yang Anda Butuhkan..." ?>"></textarea>
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