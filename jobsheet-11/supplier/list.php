<?php
session_start();
require_once __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$search = trim($_GET['q'] ?? '');

try {
    if (!empty($search)) {
        $stmtCount = $pdo->prepare("SELECT COUNT(*) FROM supplier WHERE nama_supplier ILIKE ? OR kode_supplier ILIKE ?");
        $stmtCount->execute(["%$search%", "%$search%"]);
        $totalData = $stmtCount->fetchColumn();

        $stmt = $pdo->prepare("SELECT * FROM supplier WHERE nama_supplier ILIKE ? OR kode_supplier ILIKE ? ORDER BY id DESC LIMIT ? OFFSET ?");
        $stmt->bindValue(1, "%$search%", PDO::PARAM_STR);
        $stmt->bindValue(2, "%$search%", PDO::PARAM_STR);
        $stmt->bindValue(3, $limit, PDO::PARAM_INT);
        $stmt->bindValue(4, $offset, PDO::PARAM_INT);
        $stmt->execute();
        $daftar_supplier = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmtCount = $pdo->query("SELECT COUNT(*) FROM supplier");
        $totalData = $stmtCount->fetchColumn();

        $stmt = $pdo->prepare("SELECT * FROM supplier ORDER BY id DESC LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        $daftar_supplier = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $totalPages = ceil($totalData / $limit);
} catch (PDOException $e) {
    $daftar_supplier = [];
    $totalPages = 1;
}
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Daftar Supplier Barang</h2>
        <p class="text-sm text-gray-500">Kelola data mitra pemasok barang toko di sini.</p>
    </div>
    
    <div class="flex gap-2 w-full md:w-auto items-center">
        <form action="list.php" method="GET" class="flex gap-2">
            <input type="text" id="search-input" name="q" value="<?= htmlspecialchars($search) ?>" placeholder="Cari supplier..." class="form-input text-sm py-1.5 px-3">
            <button type="submit" class="btn-primary text-xs py-1.5 px-3 whitespace-nowrap">Cari</button>
        </form>
        <a href="list.php" class="btn-secondary text-xs py-2 px-3 whitespace-nowrap" title="Muat ulang halaman">
            Muat Ulang
        </a>
    </div>

    <a href="tambah.php" class="btn-primary whitespace-nowrap">+ Tambah Supplier</a>
</div>

<?php if (!empty($flash)): ?>
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-lg mb-6 text-sm">
        <?= htmlspecialchars($flash) ?>
    </div>
<?php endif; ?>

<div class="table-container mb-6">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-700 text-xs uppercase font-semibold tracking-wider">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Kode Supplier</th>
                    <th class="py-3 px-4">Nama Supplier</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Telepon</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                <?php if (empty($daftar_supplier)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data supplier.</td>
                    </tr>
                <?php else: ?>
                    <?php $no = $offset + 1; foreach ($daftar_supplier as $s): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4 font-medium text-slate-900"><?= htmlspecialchars($s['kode_supplier']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($s['nama_supplier']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($s['email']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($s['telepon']) ?></td>
                        <td class="py-3 px-4 text-center space-x-2 flex justify-center items-center">
                            <a href="edit.php?id=<?= $s['id'] ?>" class="btn-info">Edit</a>
                            <form action="hapus.php" method="POST" class="inline-block form-hapus m-0">
                                <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                <button type="submit" class="btn-danger cursor-pointer">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($totalPages > 1): ?>
    <div class="flex justify-center space-x-1 my-4">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="list.php?page=<?= $i ?><?= !empty($search) ? '&q=' . urlencode($search) : '' ?>" 
               class="px-3 py-1.5 text-sm rounded border <?= $i === $page ? 'bg-amber-500 text-slate-900 font-semibold border-amber-500' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>