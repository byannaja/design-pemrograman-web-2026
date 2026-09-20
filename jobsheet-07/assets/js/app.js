// ======================================================
// HAMBURGER MENU (MOBILE)
// ======================================================

function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle");
    const nav = document.querySelector("header nav");

    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}


// ======================================================
// KONFIRMASI HAPUS BARIS TABEL CLIENT-SIDE
// ======================================================

function initHapusConfirm() {
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".btn-hapus");
        if (!btn) return;

        const row = btn.closest("tr");
        if (!row) return;

        const cells = row.querySelectorAll("td");
        let nama = "data ini";

        if (cells.length > 0) {
            nama = cells[1] ? cells[1].textContent : cells[0].textContent;
        }

        const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?");
        if (yakin) {
            row.remove();
        }
    });
}


// ======================================================
// INISIALISASI UTAMA
// ======================================================

document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
});