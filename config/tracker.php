<?php

declare(strict_types=1);

// Mencegah error jika tracker dipanggil double
if (!function_exists('record_visit')) {
    function record_visit(Database $db, string $page_type, string $page_title = ''): void
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

        // Simpan ke Log
        $db->table('visitor_logs')->insert([
            'page_type'  => $page_type,
            'page_title' => $page_title,
            'ip_address' => $ip,
        ]);
    }
}
