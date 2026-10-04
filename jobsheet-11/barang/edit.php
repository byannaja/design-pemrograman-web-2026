<?php
session_start();
require_once __DIR__ . '/../includes/koneksi.php';
require_once __DIR__ . '/../includes/security.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->execute([$id]);
$barang = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$barang) {
    header("Location: list.php");
    exit;
}

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="card-box">
    <h2 class="text-xl font-bold text-slate-900 mb-6">Edit Barang</h2>

    <?php if (!empty($error)): ?>
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded-lg mb-4 text-sm">
            <?= e($error) ?>
        </div>
    <?php endif; ?>

    <form action="proses_edit.php" method="POST" class="space-y-4">
        <!-- Tambahan Token CSRF -->
        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
        
        <input type="hidden" name="id" value="<?= $barang['id'] ?>">
        <div>
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" required class="form-input" value="<?= e($barang['kode_barang']) ?>">
        </div>
        <div>
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" required class="form-input" value="<?= e($barang['nama_barang']) ?>">
        </div>
        <div>
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" required class="form-input" value="<?= e($barang['kategori']) ?>">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="form-label">Stok</label>
                <input type="number" name="stok" min="0" required class="form-input" value="<?= e($barang['stok']) ?>">
            </div>
            <div>
                <label class="form-label">Harga Satuan (Rp)</label>
                <input type="number" step="0.01" name="harga_satuan" min="0" required class="form-input" value="<?= e($barang['harga_satuan']) ?>">
            </div>
        </div>
        <div class="flex justify-end space-x-3 pt-4">
            <a href="list.php" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>[cite: 24]