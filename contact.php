<?php
require 'config/database.php';
require 'config/lang.php';

$page_title = ($lang_code == 'en') ? "Contact Us - Ghania Creative" : "Hubungi Kami - Ghania Creative";

// Translations specifically for this page
if ($lang_code == 'en') {
    $title_hero = "Ready to Start<br>Your Digital Transformation?";
    $subtitle_hero = "We are ready to listen, analyze, and provide the best technological solutions for you.";
    $lbl_phone = "WhatsApp";
    $lbl_email = "Email Us";
    $lbl_address = "Our Headquarters";
    $msg_success = "Your message has been sent successfully. We will get back to you soon!";
    $msg_error = "There was an error sending your message. Please try again.";
    $msg_empty = "All fields are required.";
    $form_title = "Send us a Message";
    $maps_title = "Find us on Maps";
} else {
    $title_hero = "Siap Memulai<br>Transformasi Digital Anda?";
    $subtitle_hero = "Kami siap mendengar, menganalisa, dan memberikan solusi teknologi terbaik untuk Anda.";
    $lbl_phone = "WhatsApp";
    $lbl_email = "Email kepada Kami";
    $lbl_address = "Kantor Pusat";
    $msg_success = "Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda!";
    $msg_error = "Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.";
    $msg_empty = "Semua bidang wajib diisi.";
    $form_title = "Kirim Kami Pesan";
    $maps_title = "Temukan Kami di Peta";
}

// Handle Form Submission
$success_msg = '';
$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $subject = isset($_POST['subjek']) ? trim($_POST['subjek']) : '';
    $message = isset($_POST['pesan']) ? trim($_POST['pesan']) : '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        $inserted = $db->table('contact_messages')->insert([
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'subject' => htmlspecialchars($subject),
            'message' => htmlspecialchars($message),
            'status' => 'unread'
        ]);

        if ($inserted) {
            $success_msg = $msg_success;
        } else {
            $error_msg = $msg_error;
        }
    } else {
        $error_msg = $msg_empty;
    }
}

// Record tracking AFTER possible redirect/logic, before output
require_once 'config/tracker.php';
record_visit($db, 'contact', 'Contact Us');

include 'includes/header.php';
include 'includes/navbar.php';

$contact_bg = BASE_URL . "assets/img/hero-bg.png";
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
    backdrop-filter: blur(8px) !important;
    box-shadow: none !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
}

#navbar {
    transition: background-color 0.5s ease, padding 0.3s ease;
}

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
    <div id="bg-contact" class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-50">
        <img src="<?= $contact_bg ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-black/40"></div>
    </div>
</div>

<div class="relative z-10">
    <div class="h-20"></div>

    <section id="sec-contact" class="min-h-screen flex items-center justify-center px-4 py-20 snap-section" data-target="bg-contact">
        <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center fade-up-enter">

            <!-- Left Side: Information matching about.php collaboration section -->
            <div class="text-white space-y-8">
                <div>
                    <span class="text-ghania-orange font-bold tracking-widest uppercase mb-2 block"><?= $t['nav_contact'] ?></span>
                    <h2 class="text-4xl md:text-6xl font-bold leading-tight drop-shadow-lg">
                        <?= $title_hero ?>
                    </h2>
                </div>
                <p class="text-gray-300 text-lg leading-relaxed max-w-lg">
                    <?= $subtitle_hero ?>
                </p>
                <div class="space-y-6 pt-4">
                    <!-- Email -->
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-ghania-orange rounded-full flex items-center justify-center text-white shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v9a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-widest"><?= $lbl_email ?></p>
                            <p class="text-xl font-semibold">lintang.labs@gmail.com</p>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-white shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-widest"><?= $lbl_phone ?></p>
                            <p class="text-xl font-semibold">+62 851-5802-3383</p>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-white shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-widest"><?= $lbl_address ?></p>
                            <p class="text-lg font-medium leading-snug">Medan, Sumatera Utara<br>Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Form (styled like about.php but dynamic) -->
            <div class="bg-white rounded-2xl p-8 md:p-10 shadow-2xl transform hover:scale-[1.02] transition duration-300">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4"><?= $form_title ?></h3>
                
                <?php if (!empty($success_msg)): ?>
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg" role="alert">
                    <span class="block sm:inline"><?= $success_msg ?></span>
                </div>
                <?php endif; ?>

                <?php if (!empty($error_msg)): ?>
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg" role="alert">
                    <span class="block sm:inline"><?= $error_msg ?></span>
                </div>
                <?php endif; ?>

                <form action="contact.php<?= ($lang_code == 'en') ? '?lang=en' : '' ?>" method="POST" class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <input type="text" name="nama" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange transition-colors"
                            placeholder="<?= $t['form_name'] ?> *">
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange transition-colors"
                            placeholder="<?= $t['form_email'] ?> *">
                    </div>
                    <input type="text" name="subjek"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange transition-colors"
                        placeholder="<?= $t['form_subject'] ?>">
                    <textarea name="pesan" rows="4" required
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:border-ghania-orange transition-colors"
                        placeholder="<?= $t['form_message'] ?> *"></textarea>
                    
                    <button type="submit"
                        class="w-full bg-ghania-orange text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition shadow-lg transform hover:-translate-y-1">
                        <?= $t['btn_send'] ?>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Maps Section with glassmorphism matching the rest of the site -->
    <section id="sec-maps" class="min-h-screen flex items-center justify-center px-4 py-20 snap-section" data-target="bg-contact">
        <div class="container mx-auto px-6 fade-up-enter text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4"><?= $maps_title ?></h2>
            <div class="w-24 h-1 bg-ghania-orange mx-auto rounded mb-12"></div>
            
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-4 md:p-8 border border-white/10 shadow-2xl">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127453.64414605151!2d98.57140833984666!3d3.59332159048999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131cc1cb3be27%3A0x1bb1fdb0b91e9f1f!2sMedan%2C%20Medan%20City%2C%20North%20Sumatra!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="500" style="border:0; border-radius: 1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                
                if (targetBgId !== "none" && targetBgId) {
                    const activeBg = document.getElementById(targetBgId);
                    if (activeBg) {
                        activeBg.classList.remove("opacity-0");
                        activeBg.classList.add("opacity-50");
                    }
                }
                
                const textContent = entry.target.querySelector(".fade-up-enter");
                if (textContent) textContent.classList.add("fade-up-active");
            }
        });
    }, observerOptions);
    
    sections.forEach((section) => observer.observe(section));
});
</script>
