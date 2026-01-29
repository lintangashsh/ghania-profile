<?php
// Mencegah error jika tracker dipanggil double
if (!function_exists('record_visit')) {
    function record_visit($conn, $page_type, $page_title = '')
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        // Simpan ke Log
        $stmt = $conn->prepare("INSERT INTO visitor_logs (page_type, page_title, ip_address) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $page_type, $page_title, $ip);
        $stmt->execute();

        // Jika halaman artikel/service, update counter di tabel utamanya juga
        if ($page_type == 'article') {
            // Kita asumsikan $page_title menyimpan slug atau ID untuk identifikasi update
            // (Disederhanakan: Tracker di artikel detail nanti update manual)
        }
    }
}