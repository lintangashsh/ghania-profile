<?php
/**
 * @var Database $db
 */
session_start();
require '../../config/database.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$page_title = "Kelola Layanan";
include '../../admin/includes/header.php';
?>

<div class="flex h-screen overflow-hidden">
    <?php include '../../admin/includes/sidebar.php'; ?>

    <div class="flex-1 flex flex-col md:ml-64 transition-all duration-300">

        <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center z-10">
            <h2 class="text-xl font-bold text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-2 text-ghania-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                Daftar Layanan
            </h2>

            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-500 hidden md:inline">Halo, <b><?= $_SESSION['admin_name'] ?></b></span>
                <a href="create.php"
                    class="bg-ghania-orange text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition text-sm font-bold shadow-md flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Layanan
                </a>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">

            <?php if (isset($_GET['msg'])): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm relative"
                role="alert">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <strong class="font-bold">Sukses!</strong>
                        <span class="block sm:inline">
                            <?php
                                if ($_GET['msg'] == 'added') echo "Layanan baru berhasil ditambahkan.";
                                if ($_GET['msg'] == 'updated') echo "Data layanan berhasil diperbarui.";
                                if ($_GET['msg'] == 'deleted') echo "Layanan berhasil dihapus.";
                                ?>
                        </span>
                    </div>
                </div>
                <button onclick="this.parentElement.style.display='none';"
                    class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </button>
            </div>
            <?php endif; ?>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider border-b">
                                <th class="p-4 font-bold text-center w-16">No</th>
                                <th class="p-4 font-bold w-24">Thumbnail</th>
                                <th class="p-4 font-bold">Info Layanan</th>
                                <th class="p-4 font-bold text-center w-40">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php
                            $services = $db->table('services')->orderBy('id', 'DESC')->get();
                            $no = 1;

                            if (count($services) > 0):
                                foreach ($services as $row):
                            ?>
                            <tr class="hover:bg-orange-50 transition duration-150">
                                <td class="p-4 text-center text-gray-500 font-medium"><?= $no++ ?></td>

                                <td class="p-4">
                                    <?php if (!empty($row['thumbnail'])): ?>
                                    <img src="../../<?= $row['thumbnail'] ?>" alt="Thumb"
                                        class="h-12 w-12 object-cover rounded-lg shadow-sm border border-gray-200">
                                    <?php else: ?>
                                    <div
                                        class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs border border-gray-200">
                                        No Img</div>
                                    <?php endif; ?>
                                </td>

                                <td class="p-4">
                                    <div class="mb-1">
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-orange-100 text-ghania-orange mr-2">ID</span>
                                        <span
                                            class="font-bold text-ghania-dark"><?= htmlspecialchars($row['title_id']) ?></span>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 mr-2">EN</span>
                                        <?= htmlspecialchars($row['title_en']) ?>
                                    </div>
                                </td>

                                <td class="p-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="edit.php?id=<?= $row['id'] ?>"
                                            class="p-2 bg-yellow-100 text-yellow-600 rounded-lg hover:bg-yellow-200 transition shadow-sm"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="delete.php?id=<?= $row['id'] ?>"
                                            onclick="return confirm('Yakin ingin menghapus layanan ini?')"
                                            class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition shadow-sm"
                                            title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                endforeach;
                            else:
                                ?>
                            <tr>
                                <td colspan="4" class="p-10 text-center text-gray-400 bg-gray-50">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                        <p class="text-lg font-medium">Belum ada layanan yang ditambahkan.</p>
                                        <p class="text-sm mb-4">Mulai tambahkan layanan agar muncul di halaman depan.
                                        </p>
                                        <a href="create.php"
                                            class="bg-ghania-orange text-white px-6 py-2 rounded-full font-bold hover:bg-orange-600 transition shadow-lg">
                                            + Tambah Layanan Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</div>

</body>

</html>