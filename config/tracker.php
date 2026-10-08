<?php

declare(strict_types=1);

// Mencegah error jika tracker dipanggil double
if (!function_exists('record_visit')) {
    function record_visit(Database $db, string $page_type, string $page_title = ''): void
    {
        // Retrieve true client IP from AWS ALB or fallback to REMOTE_ADDR
        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $forwarded = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim(array_shift($forwarded));
        }

        // Simpan ke Log
        $db->table('visitor_logs')->insert([
            'page_type'  => $page_type,
            'page_title' => $page_title,
            'ip_address' => $ip,
        ]);
    }
}
