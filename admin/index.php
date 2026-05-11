<?php
/**
 * @var Database $db
 */
session_start();

$timeout_duration = 1800;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: /admin/login.php?timeout=1");
    exit();
}
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

require '../config/database.php';

$total_views_home = $db->table('visitor_logs')->where('page_type', 'home')->count();
$total_views_art = (int) $db->table('articles')->select('SUM(views) as total')->value('total');

$top_article = $db->table('articles')->orderBy('views', 'DESC')->first();
$top_service = $db->table('services')->orderBy('views', 'DESC')->first();

$traffic_labels = [];
$traffic_data = [];
for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $traffic_labels[] = date('d M', strtotime($date));
    $traffic_data[] = $db->table('visitor_logs')->whereRaw("DATE(access_time) = ?", [$date])->count();
}

$comp_home = $db->table('visitor_logs')->where('page_type', 'home')->count();
$comp_article = $db->table('visitor_logs')->where('page_type', 'article')->count();
$comp_service = $db->table('visitor_logs')->where('page_type', 'service')->count();

$total_all = $comp_home + $comp_article + $comp_service;
if ($total_all == 0) {
    $comp_home = 1;
}

$page_title = "Dashboard Utama";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Ghania</title>
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/ghania-3d.png">
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased text-gray-800">

    <div class="flex h-screen overflow-hidden">
        <?php include 'includes/sidebar.php'; ?>

        <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">
            <header class="bg-white shadow-sm py-4 px-8 flex justify-between items-center z-10">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Dashboard Overview</h2>
                    <p class="text-sm text-gray-500">Pantau performa website Ghania Creative secara real-time.</p>
                </div>
                <div class="hidden md:block text-right">
                    <p class="text-sm font-bold text-gray-800"><?= $_SESSION['admin_name'] ?? 'Administrator' ?></p>
                    <p class="text-xs text-green-500">● Online</p>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div
                        class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-blue-500 hover:shadow-md transition transform hover:-translate-y-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Visitor Landing
                                    Page</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1">
                                    <?= number_format($total_views_home) ?></h3>
                            </div>
                            <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-ghania-orange hover:shadow-md transition transform hover:-translate-y-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Baca
                                    Artikel</p>
                                <h3 class="text-2xl font-bold text-gray-800 mt-1"><?= number_format($total_views_art) ?>
                                </h3>
                            </div>
                            <div class="p-2 bg-orange-50 rounded-lg text-ghania-orange">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-green-500 hover:shadow-md transition transform hover:-translate-y-1">
                        <div class="flex justify-between items-start">
                            <div class="overflow-hidden pr-2">
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Artikel
                                    Terpopuler</p>
                                <h3 class="text-lg font-bold text-gray-800 mt-1 truncate"
                                    title="<?= $top_article['title_id'] ?? '-' ?>">
                                    <?= $top_article['title_id'] ?? 'Belum ada data' ?>
                                </h3>
                                <p class="text-xs text-green-600 mt-1 font-bold">
                                    <?= number_format($top_article['views'] ?? 0) ?>x Dilihat</p>
                            </div>
                            <div class="p-2 bg-green-50 rounded-lg text-green-600 flex-shrink-0">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-purple-500 hover:shadow-md transition transform hover:-translate-y-1">
                        <div class="flex justify-between items-start">
                            <div class="overflow-hidden pr-2">
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan Favorit
                                </p>
                                <h3 class="text-lg font-bold text-gray-800 mt-1 truncate"
                                    title="<?= $top_service['title_id'] ?? '-' ?>">
                                    <?= $top_service['title_id'] ?? 'Belum ada data' ?>
                                </h3>
                                <p class="text-xs text-purple-600 mt-1 font-bold">
                                    <?= number_format($top_service['views'] ?? 0) ?>x Dilihat</p>
                            </div>
                            <div class="p-2 bg-purple-50 rounded-lg text-purple-600 flex-shrink-0">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm lg:col-span-2">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Traffic Minggu Ini</h3>
                                <p class="text-xs text-gray-500">Statistik pengunjung 7 hari terakhir</p>
                            </div>
                            <span
                                class="text-xs font-bold text-ghania-orange bg-orange-50 px-3 py-1 rounded-full">Real-time</span>
                        </div>
                        <div class="relative h-72 w-full"><canvas id="trafficChart"></canvas></div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Minat Pengunjung</h3>
                            <p class="text-xs text-gray-500 mb-6">Halaman mana yang paling sering dibuka?</p>
                        </div>
                        <div class="relative h-48 w-full flex justify-center"><canvas id="distributionChart"></canvas>
                        </div>
                        <div class="mt-6 space-y-3">
                            <div class="flex justify-between text-sm items-center"><span class="flex items-center"><span
                                        class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>Landing Page</span><span
                                    class="font-bold text-gray-700"><?= $comp_home ?></span></div>
                            <div class="flex justify-between text-sm items-center"><span class="flex items-center"><span
                                        class="w-3 h-3 bg-ghania-orange rounded-full mr-2"></span>Artikel</span><span
                                    class="font-bold text-gray-700"><?= $comp_article ?></span></div>
                            <div class="flex justify-between text-sm items-center"><span class="flex items-center"><span
                                        class="w-3 h-3 bg-purple-500 rounded-full mr-2"></span>Layanan</span><span
                                    class="font-bold text-gray-700"><?= $comp_service ?></span></div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

                    <div class="bg-white rounded-xl shadow-sm overflow-hidden h-full">
                        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                            <h3 class="text-lg font-bold text-gray-800">Artikel Terpopuler</h3>
                            <a href="articles/index.php"
                                class="text-sm font-bold text-ghania-orange hover:underline">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-white text-gray-500 text-xs uppercase tracking-wider border-b">
                                    <tr>
                                        <th class="px-6 py-3">Judul Artikel</th>
                                        <th class="px-6 py-3 text-right">Views</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    <?php
                                    $top_articles = $db->table('articles')->orderBy('views', 'DESC')->limit(5)->get();
                                    if (count($top_articles) > 0):
                                        foreach ($top_articles as $art):
                                    ?>
                                    <tr class="hover:bg-orange-50 transition">
                                        <td class="px-6 py-3 font-medium text-gray-800 truncate max-w-xs"
                                            title="<?= htmlspecialchars($art['title_id']) ?>">
                                            <?= htmlspecialchars($art['title_id']) ?>
                                        </td>
                                        <td class="px-6 py-3 text-right">
                                            <span
                                                class="bg-green-100 text-green-700 font-bold px-2 py-1 rounded text-xs">
                                                <?= number_format($art['views']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach;
                                    else: ?>
                                    <tr>
                                        <td colspan="2" class="px-6 py-8 text-center text-gray-400 italic">Belum ada
                                            data.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm overflow-hidden h-full">
                        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                            <h3 class="text-lg font-bold text-gray-800">Layanan Paling Diminati</h3>
                            <a href="services/index.php" class="text-sm font-bold text-purple-600 hover:underline">Lihat
                                Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-white text-gray-500 text-xs uppercase tracking-wider border-b">
                                    <tr>
                                        <th class="px-6 py-3">Nama Layanan</th>
                                        <th class="px-6 py-3 text-right">Views</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    <?php
                                    $top_services_list = $db->table('services')->orderBy('views', 'DESC')->limit(5)->get();
                                    if (count($top_services_list) > 0):
                                        foreach ($top_services_list as $srv):
                                    ?>
                                    <tr class="hover:bg-purple-50 transition">
                                        <td class="px-6 py-3 font-medium text-gray-800 truncate max-w-xs">
                                            <?= htmlspecialchars($srv['title_id']) ?>
                                        </td>
                                        <td class="px-6 py-3 text-right">
                                            <span
                                                class="bg-purple-100 text-purple-700 font-bold px-2 py-1 rounded text-xs">
                                                <?= number_format($srv['views']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach;
                                    else: ?>
                                    <tr>
                                        <td colspan="2" class="px-6 py-8 text-center text-gray-400 italic">Belum ada
                                            data layanan.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctxTraffic = document.getElementById('trafficChart').getContext('2d');
    const gradient = ctxTraffic.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(255, 102, 0, 0.2)');
    gradient.addColorStop(1, 'rgba(255, 102, 0, 0)');

    new Chart(ctxTraffic, {
        type: 'line',
        data: {
            labels: <?= json_encode($traffic_labels) ?>,
            datasets: [{
                label: 'Pengunjung',
                data: <?= json_encode($traffic_data) ?>,
                borderColor: '#FF6600',
                backgroundColor: gradient,
                borderWidth: 3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#FF6600',
                pointBorderWidth: 2,
                pointRadius: 5,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [4, 4],
                        color: '#f3f4f6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            },
        }
    });

    const ctxDist = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctxDist, {
        type: 'doughnut',
        data: {
            labels: ['Landing Page', 'Artikel', 'Layanan'],
            datasets: [{
                data: [<?= $comp_home ?>, <?= $comp_article ?>, <?= $comp_service ?>],
                backgroundColor: ['#3B82F6', '#FF6600', '#A855F7'],
                borderWidth: 0,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    </script>
</body>

</html>