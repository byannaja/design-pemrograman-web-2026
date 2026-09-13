// ===== 1. Hamburger menu =====
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        if (nav.style.display === "block") {
            nav.style.display = "";
        } else {
            nav.style.display = "block";
        }
    });
}

// ===== 2. Konfirmasi hapus & update counter =====
function initHapusConfirm() {
    const btns = document.querySelectorAll(".btn-hapus");
    if (btns.length === 0) return;

    btns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            const row = btn.closest("tr");
            const namaCell = row ? row.querySelectorAll("td")[1] : null;
            const nama = namaCell ? namaCell.textContent : "data ini";

            const yakin = confirm('Yakin ingin menghapus "' + nama + '"?');
            if (yakin && row) {
                row.remove();
                updateTableCounter();
            }
        });
    });
}

// ===== 3. Filter Tabel Khusus Kolom Nama & update counter =====
function initTableFilter() {
    const input = document.getElementById("search-input") || document.querySelector(".search-box input");
    const table = document.querySelector(".table-responsive table");
    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach(function (row) {
            const namaCell = row.querySelectorAll("td")[1];
            const teksNama = namaCell ? namaCell.textContent.toLowerCase() : "";
            
            row.style.display = teksNama.includes(keyword) ? "" : "none";
        });

        updateTableCounter();
    });
}

// ===== 4. Fitur Counter Jumlah Baris Tersisa =====
function updateTableCounter() {
    const table = document.querySelector(".table-responsive table");
    const counterEl = document.getElementById("table-counter");
    if (!table || !counterEl) return;

    const allRows = table.querySelectorAll("tbody tr");
    let visibleCount = 0;

    allRows.forEach(function (row) {
        if (row.style.display !== "none") {
            visibleCount++;
        }
    });

    counterEl.textContent = `Menampilkan ${visibleCount} dari ${allRows.length} data`;
}

// ===== 5. Helper Validasi Form =====
function tampilkanError(input, pesan) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.textContent = pesan;
    input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}

// ===== 6. Refactor Validasi Form =====
function initValidasiForm() {
    const form = document.getElementById("form-tambah");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        const validationRules = [
            {
                name: "nama",
                validate: (val) => val.trim() !== "",
                message: "Nama wajib diisi."
            },
            {
                name: "no_anggota",
                validate: (val) => val.trim() !== "",
                message: "No. Anggota wajib diisi."
            },
            {
                name: "judul",
                validate: (val) => val.trim() !== "",
                message: "Judul wajib diisi."
            },
            {
                name: "pengarang",
                validate: (val) => val.trim() !== "",
                message: "Pengarang wajib diisi."
            },
            {
                name: "isbn",
                validate: (val) => val === "" || /^[0-9-]+$/.test(val),
                message: "ISBN hanya boleh berisi angka dan tanda hubung (-)."
            },
            {
                name: "no_hp",
                validate: (val) => val === "" || /^[0-9+]+$/.test(val),
                message: "No. HP hanya boleh berisi angka dan tanda +."
            },
            {
                name: "tahun",
                validate: (val) => {
                    if (val === "") return true;
                    const n = parseInt(val, 10);
                    return !isNaN(n) && n >= 1900 && n <= 2026;
                },
                message: "Tahun harus di antara 1900-2026."
            },
            {
                name: "stok",
                validate: (val) => {
                    if (val === "") return true;
                    const n = parseInt(val, 10);
                    return !isNaN(n) && n >= 0;
                },
                message: "Stok tidak boleh negatif."
            }
        ];

        validationRules.forEach(function (rule) {
            const field = form.querySelector(`[name='${rule.name}']`);
            if (field) {
                if (!rule.validate(field.value)) {
                    tampilkanError(field, rule.message);
                    valid = false;
                } else {
                    hapusError(field);
                }
            }
        });

        if (!valid) {
            e.preventDefault();
        }
    });
}

// ===== Event Listener Utama =====
document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
    updateTableCounter();
});