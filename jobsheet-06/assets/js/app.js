// ======================================================
// FUNGSI GENERIK UNTUK MEMUAT DATA JSON
// ======================================================

async function muatDataJSON(
    namaFile,
    namaKunci,
    tbody,
    loading,
    renderBaris
) {

    if (!tbody) return;

    if (loading) {
        loading.style.display = "block";
    }

    tbody.innerHTML = "";

    try {

        // Latihan 8.4 nomor 5
        // Delay diubah dari 600 ms menjadi 3000 ms
        await new Promise(function (resolve) {
            setTimeout(resolve, 3000);
        });

        const res = await fetch(namaFile);

        if (!res.ok) {
            throw new Error(
                "Gagal mengambil data (status " +
                res.status +
                ")"
            );
        }

        const data = await res.json();

        data.forEach(function (item) {

            const tr = document.createElement("tr");

            renderBaris(
                tr,
                item,
                namaKunci
            );

            tbody.appendChild(tr);

        });

    } catch (err) {

        tbody.innerHTML =
            "<tr>" +
                "<td colspan=\"" +
                    (namaKunci.length + 1) +
                    "\" class=\"error-row\">" +
                    "Gagal memuat data: " +
                    err.message +
                "</td>" +
            "</tr>";

    } finally {

        if (loading) {
            loading.style.display = "none";
        }

    }
}


// ======================================================
// HAMBURGER MENU
// ======================================================

function initNavToggle() {

    const toggleBtn =
        document.getElementById("nav-toggle-btn");

    const nav =
        document.querySelector("header nav");

    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener(
        "click",
        function () {

            nav.classList.toggle("nav-open");

        }
    );
}


// ======================================================
// KONFIRMASI HAPUS
// ======================================================

function initHapusConfirm() {

    document.addEventListener(
        "click",
        function (e) {

            // Latihan 8.4 nomor 4
            console.log(e.target);

            const btn =
                e.target.closest(".btn-hapus");

            if (!btn) return;

            const row =
                btn.closest("tr");

            if (!row) return;

            const cells =
                row.querySelectorAll("td");

            let nama = "data ini";

            if (cells.length > 0) {
                nama =
                    cells[0].textContent;
            }

            const yakin = confirm(
                "Yakin ingin menghapus \"" +
                nama +
                "\"?"
            );

            if (yakin) {
                row.remove();
            }

        }
    );
}


// ======================================================
// DETAIL BUKU
// ======================================================

function initDetailBuku() {

    document.addEventListener(
        "click",
        function (e) {

            const btn =
                e.target.closest(".btn-detail");

            if (!btn) return;

            const row =
                btn.closest("tr");

            if (!row) return;

            const cells =
                row.querySelectorAll("td");

            const no =
                cells[0]
                    ? cells[0].textContent
                    : "-";

            const judul =
                cells[1]
                    ? cells[1].textContent
                    : "-";

            const pengarang =
                cells[2]
                    ? cells[2].textContent
                    : "-";

            const tahun =
                cells[3]
                    ? cells[3].textContent
                    : "-";

            const stok =
                cells[4]
                    ? cells[4].textContent
                    : "-";

            const kategori =
                cells[5]
                    ? cells[5].textContent
                    : "-";

            alert(
                "DETAIL BUKU\n\n" +
                "No: " + no + "\n" +
                "Judul: " + judul + "\n" +
                "Pengarang: " + pengarang + "\n" +
                "Tahun: " + tahun + "\n" +
                "Stok: " + stok + "\n" +
                "Kategori: " + kategori
            );

        }
    );
}


// ======================================================
// FILTER / PENCARIAN TABEL
// ======================================================

function initTableFilter() {

    const input =
        document.getElementById(
            "search-input"
        );

    const table =
        document.querySelector(
            ".table-responsive table"
        );

    if (!input || !table) return;

    input.addEventListener(
        "keyup",
        function () {

            const keyword =
                input.value.toLowerCase();

            const rows =
                table.querySelectorAll(
                    "tbody tr"
                );

            rows.forEach(
                function (row) {

                    const teks =
                        row.textContent.toLowerCase();

                    if (
                        teks.includes(keyword)
                    ) {

                        row.style.display = "";

                    } else {

                        row.style.display = "none";

                    }

                }
            );

        }
    );
}


// ======================================================
// MENAMPILKAN ERROR FORM
// ======================================================

function tampilkanError(
    input,
    pesan
) {

    hapusError(input);

    const span =
        document.createElement(
            "span"
        );

    span.className = "error";

    span.textContent = pesan;

    input.insertAdjacentElement(
        "afterend",
        span
    );
}


// ======================================================
// MENGHAPUS ERROR FORM
// ======================================================

function hapusError(input) {

    const next =
        input.nextElementSibling;

    if (
        next &&
        next.classList.contains("error")
    ) {

        next.remove();

    }
}


// ======================================================
// VALIDASI FORM
// ======================================================

function initValidasiForm() {

    const form =
        document.getElementById(
            "form-tambah"
        );

    if (!form) return;

    form.addEventListener(
        "submit",
        function (e) {

            let valid = true;


            // ------------------------------------------
            // JUDUL / NAMA
            // ------------------------------------------

            const judul =
                form.querySelector(
                    "[name='judul'], [name='nama']"
                );

            if (
                judul &&
                judul.value.trim() === ""
            ) {

                tampilkanError(
                    judul,
                    "Field ini wajib diisi."
                );

                valid = false;

            } else if (judul) {

                hapusError(judul);

            }


            // ------------------------------------------
            // PENGARANG
            // ------------------------------------------

            const pengarang =
                form.querySelector(
                    "[name='pengarang']"
                );

            if (
                pengarang &&
                pengarang.value.trim() === ""
            ) {

                tampilkanError(
                    pengarang,
                    "Pengarang wajib diisi."
                );

                valid = false;

            } else if (pengarang) {

                hapusError(pengarang);

            }


            // ------------------------------------------
            // TAHUN
            // ------------------------------------------

            const tahun =
                form.querySelector(
                    "[name='tahun']"
                );

            if (tahun) {

                const nilai =
                    parseInt(
                        tahun.value,
                        10
                    );

                if (
                    isNaN(nilai) ||
                    nilai < 1900 ||
                    nilai > 2026
                ) {

                    tampilkanError(
                        tahun,
                        "Tahun harus di antara 1900-2026."
                    );

                    valid = false;

                } else {

                    hapusError(tahun);

                }

            }


            // ------------------------------------------
            // STOK
            // ------------------------------------------

            const stok =
                form.querySelector(
                    "[name='stok']"
                );

            if (stok) {

                const nilai =
                    parseInt(
                        stok.value,
                        10
                    );

                if (
                    isNaN(nilai) ||
                    nilai < 0
                ) {

                    tampilkanError(
                        stok,
                        "Stok tidak boleh negatif."
                    );

                    valid = false;

                } else {

                    hapusError(stok);

                }

            }


            // ------------------------------------------
            // CEGAH SUBMIT JIKA TIDAK VALID
            // ------------------------------------------

            if (!valid) {

                e.preventDefault();

            }

        }
    );
}


// ======================================================
// INISIALISASI SEMUA FITUR
// ======================================================

document.addEventListener(
    "DOMContentLoaded",
    function () {

        initNavToggle();

        initHapusConfirm();

        initDetailBuku();

        initTableFilter();

        initValidasiForm();

    }
);