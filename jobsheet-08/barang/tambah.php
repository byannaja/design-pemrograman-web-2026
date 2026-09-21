<?php
session_start();
require_once '../includes/koneksi.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = trim($_POST['kode_barang']);
    $nama = trim($_POST['nama_barang']);
    $kategori = trim($_POST['kategori']);
    $stok = intval($_POST['stok']);
    $harga = floatval($_POST['harga_satuan']);

    if (!empty($kode) && !empty($nama) && !empty($kategori)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO barang (kode_barang, nama_barang, kategori, stok, harga_satuan) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$kode, $nama, $kategori, $stok, $harga]);
            
            $_SESSION['flash'] = "Data barang berhasil ditambahkan!";
            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $error = "Gagal menyimpan: Kode barang mungkin sudah terdaftar.";
        }
    } else {
        $error = "Semua kolom wajib diisi!";
    }
}
?>
<?php include '../includes/header.php'; ?>

<div class="card-box">
    <h2 class="text-xl font-bold text-slate-900 mb-6">Tambah Barang Baru</h2>

    <?php if (!empty($error)): ?>
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded-lg mb-4 text-sm">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-4">
        <div>
            <label class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" required class="form-input" placeholder="Cth: BRG001">
        </div>
        <div>
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" required class="form-input" placeholder="Cth: Minyak Goreng 2L">
        </div>
        <div>
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" required class="form-input" placeholder="Cth: Sembako">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="form-label">Stok Awal</label>
                <input type="number" name="stok" min="0" required class="form-input" value="0">
            </div>
            <div>
                <label class="form-label">Harga Satuan (Rp)</label>
                <input type="number" step="0.01" name="harga_satuan" min="0" required class="form-input" value="0">
            </div>
        </div>
        <div class="flex justify-end space-x-3 pt-4">
            <a href="list.php" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan</button>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>