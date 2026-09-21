<?php
session_start();
require_once __DIR__ . '/../includes/koneksi.php';

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

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = trim($_POST['kode_barang']);
    $nama = trim($_POST['nama_barang']);
    $kategori = trim($_POST['kategori']);
    $stok = intval($_POST['stok']);
    $harga = floatval($_POST['harga_satuan']);

    if (!empty($kode) && !empty($nama) && !empty($kategori)) {
        try {
            $stmt = $pdo->prepare("UPDATE barang SET kode_barang = ?, nama_barang = ?, kategori = ?, stok = ?, harga_satuan = ? WHERE id = ?");
            $stmt->execute([$kode, $nama, $kategori, $stok, $harga, $id]);
            
            $_SESSION['flash'] = "Data barang berhasil diperbarui!";
            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $error = "Gagal memperbarui: Kode barang mungkin sudah digunakan.";
        }
    } else {
        $error = "Semua kolom wajib diisi!";
    }
}
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="card-box">
    <h2 class="text-xl font-bold text-slate-900 mb-6">Edit Barang</h2>

    <?php if (!empty($error)): ?>
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded-lg mb-4 text-sm">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-4">
        <div>
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" required class="form-input" value="<?= htmlspecialchars($barang['kode_barang']) ?>">
        </div>
        <div>
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" required class="form-input" value="<?= htmlspecialchars($barang['nama_barang']) ?>">
        </div>
        <div>
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" required class="form-input" value="<?= htmlspecialchars($barang['kategori']) ?>">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="form-label">Stok</label>
                <input type="number" name="stok" min="0" required class="form-input" value="<?= htmlspecialchars($barang['stok']) ?>">
            </div>
            <div>
                <label class="form-label">Harga Satuan (Rp)</label>
                <input type="number" step="0.01" name="harga_satuan" min="0" required class="form-input" value="<?= htmlspecialchars($barang['harga_satuan']) ?>">
            </div>
        </div>
        <div class="flex justify-end space-x-3 pt-4">
            <a href="list.php" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>