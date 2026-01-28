<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'id';
}

if (isset($_GET['lang'])) {
    $lang_code = $_GET['lang'];
    if (in_array($lang_code, ['id', 'en'])) {
        $_SESSION['lang'] = $lang_code;
    }
}

$lang_code = $_SESSION['lang'];

$trans = [
    'id' => [
        'nav_home' => 'Beranda',
        'nav_about' => 'Tentang Kami',
        'nav_services' => 'Layanan Kami',
        'nav_articles' => 'Artikel',
        'nav_contact' => 'Kontak',
        'btn_read_more' => 'Baca Selengkapnya',
        'btn_consult' => 'Konsultasi Gratis',
        'btn_all_articles' => 'Semua Artikel',
        'btn_send' => 'Kirim Pesan',
        'title_clients' => 'Klien Kami',
        'title_latest_articles' => 'Artikel Terbaru',
        'footer_quick_access' => 'Akses Cepat',
        'footer_leave_msg' => 'Tinggalkan Pesan',
        'form_name' => 'Nama Anda',
        'form_email' => 'Email Anda',
        'form_subject' => 'Subjek',
        'form_message' => 'Pesan...',
        'copyright' => 'Hak Cipta Dilindungi.'
    ],
    'en' => [
        'nav_home' => 'Home',
        'nav_about' => 'About Us',
        'nav_services' => 'Our Services',
        'nav_articles' => 'Articles',
        'nav_contact' => 'Contact',
        'btn_read_more' => 'Read More',
        'btn_consult' => 'Free Consultation',
        'btn_all_articles' => 'All Articles',
        'btn_send' => 'Send Message',
        'title_clients' => 'Our Clients',
        'title_latest_articles' => 'Latest Articles',
        'footer_quick_access' => 'Quick Access',
        'footer_leave_msg' => 'Leave a Message',
        'form_name' => 'Your Name',
        'form_email' => 'Your Email',
        'form_subject' => 'Subject',
        'form_message' => 'Message...',
        'copyright' => 'All Rights Reserved.'
    ]
];

$t = $trans[$lang_code];
