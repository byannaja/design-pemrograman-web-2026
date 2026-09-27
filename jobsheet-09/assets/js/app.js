document.addEventListener('DOMContentLoaded', function () {
    // initHapusConfirm: Konfirmasi hapus pada event submit form
    const formHapusList = document.querySelectorAll('.form-hapus');
    
    formHapusList.forEach(form => {
        form.addEventListener('submit', function (e) {
            const konfirmasi = confirm('Apakah Anda yakin ingin menghapus data ini?');
            if (!konfirmasi) {
                e.preventDefault(); // Batalkan submit jika user klik Cancel
            }
        });
    });
});