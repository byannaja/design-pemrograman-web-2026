<?php
session_start();
require_once __DIR__ . '/../includes/koneksi.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = trim($_POST['kode_supplier']);
    $nama = trim($_POST['nama_supplier']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);

    if (!empty($kode) && !empty($nama)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO supplier (kode_supplier, nama_supplier, email, telepon) VALUES (?, ?, ?, ?)");
            $stmt->execute([$kode, $nama, $email, $telepon]);
            
            $_SESSION['flash'] = "Data supplier berhasil ditambahkan!";
            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $error = "Gagal menyimpan: Kode supplier mungkin sudah terdaftar.";
        }
    } else {
        $error = "Kode dan Nama Supplier wajib diisi!";
    }
}
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="card-box max-w-xl mx-auto">
    <h2 class="text-xl font-bold text-slate-900 mb-6">Tambah Supplier Baru</h2>

    <?php if (!empty($error)): ?>
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded-lg mb-4 text-sm">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="space-y-4">
        <div>
            <label class="form-label">Kode Supplier</label>
            <input type="text" name="kode_supplier" required class="form-input" placeholder="Cth: SUP001">
        </div>
        <div>
            <label class="form-label">Nama Supplier / PT</label>
            <input type="text" name="nama_supplier" required class="form-input" placeholder="Cth: PT Sumber Pangan Utama">
        </div>
        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-input" placeholder="Cth: info@supplier.com">
        </div>
        <div>
            <label class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-input" placeholder="Cth: 08123456789">
        </div>
        <div class="flex justify-end space-x-3 pt-4">
            <a href="list.php" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>