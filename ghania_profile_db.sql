-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2026 at 07:53 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghania_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `title_id` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content_id` longtext,
  `content_en` longtext,
  `views` int DEFAULT '0',
  `author_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `slug`, `title_id`, `title_en`, `meta_description`, `meta_keywords`, `thumbnail`, `content_id`, `content_en`, `views`, `author_id`, `created_at`) VALUES
(1, 'dari-medan-untuk-dunia-visi-pt-ghania-creative-indonesia-dalam-ekonomi-digital', 'Dari Medan, untuk Dunia! Visi PT Ghania Creative Indonesia dalam Ekonomi Digital', 'From Medan, to the World! PT Ghania Creative Indonesia\'s Vision in the Digital Economy', 'Kenali PT Ghania Creative Indonesia, digital agency asal Medan yang membawa talenta lokal ke kancah internasional (Singapura, Malaysia, Thailand).', 'PT Ghania Creative Indonesia, Digital Agency Medan, Profil Perusahaan Digital Agency, Jasa Website Medan, Creative Agency Indonesia, Digital Agency Medan, Digital Agency Company Profile, Website Services Medan, Creative Agency Indonesia', 'assets/uploads/697a792fa4bc1.png', '<p><strong>Bukan Sekadar Kode, Tapi Sebuah Cerita dari Medan</strong><br>Pernah terpikir nggak, kalau dari sebuah sudut di Kota Medan, kita bisa menciptakan gelombang digital yang dampaknya terasa sampai ke Singapura, Malaysia, hingga Thailand?<br>Mungkin bagi sebagian orang, Medan lebih dikenal dengan kulinernya yang juara atau logatnya yang tegas. Tapi bagi kami di PT Ghania Creative Indonesia, Medan adalah titik nol dari sebuah mimpi besar: membuktikan bahwa talenta kreatif dari Sumatera Utara punya kualitas yang \"bukan kaleng-kaleng\" di mata dunia.<br>Kami memulai perjalanan ini dengan satu keyakinan sederhana: Digitalisasi adalah hak semua orang. Mulai dari abang-abang pemilik UMKM di pajak (pasar), founder startup di Jakarta, hingga pengusaha di Orchard Road, semuanya butuh jembatan digital yang kokoh. Dan kami di sini untuk membangun jembatan itu.</p>\r\n<p><strong>Kenapa Harus \"Ghania Creative Indonesia\"?</strong><br>Nama perusahaan kami bukan sekadar deretan kata tanpa makna. Ada doa dan ambisi di sana. Kami ingin menjadi representasi Indonesia yang kreatif, solutif, dan kompetitif.<br>Sebagai sebuah Digital Agency, kami bergerak di tiga pilar utama:</p>\r\n<ol>\r\n<li>Penyedia &amp; Maintenance Website: Kami percaya website adalah rumah digital. Rumah yang bukan cuma harus cantik dilihat, tapi juga harus aman, cepat, dan nggak gampang \"rubuh\" (alias down).</li>\r\n<li>Mobile Apps Development: Di zaman sekarang, semua orang hidup di smartphone. Kami bantu bisnis Anda masuk ke kantong pelanggan lewat aplikasi yang user-friendly.</li>\r\n<li>Social Media Management: Kami mengelola narasi. Kami memastikan brand Anda punya \"suara\" yang didengar di tengah hiruk-pikuk konten media sosial saat ini.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Standar Global dengan Hati Lokal</strong><br>Kenapa klien dari Singapura, Malaysia, dan Thailand mau mempercayakan aset digital mereka kepada tim dari Medan? Jawabannya ada pada komitmen terhadap kualitas.<br>Di PT Ghania Creative Indonesia, kami nggak pernah membeda-bedakan klien. Mau Anda adalah pemilik usaha kecil yang baru mulai merintis, atau perusahaan besar yang sudah punya nama, standar pengerjaan kami tetap sama: Global Standard. Kami menerapkan teknologi terbaru, desain yang fresh (atau yang anak zaman sekarang bilang \"Slay\"), dan strategi SEO yang tajam. Namun, kami tetap membawa nilai-nilai lokal: kejujuran dalam berkomunikasi, kerja keras yang gigih, dan sifat rendah hati namun tetap percaya diri dengan hasil karya kami (low profile, high impact).</p>\r\n<p><strong>Melampaui Batas Geografis</strong><br>Dalam beberapa tahun terakhir, kami beruntung bisa bekerja sama dengan berbagai entitas lintas negara. Pengalaman melayani klien internasional memberikan kami perspektif baru tentang bagaimana ekonomi digital bekerja di Asia Tenggara.<br>Kami belajar bahwa setiap negara punya keunikan masing-masing. Strategi digital untuk pasar di Bangkok tentu berbeda dengan di Kuala Lumpur atau Medan. Kemampuan adaptasi inilah yang menjadi senjata rahasia PT Ghania Creative Indonesia. Kami bukan cuma \"tukang bikin website\", kami adalah partner diskusi yang paham dinamika pasar global.</p>\r\n<p><strong>Untuk UMKM: Ayo Naik Kelas bareng Kami!</strong><br>Kami sering mendengar keluhan, \"Duh, bikin website atau aplikasi itu mahal ya?\" atau \"Media sosial itu buat anak muda aja.\" Di sini, PT Ghania ingin mematahkan stigma itu. Kami ingin merangkul teman-teman UMKM, khususnya di Sumatera Utara, untuk berani melangkah. Dunia digital itu luas banget, dan sayang kalau produk keren Anda cuma dikenal di lingkungan sekitar saja. Dengan strategi digital yang tepat, produk UMKM Medan bisa lho dipesan oleh orang di Singapura dengan sekali klik. Kami siap jadi mentor dan eksekutor digital Anda.</p>\r\n<p><strong>Visi ke Depan: Menjadi Hub Digital Asia Tenggara dari Medan</strong><br>Mimpi kami belum selesai. Kami ingin menjadikan PT Ghania Creative Indonesia sebagai bukti nyata bahwa untuk menjadi pemain global, kita nggak harus selalu pindah ke ibu kota. Kita bisa membangun ekosistem yang hebat tepat di mana kita berpijak.<br>Kami ingin terus menciptakan lapangan kerja bagi talenta-talenta kreatif di Medan, melatih mereka dengan standar internasional, dan bersama-sama membawa nama Indonesia harum di kancah ekonomi digital dunia.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>Mari Berkolaborasi!</strong></em><br>Artikel ini bukan sekadar profil perusahaan yang kaku. Ini adalah undangan terbuka bagi Anda; para pemangku kepentingan, calon partner, atau Anda yang baru saja memulai bisnis.<br>Dunia digital mungkin terasa rumit dan berubah terlalu cepat, tapi Anda nggak harus menghadapinya sendirian. PT Ghania Creative Indonesia ada di sini sebagai teman perjalanan bisnis Anda. Kita mulai dari diskusi santai, kita bangun fondasi digitalnya, dan kita rayakan kesuksesannya bersama.</p>', '<p><strong>Not Just Code, But a Story from Medan</strong><br>Have you ever thought that from a corner of Medan, we could create a digital wave that would have an impact all the way to Singapore, Malaysia, and Thailand?<br>For some, Medan may be better known for its world-class cuisine or its distinctive dialect. But for us at PT Ghania Creative Indonesia, Medan is the starting point of a grand vision: to prove that the creative talent from North Sumatra holds its own on the global stage.<br>We embarked on this journey with one simple belief: Digitalisation is a right for everyone. From small business owners in the market, startup founders in Jakarta, to entrepreneurs on Orchard Road, everyone needs a solid digital bridge. And we are here to build that bridge.</p>\r\n<p><strong>Why &lsquo;Ghania Creative Indonesia&rsquo;?</strong><br>Our company name is not just a meaningless string of words. There is a prayer and ambition behind it. We want to be a representation of Indonesia that is creative, solution-oriented, and competitive.&nbsp;As a Digital Agency, we operate in three main pillars:</p>\r\n<ol>\r\n<li>Website Provider &amp; Maintenance: We believe that a website is a digital home. A home that is not only beautiful to look at, but also secure, fast, and not easily &lsquo;crashed&rsquo; (aka down).</li>\r\n<li>Mobile Apps Development: In this day and age, everyone lives on their smartphones. We help your business reach customers through user-friendly applications.</li>\r\n<li>Social Media Management: We manage narratives. We ensure your brand has a &lsquo;voice&rsquo; that is heard amid the hustle and bustle of today\'s social media content.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><strong>Global Standards with a Local Heart</strong><br>Why would clients from Singapore, Malaysia, and Thailand entrust their digital assets to a team from Medan? The answer lies in our commitment to quality.<br>At PT Ghania Creative Indonesia, we never discriminate between clients. Whether you are a small business owner just starting out or a large, well-established company, our work standards remain the same: Global Standard. We apply the latest technology, fresh designs (or what the younger generation calls &lsquo;Slay&rsquo;), and sharp SEO strategies. However, we still uphold local values: honesty in communication, persistent hard work, and humility while remaining confident in our work (low profile, high impact).</p>\r\n<p><strong>Transcending Geographical Boundaries</strong><br>In recent years, we have been fortunate to work with various entities across countries. Serving international clients has given us a new perspective on how the digital economy works in Southeast Asia.<br>We have learned that each country has its own unique characteristics. The digital strategy for the market in Bangkok is certainly different from that in Kuala Lumpur or Medan. This adaptability is the secret weapon of PT Ghania Creative Indonesia. We are not just &lsquo;website builders&rsquo;; we are discussion partners who understand the dynamics of the global market.</p>\r\n<p><strong>For MSMEs: Let\'s move up a class together!</strong><br>We often hear complaints such as, &lsquo;Gosh, building a website or application is expensive, isn\'t it?&rsquo; or &lsquo;Social media is only for young people.&rsquo; Here, PT Ghania wants to break that stigma. We want to embrace our friends in MSMEs, especially in North Sumatra, to dare to take a step forward. The digital world is vast, and it would be a shame if your amazing products were only known locally. With the right digital strategy, SME products from Medan can be ordered by people in Singapore with just one click. We are ready to be your digital mentor and executor.</p>\r\n<p><strong>Future Vision: Becoming Southeast Asia\'s Digital Hub from Medan</strong><br>Our dream is not yet complete. We want to make PT Ghania Creative Indonesia a living proof that to become a global player, we don\'t always have to move to the capital city. We can build a great ecosystem right where we stand.<br>We want to continue creating job opportunities for creative talents in Medan, train them to international standards, and together bring Indonesia\'s name to prominence in the global digital economy.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>Let\'s Collaborate!</strong></em><br>This article is not just a rigid company profile. It is an open invitation to you; stakeholders, potential partners, or those of you who are just starting a business.<br>The digital world may seem complicated and change too quickly, but you don\'t have to face it alone. PT Ghania Creative Indonesia is here as your business journey companion. We start with casual discussions, build the digital foundation, and celebrate the success together.</p>', 19, 1, '2025-12-31 21:01:35'),
(2, 'mengapa-digital-agency-di-medan-menjadi-kunci-ekspansi-bisnis-ke-asia-tenggara-', 'Mengapa Digital Agency di Medan Menjadi Kunci Ekspansi Bisnis ke Asia Tenggara?', 'Why are digital agencies in Medan key to business expansion in Southeast Asia?', 'Ghania Creative Indonesia: Solusi digital agency Medan untuk ekspansi bisnis ke pasar Asia Tenggara.', 'Digital Agency Medan, Ekspansi Bisnis Asia Tenggara, Jasa Website Medan, Transformasi Digital, Medan Digital Agency, Southeast Asia Business Expansion, Medan Website Services, Digital Transformation', 'assets/uploads/697a8c55e2a0e.png', '<p><strong>Medan dalam Peta Digital Asia Tenggara 2026</strong><br>Dunia bisnis tidak lagi dibatasi oleh pagar administratif. Di era ekonomi digital 2026, pusat inovasi mulai bergeser dari ibu kota besar menuju hub regional yang lebih strategis. Bagi pemilik bisnis di Sumatera Utara serta investor dari Singapura dan Malaysia, Kota Medan kini muncul sebagai titik saraf digital baru di sepanjang Selat Malaka.<br>Pertanyaannya bukan lagi \"mengapa harus digital?\", melainkan \"bagaimana bisnis saya bisa menembus pasar internasional dari Medan?\" Jawabannya terletak pada sinergi letak geografis dan infrastruktur digital yang solid. Di sinilah PT Ghania Creative Indonesia berperan sebagai jembatan strategis Anda.</p>\r\n<p><strong>Medan: Gerbang Strategis Selat Malaka</strong><br>Secara geopolitik, Medan adalah pintu gerbang Indonesia yang paling dekat dengan pusat ekonomi Singapura, Kuala Lumpur, dan Bangkok. Kedekatan ini memberikan dua keuntungan kompetitif bagi bisnis Anda:</p>\r\n<ol>\r\n<li>Kedekatan Kultural: Pebisnis di Medan memiliki kesamaan etos kerja dan selera visual dengan pasar semenanjung Malaysia dan Singapura. Hal ini memudahkan proses lokalisasi konten agar lebih relevan di mata audiens mancanegara.</li>\r\n<li>Efisiensi Operasional: Berkolaborasi dengan digital agency di Medan menawarkan rasio value-for-money yang kompetitif. Anda mendapatkan kualitas output berstandar global dengan biaya operasional yang jauh lebih efisien dibandingkan agensi di Singapura atau Jakarta.</li>\r\n</ol>\r\n<p><strong>Digitalisasi sebagai Instrumen Kepercayaan Global</strong><br>Untuk pasar internasional, kredibilitas bisnis Anda tidak dinilai dari megahnya kantor fisik, melainkan dari kualitas \"rumah digital\" Anda. Website perusahaan adalah representasi utama profesionalisme Anda.</p>\r\n<ul>\r\n<li>Website &amp; Keamanan Data (Cyber Security) Pasar luar negeri sangat menjunjung tinggi privasi data. PT Ghania Creative Indonesia membangun infrastruktur digital yang tidak hanya estetik, tapi juga patuh pada standar keamanan internasional. Website yang kami bangun dirancang untuk menangani transaksi lintas mata uang dan memiliki kecepatan akses (latency) rendah agar tetap responsif saat diakses dari berbagai negara di Asia Tenggara.</li>\r\n<li>Mobile Apps: Penetrasi Pasar Mobile-First Asia Tenggara adalah wilayah dengan pertumbuhan pengguna smartphone tercepat. Kami membantu bisnis Anda masuk ke dalam kantong pelanggan melalui aplikasi mobile yang fungsional, mempermudah loyalitas dan transaksi tanpa batas geografis.</li>\r\n</ul>\r\n<p><strong>Pilar Strategis PT Ghania Creative Indonesia</strong><br>Kami tidak menggunakan pendekatan one-size-fits-all. Strategi kami berakar pada tiga pilar utama untuk memastikan keberhasilan ekspansi Anda:</p>\r\n<ol>\r\n<li>Analisis Pasar Regional: Kami melakukan riset kata kunci (SEO) spesifik untuk setiap negara target, memastikan produk Anda muncul di halaman pertama mesin pencari di Singapura, Malaysia, maupun Thailand.</li>\r\n<li>Maintenance Berkelanjutan: Bisnis digital tidak pernah tidur. Kami menyediakan layanan pemeliharaan rutin untuk menjamin aset digital Anda tetap aman, cepat, dan selalu online 24/7.</li>\r\n<li>Social Media Management Berbasis Data: Kami mengelola narasi brand Anda agar sesuai dengan psikologi audiens lintas umur, mulai dari Gen Z hingga pengambil keputusan senior.</li>\r\n</ol>\r\n<p><strong>Transformasi UMKM: Dari Lokal Menjadi Regional</strong><br>Sumatera Utara memiliki potensi produk luar biasa yang sering kali terhenti di pasar lokal. Transformasi digital adalah cara tercepat bagi UMKM untuk \"naik kelas\".<br>Visi kami di PT Ghania Creative Indonesia adalah mendobrak stigma bahwa teknologi tinggi hanya milik perusahaan besar. Dengan sistem digital yang tepat, sebuah UMKM di Medan kini bisa memiliki sistem pemesanan yang dapat diakses oleh pelanggan di Kuala Lumpur dengan sekali klik. Kami hadir sebagai eksekutor sekaligus mentor digital Anda.</p>\r\n<p><strong>Masa Depan adalah Kolaborasi Digital</strong><br>Ekspansi ke Asia Tenggara bukan lagi sekadar impian. Jarak antara Medan dengan Singapura kini hanya sejauh satu klik di layar ponsel. Namun, untuk memenangkan persaingan, Anda membutuhkan infrastruktur yang tangguh dan partner yang memahami dinamika pasar regional.</p>\r\n<p>PT Ghania Creative Indonesia berkomitmen untuk terus berinovasi, mengintegrasikan teknologi terbaru seperti AI untuk memastikan bisnis Anda tetap relevan. Kami bukan sekadar vendor, kami adalah partner pertumbuhan Anda.<br>Apakah bisnis Anda sudah siap untuk ditemukan oleh dunia? Mari bangun fondasi digital yang kuat bersama kami.</p>\r\n<p><br><em><strong>PT Ghania Creative Indonesia: Bringing Your Local Potential to Global Impact.</strong></em></p>', '<p><strong>Medan on the 2026 Digital Map of Southeast Asia</strong><br>The business world is no longer limited by administrative boundaries. In the digital economy of 2026, innovation centres are shifting from major capitals to more strategic regional hubs. For business owners in North Sumatra and investors from Singapore and Malaysia, the city of Medan is emerging as a new digital nerve centre along the Malacca Strait.<br>The question is no longer &lsquo;why go digital?&rsquo;, but rather &lsquo;how can my business penetrate international markets from Medan?&rsquo; The answer lies in the synergy of geographical location and solid digital infrastructure. This is where PT Ghania Creative Indonesia plays its role as your strategic bridge.</p>\r\n<p><strong>Medan: The Strategic Gateway to the Malacca Strait</strong><br>Geopolitically, Medan is Indonesia\'s closest gateway to the economic centres of Singapore, Kuala Lumpur, and Bangkok. This proximity offers two competitive advantages for your business:</p>\r\n<ol>\r\n<li>Cultural Proximity: Businesspeople in Medan share similar work ethics and visual preferences with the markets of Peninsular Malaysia and Singapore. This facilitates the localisation of content to make it more relevant to international audiences.</li>\r\n<li>Operational Efficiency: Collaborating with a digital agency in Medan offers a competitive value-for-money ratio. You get global-standard output quality at a much more efficient operational cost compared to agencies in Singapore or Jakarta.</li>\r\n</ol>\r\n<p><strong>Digitalisation as an Instrument of Global Trust</strong><br>For the international market, your business credibility is not judged by the grandeur of your physical office, but by the quality of your &lsquo;digital home&rsquo;. Your company website is the primary representation of your professionalism.</p>\r\n<ul>\r\n<li>Website &amp; Data Security (Cyber Security) Foreign markets highly value data privacy. PT Ghania Creative Indonesia builds digital infrastructure that is not only aesthetically pleasing but also complies with international security standards. The websites we build are designed to handle cross-currency transactions and have low latency to remain responsive when accessed from various countries in Southeast Asia.</li>\r\n<li>Mobile Apps: Mobile-First Market Penetration Southeast Asia is the region with the fastest growth in smartphone users. We help your business reach customers through functional mobile applications, facilitating loyalty and transactions without geographical boundaries.</li>\r\n</ul>\r\n<p><strong>PT Ghania Creative Indonesia\'s Strategic Pillars</strong><br>We do not use a one-size-fits-all approach. Our strategy is rooted in three main pillars to ensure the success of your expansion:</p>\r\n<ol>\r\n<li>Regional Market Analysis: We conduct specific keyword research (SEO) for each target country, ensuring your products appear on the first page of search engines in Singapore, Malaysia, and Thailand.</li>\r\n<li>Ongoing Maintenance: Digital businesses never sleep. We provide routine maintenance services to ensure your digital assets remain secure, fast, and always online 24/7.</li>\r\n<li>Data-Driven Social Media Management: We manage your brand narrative to align with the psychology of audiences across all ages, from Gen Z to senior decision-makers.</li>\r\n</ol>\r\n<p><strong>MSME Transformation: From Local to Regional</strong><br>North Sumatra has extraordinary product potential that often stops at the local market. Digital transformation is the fastest way for MSMEs to &lsquo;move up a class&rsquo;.<br>Our vision at PT Ghania Creative Indonesia is to break the stigma that high technology is only for large companies. With the right digital system, an SME in Medan can now have an ordering system that is accessible to customers in Kuala Lumpur with just one click. We are here as your digital executor and mentor.</p>\r\n<p><strong>The Future is Digital Collaboration</strong><br>Expanding into Southeast Asia is no longer just a dream. The distance between Medan and Singapore is now just a click away on your mobile screen. However, to win the competition, you need robust infrastructure and a partner who understands the dynamics of the regional market.</p>\r\n<p>PT Ghania Creative Indonesia is committed to continuous innovation, integrating the latest technologies such as AI to ensure your business remains relevant. We are not just a vendor; we are your growth partner.<br>Is your business ready to be discovered by the world? Let\'s build a strong digital foundation together.</p>\r\n<p><br><em><strong>PT Ghania Creative Indonesia: Bringing Your Local Potential to Global Impact.</strong></em></p>', 14, 1, '2026-01-10 17:00:00'),
(10, 'menghadapi-era-ai-bagaimana-digital-agency-membantu-bisnis-anda-beradaptasi', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', 'Facing the Age of AI: How Digital Agencies Help Your Business Adapt', 'Optimalkan bisnis Anda melalui integrasi AI dan inovasi digital bersama PT Ghania Creative Indonesia.', 'Artificial Intelligence (AI) for Business, Digital Innovation, Digital Agency 2026, Business Automation, Digital Agency Medan, Southeast Asia Business Expansion, Website Services Medan, Digital Transformation, Artificial Intelligence', 'assets/uploads/697b9230c0ae5.png', '<p><strong>Disrupsi atau Adaptasi: Realitas AI di Tahun 2026</strong></p>\r\n<p>Kita tidak lagi berada di era di mana Kecerdasan Buatan (AI) adalah sekadar topik fiksi ilmiah. Di tahun 2026, AI telah menjadi infrastruktur dasar yang mendikte efisiensi industri digital. Namun, bagi para pelaku bisnis di rentang usia 17-35 tahun (para digital natives yang kritis) tantangannya bukan lagi \"apa itu AI?\", melainkan <em><strong>\"bagaimana cara mengintegrasikan AI tanpa kehilangan esensi kemanusiaan dan otentisitas bisnis?\"</strong></em></p>\r\n<p>Di sinilah peran digital agency mengalami transformasi. PT Ghania Creative Indonesia tidak melihat AI sebagai pengganti kreativitas, melainkan sebagai akselerator presisi. Menghadapi era ini membutuhkan lebih dari sekadar alat; ia membutuhkan arsitek digital yang mampu menjinakkan algoritma menjadi profit.</p>\r\n<p><strong>Predictive Maintenance: Menghilangkan Downtime Sebelum Terjadi.</strong></p>\r\n<p>Secara kritis, masalah utama dalam pengelolaan website dan aplikasi mobile tradisional adalah sifatnya yang reaktif. Kita memperbaiki sesuatu setelah rusak. Di PT Ghania, kami mengubah narasi tersebut melalui integrasi AI dalam layanan maintenance.</p>\r\n<p>Dengan algoritma prediktif, sistem kami mampu mendeteksi pola anomali pada trafik atau performa server yang mengindikasikan potensi serangan siber atau kegagalan sistem di masa depan. Hasilnya? Efisiensi operasional yang maksimal. Kami memastikan aset digital Anda di Medan, Singapura, hingga Bangkok tetap berjalan 24/7 tanpa interupsi, memberikan Anda keunggulan kompetitif yang nyata di pasar Asia Tenggara.</p>\r\n<p><strong>Analisis Pasar Berbasis Data, Bukan Intuisi</strong></p>\r\n<p>Bagi generasi tech-savvy, keputusan bisnis berbasis \"firasat\" sudah tidak lagi relevan. AI memungkinkan kita melakukan pembedahan pasar dengan tingkat akurasi yang sebelumnya mustahil. PT Ghania Creative Indonesia memanfaatkan AI untuk melakukan analisis sentimen dan tren makro secara real-time. Kami membantu bisnis Anda memahami:</p>\r\n<ul>\r\n<li>Apa yang sedang dibicarakan audiens di Kuala Lumpur dibandingkan dengan di Medan?</li>\r\n<li>Bagaimana pergeseran minat konsumen di Singapura terhadap produk Anda dalam 24 jam terakhir?</li>\r\n</ul>\r\n<p>Integrasi AI dalam analisis pasar memungkinkan kami merancang strategi media sosial dan konten yang sangat personal. Ini bukan lagi soal menyebarkan jaring yang luas, tapi soal menembakkan panah yang tepat sasaran.</p>\r\n<p><strong>Inovasi Digital: Melampaui Automasi Standar</strong></p>\r\n<p>Banyak agensi mengklaim menggunakan AI, namun sering kali hanya sebatas penggunaan chatbot sederhana. Di PT Ghania, kami melangkah lebih jauh. Kami mengeksplorasi penggunaan AI dalam generative design untuk UI/UX yang dinamis; antarmuka yang dapat beradaptasi secara otomatis berdasarkan perilaku pengguna.</p>\r\n<p>Namun, kami tetap bersikap kritis terhadap penggunaan teknologi ini. AI memiliki risiko bias data. Oleh karena itu, tim ahli kami tetap berperan sebagai \"kurator moral\" yang memastikan bahwa setiap output AI tetap selaras dengan nilai-nilai etika bisnis dan kebutuhan nyata pengguna manusia.</p>\r\n<p><strong>Mengapa Memilih Partner yang Adaptif?</strong></p>\r\n<p>Beradaptasi dengan AI adalah tentang kecepatan dan ketepatan. Bisnis yang lambat mengadopsi teknologi ini akan mengalami \"obsolescence\" atau kedaluwarsa secara teknis dalam waktu singkat. Sebagai agency yang berbasis di Medan dengan jangkauan internasional, PT Ghania Creative Indonesia memadukan ketangkasan talenta lokal dengan teknologi mutakhir global.</p>\r\n<p>Kami berada di garis depan, bukan hanya mengikuti arus, tetapi ikut membentuk bagaimana AI seharusnya bekerja untuk pertumbuhan bisnis nyata, baik untuk UMKM yang ambisius maupun korporasi besar.</p>\r\n<p><strong>Masa Depan Milik Mereka yang Terintegrasi</strong></p>\r\n<p>Era AI bukanlah ancaman bagi mereka yang siap berkolaborasi. Ini adalah era di mana efisiensi bertemu dengan kreativitas tanpa batas. Tantangannya adalah memilih partner yang tidak hanya paham cara menggunakan alat, tetapi juga paham strategi besar di baliknya.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>PT Ghania Creative Indonesia mengajak Anda untuk melampaui batas-batas tradisional. Mari bangun sistem digital yang cerdas, adaptif, dan siap menghadapi tantangan global di tahun 2026 dan seterusnya.</strong></em></p>', '<p><strong>Disruption or Adaptation: The Reality of AI in 2026</strong></p>\r\n<p>We are no longer in an era where Artificial Intelligence (AI) is merely a topic of science fiction. In 2026, AI has become the basic infrastructure that dictates the efficiency of the digital industry. However, for business players aged 17-35 (critical digital natives), the challenge is no longer &lsquo;what is AI?&rsquo;, but <em><strong>&lsquo;how to integrate AI without losing the essence of humanity and business authenticity?&rsquo;</strong></em></p>\r\n<p>This is where the role of digital agencies is undergoing a transformation. PT Ghania Creative Indonesia does not see AI as a substitute for creativity, but rather as a precision accelerator. Facing this era requires more than just tools; it requires digital architects who are able to tame algorithms into profit.</p>\r\n<p><strong>Predictive Maintenance: Eliminating Downtime Before It Happens.</strong></p>\r\n<p>Critically, the main problem with traditional website and mobile application management is its reactive nature. We fix things after they break. At PT Ghania, we change that narrative through the integration of AI in our maintenance services.</p>\r\n<p>With predictive algorithms, our system is able to detect anomalous patterns in traffic or server performance that indicate potential cyber attacks or system failures in the future. The result? Maximum operational efficiency. We ensure your digital assets in Medan, Singapore, and Bangkok run 24/7 without interruption, giving you a real competitive advantage in the Southeast Asian market.</p>\r\n<p><strong>Data-Driven Market Analysis, Not Intuition</strong></p>\r\n<p>For the tech-savvy generation, business decisions based on &lsquo;gut feeling&rsquo; are no longer relevant. AI allows us to dissect the market with a level of accuracy that was previously impossible. PT Ghania Creative Indonesia utilises AI to perform real-time sentiment and macro trend analysis. We help your business understand:</p>\r\n<ul>\r\n<li>What is the audience in Kuala Lumpur talking about compared to those in Medan?</li>\r\n<li>How have consumer interests in Singapore shifted towards your product in the last 24 hours?</li>\r\n</ul>\r\n<p>The integration of AI in market analysis allows us to design highly personalised social media and content strategies. It is no longer a matter of casting a wide net, but of shooting arrows that hit the target.</p>\r\n<p><strong>Digital Innovation: Going Beyond Standard Automation</strong></p>\r\n<p>Many agencies claim to use AI, but often it is limited to the use of simple chatbots. At PT Ghania, we go further. We explore the use of AI in generative design for dynamic UI/UX; interfaces that can adapt automatically based on user behaviour.</p>\r\n<p>However, we remain critical of the use of this technology. AI carries the risk of data bias. Therefore, our team of experts continues to act as &lsquo;moral curators&rsquo; who ensure that every AI output remains aligned with business ethics and the real needs of human users.</p>\r\n<p><strong>Why Choose an Adaptive Partner?</strong></p>\r\n<p>Adapting to AI is about speed and accuracy. Businesses that are slow to adopt this technology will experience technical obsolescence in a short period of time. As an agency based in Medan with an international reach, PT Ghania Creative Indonesia combines the agility of local talent with cutting-edge global technology.</p>\r\n<p>We are at the forefront, not just following the trend, but helping to shape how AI should work for real business growth, both for ambitious SMEs and large corporations.</p>\r\n<p><strong>The Future Belongs to Those Who Are Integrated</strong></p>\r\n<p>The AI era is not a threat to those who are ready to collaborate. It is an era where efficiency meets unlimited creativity. The challenge lies in choosing a partner who not only understands how to use the tools but also grasps the broader strategy behind them.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>PT Ghania Creative Indonesia invites you to transcend traditional boundaries. Let us build a smart, adaptive digital system ready to tackle global challenges in 2026 and beyond.</strong></em></p>', 26, 2, '2026-01-29 17:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title_id` varchar(100) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `brief_id` text,
  `brief_en` text,
  `content_id` longtext,
  `content_en` longtext,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `icon`, `title_id`, `title_en`, `brief_id`, `brief_en`, `content_id`, `content_en`, `thumbnail`, `created_at`, `views`) VALUES
