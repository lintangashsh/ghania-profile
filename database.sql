-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2026 at 09:17 PM
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
(8, 'dari-medan-untuk-dunia-visi-pt-ghania-creative-indonesia-dalam-ekonomi-digital', 'Dari Medan, untuk Dunia! Visi PT Ghania Creative Indonesia dalam Ekonomi Digital', 'From Medan, to the World! PT Ghania Creative Indonesia\'s Vision in the Digital Economy', 'Kenali PT Ghania Creative Indonesia, digital agency asal Medan yang membawa talenta lokal ke kancah internasional (Singapura, Malaysia, Thailand).', 'PT Ghania Creative Indonesia, Digital Agency Medan, Profil Perusahaan Digital Agency, Jasa Website Medan, Creative Agency Indonesia, Digital Agency Medan, Digital Agency Company Profile, Website Services Medan, Creative Agency Indonesia', 'assets/uploads/697a792fa4bc1.png', '<p><strong>Bukan Sekadar Kode, Tapi Sebuah Cerita dari Medan</strong><br>Pernah terpikir nggak, kalau dari sebuah sudut di Kota Medan, kita bisa menciptakan gelombang digital yang dampaknya terasa sampai ke Singapura, Malaysia, hingga Thailand?<br>Mungkin bagi sebagian orang, Medan lebih dikenal dengan kulinernya yang juara atau logatnya yang tegas. Tapi bagi kami di PT Ghania Creative Indonesia, Medan adalah titik nol dari sebuah mimpi besar: membuktikan bahwa talenta kreatif dari Sumatera Utara punya kualitas yang \"bukan kaleng-kaleng\" di mata dunia.<br>Kami memulai perjalanan ini dengan satu keyakinan sederhana: Digitalisasi adalah hak semua orang. Mulai dari abang-abang pemilik UMKM di pajak (pasar), founder startup di Jakarta, hingga pengusaha di Orchard Road, semuanya butuh jembatan digital yang kokoh. Dan kami di sini untuk membangun jembatan itu.</p>\r\n<p><strong>Kenapa Harus \"Ghania Creative Indonesia\"?</strong><br>Nama perusahaan kami bukan sekadar deretan kata tanpa makna. Ada doa dan ambisi di sana. Kami ingin menjadi representasi Indonesia yang kreatif, solutif, dan kompetitif.<br>Sebagai sebuah Digital Agency, kami bergerak di tiga pilar utama:</p>\r\n<ol>\r\n<li>Penyedia &amp; Maintenance Website: Kami percaya website adalah rumah digital. Rumah yang bukan cuma harus cantik dilihat, tapi juga harus aman, cepat, dan nggak gampang \"rubuh\" (alias down).</li>\r\n<li>Mobile Apps Development: Di zaman sekarang, semua orang hidup di smartphone. Kami bantu bisnis Anda masuk ke kantong pelanggan lewat aplikasi yang user-friendly.</li>\r\n<li>Social Media Management: Kami mengelola narasi. Kami memastikan brand Anda punya \"suara\" yang didengar di tengah hiruk-pikuk konten media sosial saat ini.</li>\r\n</ol>\r\n<p><strong>Standar Global dengan Hati Lokal</strong><br>Kenapa klien dari Singapura, Malaysia, dan Thailand mau mempercayakan aset digital mereka kepada tim dari Medan? Jawabannya ada pada komitmen terhadap kualitas.<br>Di PT Ghania Creative Indonesia, kami nggak pernah membeda-bedakan klien. Mau Anda adalah pemilik usaha kecil yang baru mulai merintis, atau perusahaan besar yang sudah punya nama, standar pengerjaan kami tetap sama: Global Standard. Kami menerapkan teknologi terbaru, desain yang fresh (atau yang anak zaman sekarang bilang \"Slay\"), dan strategi SEO yang tajam. Namun, kami tetap membawa nilai-nilai lokal: kejujuran dalam berkomunikasi, kerja keras yang gigih, dan sifat rendah hati namun tetap percaya diri dengan hasil karya kami (low profile, high impact).</p>\r\n<p><strong>Melampaui Batas Geografis</strong><br>Dalam beberapa tahun terakhir, kami beruntung bisa bekerja sama dengan berbagai entitas lintas negara. Pengalaman melayani klien internasional memberikan kami perspektif baru tentang bagaimana ekonomi digital bekerja di Asia Tenggara.<br>Kami belajar bahwa setiap negara punya keunikan masing-masing. Strategi digital untuk pasar di Bangkok tentu berbeda dengan di Kuala Lumpur atau Medan. Kemampuan adaptasi inilah yang menjadi senjata rahasia PT Ghania Creative Indonesia. Kami bukan cuma \"tukang bikin website\", kami adalah partner diskusi yang paham dinamika pasar global.</p>\r\n<p><strong>Untuk UMKM: Ayo Naik Kelas bareng Kami!</strong><br>Kami sering mendengar keluhan, \"Duh, bikin website atau aplikasi itu mahal ya?\" atau \"Media sosial itu buat anak muda aja.\" Di sini, PT Ghania ingin mematahkan stigma itu. Kami ingin merangkul teman-teman UMKM, khususnya di Sumatera Utara, untuk berani melangkah. Dunia digital itu luas banget, dan sayang kalau produk keren Anda cuma dikenal di lingkungan sekitar saja. Dengan strategi digital yang tepat, produk UMKM Medan bisa lho dipesan oleh orang di Singapura dengan sekali klik. Kami siap jadi mentor dan eksekutor digital Anda.</p>\r\n<p><strong>Visi ke Depan: Menjadi Hub Digital Asia Tenggara dari Medan</strong><br>Mimpi kami belum selesai. Kami ingin menjadikan PT Ghania Creative Indonesia sebagai bukti nyata bahwa untuk menjadi pemain global, kita nggak harus selalu pindah ke ibu kota. Kita bisa membangun ekosistem yang hebat tepat di mana kita berpijak.<br>Kami ingin terus menciptakan lapangan kerja bagi talenta-talenta kreatif di Medan, melatih mereka dengan standar internasional, dan bersama-sama membawa nama Indonesia harum di kancah ekonomi digital dunia.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>Mari Berkolaborasi!</strong></em><br>Artikel ini bukan sekadar profil perusahaan yang kaku. Ini adalah undangan terbuka bagi Anda; para pemangku kepentingan, calon partner, atau Anda yang baru saja memulai bisnis.<br>Dunia digital mungkin terasa rumit dan berubah terlalu cepat, tapi Anda nggak harus menghadapinya sendirian. PT Ghania Creative Indonesia ada di sini sebagai teman perjalanan bisnis Anda. Kita mulai dari diskusi santai, kita bangun fondasi digitalnya, dan kita rayakan kesuksesannya bersama.</p>', '<p><strong>Not Just Code, But a Story from Medan</strong><br>Have you ever thought that from a corner of Medan, we could create a digital wave that would have an impact all the way to Singapore, Malaysia, and Thailand?<br>For some, Medan may be better known for its world-class cuisine or its distinctive dialect. But for us at PT Ghania Creative Indonesia, Medan is the starting point of a grand vision: to prove that the creative talent from North Sumatra holds its own on the global stage.<br>We embarked on this journey with one simple belief: Digitalisation is a right for everyone. From small business owners in the market, startup founders in Jakarta, to entrepreneurs on Orchard Road, everyone needs a solid digital bridge. And we are here to build that bridge.</p>\r\n<p><strong>Why &lsquo;Ghania Creative Indonesia&rsquo;?</strong><br>Our company name is not just a meaningless string of words. There is a prayer and ambition behind it. We want to be a representation of Indonesia that is creative, solution-oriented, and competitive.&nbsp;As a Digital Agency, we operate in three main pillars:</p>\r\n<ol>\r\n<li>Website Provider &amp; Maintenance: We believe that a website is a digital home. A home that is not only beautiful to look at, but also secure, fast, and not easily &lsquo;crashed&rsquo; (aka down).</li>\r\n<li>Mobile Apps Development: In this day and age, everyone lives on their smartphones. We help your business reach customers through user-friendly applications.</li>\r\n<li>Social Media Management: We manage narratives. We ensure your brand has a &lsquo;voice&rsquo; that is heard amid the hustle and bustle of today\'s social media content.</li>\r\n</ol>\r\n<p><strong>Global Standards with a Local Heart</strong><br>Why would clients from Singapore, Malaysia, and Thailand entrust their digital assets to a team from Medan? The answer lies in our commitment to quality.<br>At PT Ghania Creative Indonesia, we never discriminate between clients. Whether you are a small business owner just starting out or a large, well-established company, our work standards remain the same: Global Standard. We apply the latest technology, fresh designs (or what the younger generation calls &lsquo;Slay&rsquo;), and sharp SEO strategies. However, we still uphold local values: honesty in communication, persistent hard work, and humility while remaining confident in our work (low profile, high impact).</p>\r\n<p><strong>Transcending Geographical Boundaries</strong><br>In recent years, we have been fortunate to work with various entities across countries. Serving international clients has given us a new perspective on how the digital economy works in Southeast Asia.<br>We have learned that each country has its own unique characteristics. The digital strategy for the market in Bangkok is certainly different from that in Kuala Lumpur or Medan. This adaptability is the secret weapon of PT Ghania Creative Indonesia. We are not just &lsquo;website builders&rsquo;; we are discussion partners who understand the dynamics of the global market.</p>\r\n<p><strong>For MSMEs: Let\'s move up a class together!</strong><br>We often hear complaints such as, &lsquo;Gosh, building a website or application is expensive, isn\'t it?&rsquo; or &lsquo;Social media is only for young people.&rsquo; Here, PT Ghania wants to break that stigma. We want to embrace our friends in MSMEs, especially in North Sumatra, to dare to take a step forward. The digital world is vast, and it would be a shame if your amazing products were only known locally. With the right digital strategy, SME products from Medan can be ordered by people in Singapore with just one click. We are ready to be your digital mentor and executor.</p>\r\n<p><strong>Future Vision: Becoming Southeast Asia\'s Digital Hub from Medan</strong><br>Our dream is not yet complete. We want to make PT Ghania Creative Indonesia a living proof that to become a global player, we don\'t always have to move to the capital city. We can build a great ecosystem right where we stand.<br>We want to continue creating job opportunities for creative talents in Medan, train them to international standards, and together bring Indonesia\'s name to prominence in the global digital economy.</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>Let\'s Collaborate!</strong></em><br>This article is not just a rigid company profile. It is an open invitation to you; stakeholders, potential partners, or those of you who are just starting a business.<br>The digital world may seem complicated and change too quickly, but you don\'t have to face it alone. PT Ghania Creative Indonesia is here as your business journey companion. We start with casual discussions, build the digital foundation, and celebrate the success together.</p>', 5, 1, '2026-01-28 21:01:35');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `slug`, `icon`, `title_id`, `title_en`, `brief_id`, `brief_en`, `content_id`, `content_en`, `created_at`) VALUES
(1, 'web-dev', NULL, 'Website Development', 'Website Development', 'Jasa pembuatan website profesional.', 'Professional website development services.', NULL, NULL, '2026-01-28 08:35:25'),
(2, 'mobile-apps', NULL, 'Mobile Apps Development', 'Mobile Apps Development', 'Pembuatan aplikasi Android & iOS.', 'Android & iOS application development.', NULL, NULL, '2026-01-28 08:35:25'),
(3, 'social-media', NULL, 'Social Media Management', 'Social Media Management', 'Pengelolaan akun media sosial bisnis.', 'Business social media account management.', NULL, NULL, '2026-01-28 08:35:25');

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
(1, 'Admin', 'lintangashshofa@gmail.com', 'Antum_0600!!#', '2026-01-28 09:39:34');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
