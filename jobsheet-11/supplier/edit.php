<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM anggota WHERE id = ?");
$stmt->execute([$id]);
$anggota = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$anggota) {
    header("Location: list.php");
    exit;
}

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="card-box">
    <h2 class="text-xl font-bold text-slate-900 mb-6">Edit Data Anggota</h2>

    <?php if (!empty($error)): ?>
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded-lg mb-4 text-sm">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="proses_edit.php" method="POST" class="space-y-4">
        <input type="hidden" name="id" value="<?= $anggota['id'] ?>">
        <div>
            <label class="form-label">Kode Anggota</label>
            <input type="text" name="kode_anggota" required class="form-input" value="<?= htmlspecialchars($anggota['kode_anggota']) ?>">
        </div>
        <div>
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required class="form-input" value="<?= htmlspecialchars($anggota['nama_lengkap']) ?>">
        </div>
        <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" required class="form-input" value="<?= htmlspecialchars($anggota['email']) ?>">
        </div>
        <div>
            <label class="form-label">Telepon</label>
            <input type="text" name="telepon" required class="form-input" value="<?= htmlspecialchars($anggota['telepon']) ?>">
        </div>
        <div class="flex justify-end space-x-3 pt-4">
            <a href="list.php" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>