(6, 'website-development', NULL, 'Website Development', 'Website Development', 'Jasa pembuatan website profesional', 'Professional website development services', '<p style=\"text-align: justify;\">Di era digital, website bukan sekadar alamat daring, melainkan wajah utama bisnis Anda. Kami menyediakan layanan pengembangan website <em>end-to-end</em>, mulai dari Company Profile yang elegan, E-Commerce yang kompleks, hingga Landing Page dengan konversi tinggi. Tim kami memastikan setiap baris kode teroptimasi untuk kecepatan (<em>speed</em>), keamanan (<em>security</em>), dan SEO, sehingga bisnis Anda tidak hanya terlihat profesional tetapi juga mudah ditemukan oleh calon klien potensial.</p>\r\n<p style=\"text-align: justify;\">Kami percaya bahwa desain yang baik adalah desain yang bekerja. Oleh karena itu, kami menggabungkan estetika visual mode dengan User Experience (UX) yang intuitif. Website yang kami bangun bersifat responsif di segala perangkat (<em>mobile-friendly</em>), memastikan pelanggan Anda mendapatkan pengalaman terbaik baik saat mengakses melalui smartphone, tablet, maupun desktop. Jangan biarkan bisnis Anda tertinggal; biarkan kami membangun fondasi digital yang kokoh untuk pertumbuhan Anda.</p>', '<p style=\"text-align: justify;\">In the digital age, a website is not just an online address, but the face of your business. We provide end-to-end website development services, from elegant company profiles and complex e-commerce sites to high-conversion landing pages. Our team ensures that every line of code is optimised for speed, security and SEO, so that your business not only looks professional but is also easy to find by potential clients.</p>\r\n<p style=\"text-align: justify;\">We believe that good design is design that works. Therefore, we combine mode visual aesthetics with intuitive User Experience (UX). The websites we build are responsive across all devices (mobile-friendly), ensuring your customers have the best experience whether they access your site via smartphone, tablet, or desktop. Don\'t let your business fall behind; let us build a solid digital foundation for your growth.</p>', 'assets/uploads/1769893216_697e6d60a0608.jpg', '2026-01-31 21:00:16', 2),
(7, 'mobile-apps-development', NULL, 'Mobile Apps Development', 'Mobile Apps Development', 'Pembuatan aplikasi Android & iOS', 'Android & iOS application development', '<p style=\"text-align: justify;\">Aplikasi mobile adalah jembatan terdekat antara bisnis Anda dengan pelanggan. Ghania Creative menghadirkan solusi pengembangan aplikasi mobile (Android &amp; iOS) yang dirancang untuk memecahkan masalah nyata. Kami menggunakan teknologi terkini, baik native maupun hybrid untuk menciptakan aplikasi yang stabil, ringan, dan memiliki performa tinggi. Fokus kami tidak hanya pada fungsionalitas, tetapi juga pada bagaimana menciptakan journey pengguna yang memikat dan membuat mereka terus kembali.</p>\r\n<p style=\"text-align: justify;\">Proses pengembangan kami mencakup segalanya: mulai dari validasi ide, perancangan UI/UX yang mendalam, pengembangan sistem backend yang aman, hingga peluncuran ke Play Store dan App Store. Baik Anda membutuhkan aplikasi untuk manajemen internal perusahaan (B2B) atau aplikasi layanan pelanggan (B2C), kami siap merealisasikannya dengan standar industri tertinggi. Tingkatkan loyalitas pelanggan dan efisiensi operasional Anda dalam satu genggaman.</p>', '<p style=\"text-align: justify;\">Mobile applications are the closest bridge between your business and your customers. Ghania Creative provides mobile application development solutions (Android &amp; iOS) designed to solve real problems. We use the latest technology, both native and hybrid, to create stable, lightweight, high-performance applications. Our focus is not only on functionality, but also on creating an engaging user journey that keeps them coming back.</p>\r\n<p style=\"text-align: justify;\">Our development process covers everything: from idea validation, in-depth UI/UX design, secure backend system development, to launch on the Play Store and App Store. Whether you need an app for internal company management (B2B) or a customer service app (B2C), we are ready to bring it to life with the highest industry standards. Enhance customer loyalty and operational efficiency all in one place.</p>', 'assets/uploads/1769893289_697e6da9c1df7.jpg', '2026-01-31 21:01:29', 0),
(8, 'social-media-management', NULL, 'Social Media Management', 'Social Media Management', 'Pengelolaan media sosial untuk pertumbuhan brand dan engagement', 'Social media management for brand growth and engagement', '<p style=\"text-align: justify;\">Media sosial adalah medan perang baru bagi brand untuk memenangkan hati pelanggan. Layanan Social Media Management kami tidak hanya sekadar memposting gambar, tetapi merancang strategi komunikasi yang terarah. Kami membantu Anda mengelola akun Instagram, TikTok, LinkedIn, hingga Facebook dengan konten visual yang <em>eye-catching</em> dan <em>copywriting</em> yang menyentuh emosi audiens. Tim kreatif kami bekerja untuk memastikan pesan brand Anda tersampaikan dengan konsisten dan relevan dengan tren terkini.</p>\r\n<p style=\"text-align: justify;\">Kami bekerja berdasarkan data, bukan asumsi. Setiap strategi yang kami jalankan didasarkan pada analisis mendalam terhadap perilaku audiens dan kompetitor Anda. Layanan ini mencakup perencanaan kalender konten, produksi visual (desain &amp; video), manajemen komunitas (membalas komentar/DM), hingga pelaporan performa bulanan. Biarkan kami yang mengurus kerumitan algoritma, sementara Anda fokus pada pengembangan bisnis inti Anda.</p>', '<p style=\"text-align: justify;\">Social media is a new battleground for brands to win the hearts of customers. Our Social Media Management service does more than just post images; it designs targeted communication strategies. We help you manage your Instagram, TikTok, LinkedIn, and Facebook accounts with <em>eye-catching</em> visual content and <em>copywriting </em>that touches the emotions of your audience. Our creative team works to ensure that your brand message is conveyed consistently and is relevant to current trends.</p>\r\n<p style=\"text-align: justify;\">We operate based on data, not assumptions. Every strategy we implement is grounded in a thorough analysis of your audience\\\'s behaviour and your competitors. This service includes content calendar planning, visual production (design &amp; video), community management (responding to comments/DMs), and monthly performance reporting. Let us handle the complexities of algorithms while you focus on growing your core business.</p>', 'assets/uploads/1769893366_697e6df68879b.jpg', '2026-01-31 21:02:46', 4),
(9, 'cloud-server', NULL, 'Cloud Server', 'Cloud Server', 'Migrasi server on-premise ke server berbasis cloud', 'Migrate your on-premise server to a cloud-based server', '<p style=\"text-align: justify;\">Banyak perusahaan masih terjebak dalam kenyamanan semu menggunakan server <em>on-premise </em>(fisik). Meskipun terlihat lebih murah di awal, server fisik menyimpan bom waktu yang dapat \"meledak\" kapan saja seperti risiko human error teknisi yang fatal, biaya perawatan perangkat keras yang terus membengkak, hingga ancaman bencana fisik tak terduga seperti kebakaran, banjir, atau pencurian di lokasi kantor Anda. Ketergantungan pada infrastruktur fisik yang rentan ini dapat melumpuhkan operasional bisnis Anda dalam sekejap, mengakibatkan kerugian data dan finansial yang mungkin tidak dapat dipulihkan.</p>\r\n<p style=\"text-align: justify;\">Ghania Creative hadir untuk memodernisasi infrastruktur IT Anda melalui migrasi ke <em>Cloud Server</em>. Dengan beralih ke cloud, Anda mendapatkan fleksibilitas tanpa batas, dimana sistem Anda dapat diakses dari mana saja dengan jaminan uptime tinggi dan keamanan data berlapis yang dikelola oleh standar global. Tidak ada lagi kekhawatiran tentang kerusakan hardware atau biaya listrik server yang boros. Kami memastikan proses transisi berjalan mulus tanpa mengganggu operasional, memberikan Anda ketenangan pikiran dan skalabilitas sistem yang siap tumbuh seiring pesatnya bisnis Anda.</p>', '<p style=\"text-align: justify;\">Many companies are still stuck in the false comfort of using <em>on-premise</em> (physical) servers. Although they may seem cheaper at first, physical servers are ticking time bombs that could \"explode\" at any moment, such as the risk of fatal human error by technicians, ever-increasing hardware maintenance costs, and the threat of unexpected physical disasters such as fire, flooding, or theft at your office location. Reliance on this vulnerable physical infrastructure can paralyse your business operations in an instant, resulting in data and financial losses that may be irrecoverable.</p>\r\n<p style=\"text-align: justify;\">Ghania Creative is here to modernise your IT infrastructure through migration to <em>Cloud Servers</em>. By switching to the cloud, you gain unlimited flexibility, where your systems can be accessed from anywhere with high uptime guarantees and layered data security managed by global standards. No more worries about hardware damage or wasteful server electricity costs. We ensure a smooth transition process without disrupting operations, giving you peace of mind and system scalability ready to grow alongside your rapidly expanding business.</p>', 'assets/uploads/1769893513_697e6e89c062f.jpg', '2026-01-31 21:05:13', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Admin', 'lintangashshofa@gmail.com', '$2y$10$qWPS9LaWhMDeTP7aET2nSusDMDKXunUMlXRqjwsalFLXiyImIVrKi', '2026-01-28 23:20:24'),
(2, 'Lintang Antum', 'lintang.labs@gmail.com', '$2y$10$VEEzzU0.IDzTJc.VOIEF/.IaK0F6iDI8lPjX09Apqf90v5BC8hhWi', '2026-01-28 23:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_logs`
--

CREATE TABLE `visitor_logs` (
  `id` int NOT NULL,
  `page_type` enum('home','article','service','other') NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `access_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visitor_logs`
--

INSERT INTO `visitor_logs` (`id`, `page_type`, `page_title`, `ip_address`, `access_time`) VALUES
(1, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:10:38'),
(2, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:14:55'),
(3, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:16:15'),
(4, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:16:17'),
(5, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:16:18'),
(6, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:16:49'),
(7, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:16:52'),
(8, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:17:04'),
(9, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:17:15'),
(10, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:18:50'),
(11, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:18:54'),
(12, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:18:59'),
(13, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:19:02'),
(14, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:19:03'),
(15, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:19:05'),
(16, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:19:06'),
(17, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 19:19:07'),
(18, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:28:08'),
(19, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 19:58:16'),
(20, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 20:40:33'),
(21, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 20:59:32'),
(22, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 20:59:35'),
(23, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 20:59:37'),
(24, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 20:59:46'),
(25, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 22:25:29'),
(26, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 22:27:28'),
(27, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 22:29:20'),
(28, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-29 22:29:37'),
(29, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-29 22:29:50'),
(30, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 09:51:10'),
(31, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 10:03:40'),
(32, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 10:51:28'),
(33, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 10:58:28'),
(34, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:00:18'),
(35, 'article', 'Menghadapi Era AI: Bagaimana Digital Agency Membantu Bisnis Anda Beradaptasi', '127.0.0.1', '2026-01-30 11:00:30'),
(36, 'article', 'Dari Medan, untuk Dunia! Visi PT Ghania Creative Indonesia dalam Ekonomi Digital', '127.0.0.1', '2026-01-30 11:00:46'),
(37, 'article', 'Mengapa Digital Agency di Medan Menjadi Kunci Ekspansi Bisnis ke Asia Tenggara?', '127.0.0.1', '2026-01-30 11:00:54'),
(38, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:08:32'),
(39, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:10:22'),
(40, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:10:26'),
(41, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:10:28'),
(42, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:10:30'),
(43, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:10:33'),
(44, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:15:42'),
(45, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:16:30'),
(46, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:16:58'),
(47, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:17:26'),
(48, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:21:12'),
(49, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:39:24'),
(50, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:40:32'),
(51, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:41:28'),
(52, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:41:54'),
(53, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:42:32'),
(54, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 11:44:01'),
(55, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 12:06:25'),
(56, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 15:28:42'),
(57, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 15:30:11'),
(58, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 15:31:15'),
(59, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 18:58:06'),
(60, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:10:41'),
(61, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:11:10'),
(62, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:18:53'),
(63, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:19:09'),
(64, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:45:18'),
(65, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:45:39'),
(66, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:45:56'),
(67, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:47:31'),
(68, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:47:52'),
(69, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:48:01'),
(70, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:48:10'),
(71, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:48:19'),
(72, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:48:45'),
(73, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:48:57'),
(74, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:50:58'),
(75, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:51:12'),
(76, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:51:27'),
(77, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:51:54'),
(78, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:53:22'),
(79, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:53:40'),
(80, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:54:01'),
(81, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:54:07'),
(82, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:56:13'),
(83, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:56:36'),
(84, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:57:15'),
(85, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:58:08'),
(86, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 19:59:57'),
(87, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:01:00'),
(88, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:01:20'),
(89, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:01:24'),
(90, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:05:04'),
(91, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:05:20'),
(92, 'service', 'Website Development', '127.0.0.1', '2026-01-30 20:05:43'),
(93, 'service', 'Social Media Management', '127.0.0.1', '2026-01-30 20:05:46'),
(94, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:05:47'),
(95, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:06:09'),
(96, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:07:45'),
(97, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:07:54'),
(98, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:11:55'),
(99, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:12:14'),
(100, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:15:28'),
(101, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:16:11'),
(102, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:18:01'),
(103, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:18:13'),
(104, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:18:19'),
(105, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:18:23'),
(106, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:18:27'),
(107, 'service', 'Social Media Management', '127.0.0.1', '2026-01-30 20:18:35'),
(108, 'service', 'Mobile Apps Development', '127.0.0.1', '2026-01-30 20:18:42'),
(109, 'service', 'Website Development', '127.0.0.1', '2026-01-30 20:18:44'),
(110, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:18:46'),
(111, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:32:07'),
(112, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:45:49'),
(113, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:45:52'),
(114, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:45:56'),
(115, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:45:58'),
(116, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:45:59'),
(117, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:46:04'),
(118, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:46:06'),
(119, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:46:10'),
(120, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 20:48:16'),
(121, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:48:27'),
(122, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:48:32'),
(123, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 20:49:19'),
(124, 'service', 'Website Development', '127.0.0.1', '2026-01-30 20:49:21'),
(125, 'service', 'Website Development', '127.0.0.1', '2026-01-30 21:08:15'),
(126, 'service', 'Website Development', '127.0.0.1', '2026-01-30 21:08:18'),
(127, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 21:08:20'),
(128, 'service', 'Cloud Server', '127.0.0.1', '2026-01-30 21:08:23'),
(129, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 21:08:42'),
(130, 'service', 'Website Development', '127.0.0.1', '2026-01-30 21:08:45'),
(131, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 21:08:51'),
(132, 'service', 'Mobile Apps Development', '127.0.0.1', '2026-01-30 21:08:54'),
(133, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 21:09:05'),
(134, 'service', 'Social Media Management', '127.0.0.1', '2026-01-30 21:09:07'),
(135, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-30 21:09:52'),
(136, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 18:45:54'),
(137, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 18:46:47'),
(138, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 18:48:17'),
(139, 'service', 'Website Development', '127.0.0.1', '2026-01-31 18:48:21'),
(140, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 18:48:26'),
(141, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 20:05:14'),
(142, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:05:17'),
(143, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:05:56'),
(144, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:07:26'),
(145, 'service', 'Mobile Apps Development', '127.0.0.1', '2026-01-31 20:07:33'),
(146, 'service', 'Social Media Management', '127.0.0.1', '2026-01-31 20:07:35'),
(147, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 20:07:37'),
(148, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:07:38'),
(149, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:11:07'),
(150, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:11:12'),
(151, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:19:25'),
(152, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:19:47'),
(153, 'service', 'Website Development', '127.0.0.1', '2026-01-31 20:26:03'),
(154, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 20:26:07'),
(155, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 20:27:58'),
(156, 'service', 'Mobile Apps Development', '127.0.0.1', '2026-01-31 20:28:10'),
(157, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:00:20'),
(158, 'service', 'Website Development', '127.0.0.1', '2026-01-31 21:00:26'),
(159, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:00:35'),
(160, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:03:10'),
(161, 'service', 'Social Media Management', '127.0.0.1', '2026-01-31 21:03:14'),
(162, 'service', 'Social Media Management', '127.0.0.1', '2026-01-31 21:05:18'),
(163, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:05:20'),
(164, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:05:24'),
(165, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:05:50'),
(166, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:05:53'),
(167, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:05:58'),
(168, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:05:59'),
(169, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:05:59'),
(170, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:06:00'),
(171, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:06:00'),
(172, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:06:01'),
(173, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:06:01'),
(174, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:06:02'),
(175, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:12:11'),
(176, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:12:16'),
(177, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:12:23'),
(178, 'service', 'Social Media Management', '127.0.0.1', '2026-01-31 21:12:26'),
(179, 'service', 'Website Development', '127.0.0.1', '2026-01-31 21:12:35'),
(180, 'service', 'Social Media Management', '127.0.0.1', '2026-01-31 21:12:37'),
(181, 'service', 'Cloud Server', '127.0.0.1', '2026-01-31 21:12:37'),
(182, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:12:44'),
(183, 'home', 'Halaman Utama', '127.0.0.1', '2026-01-31 21:12:46'),
(184, 'home', 'Halaman Utama', '127.0.0.1', '2026-02-01 19:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visitor_logs`
--
ALTER TABLE `visitor_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor_logs`
--
ALTER TABLE `visitor_logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
