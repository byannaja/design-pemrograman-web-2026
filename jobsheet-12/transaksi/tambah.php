<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/security.php';

$stmt = $pdo->query('SELECT id, kode_barang, nama_barang, stok FROM barang ORDER BY nama_barang');
$barangList = $stmt->fetchAll(PDO::FETCH_ASSOC);
$error = $_SESSION['form_error'] ?? '';
unset($_SESSION['form_error']);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Catat Mutasi Stok</h2>
        <p class="text-sm text-gray-500">Stok barang diperbarui bersama catatan mutasi dalam satu transaksi database.</p>
    </div>

    <?php if ($error): ?>
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-lg mb-5 text-sm"><?= e($error) ?></div>
    <?php endif; ?>

    <?php if (!$barangList): ?>
        <div class="bg-amber-50 border border-amber-200 text-amber-900 p-4 rounded-lg mb-5 text-sm">Belum ada barang. Tambahkan data barang terlebih dahulu.</div>
    <?php endif; ?>

    <div class="card-box">
        <form action="/jobsheet-12/transaksi/proses_tambah.php" method="POST" class="space-y-5">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div>
                <label for="barang_id" class="form-label">Barang</label>
                <select id="barang_id" name="barang_id" required class="form-input" <?= !$barangList ? 'disabled' : '' ?>>
                    <option value="">Pilih barang</option>
                    <?php foreach ($barangList as $barang): ?>
                        <option value="<?= e($barang['id']) ?>"><?= e($barang['kode_barang']) ?> - <?= e($barang['nama_barang']) ?> (stok: <?= e($barang['stok']) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="jenis" class="form-label">Jenis Mutasi</label>
                <select id="jenis" name="jenis" required class="form-input">
                    <option value="masuk">Barang masuk</option>
                    <option value="keluar">Barang keluar</option>
                </select>
            </div>
            <div>
                <label for="jumlah" class="form-label">Jumlah</label>
                <input id="jumlah" type="number" name="jumlah" min="1" step="1" required class="form-input">
            </div>
            <div>
                <label for="catatan" class="form-label">Catatan (opsional)</label>
                <textarea id="catatan" name="catatan" rows="3" maxlength="500" class="form-input"></textarea>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="/jobsheet-12/transaksi/list.php" class="btn-secondary">Batal</a>
                <button type="submit" class="btn-primary" <?= !$barangList ? 'disabled' : '' ?>>Simpan Mutasi</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>