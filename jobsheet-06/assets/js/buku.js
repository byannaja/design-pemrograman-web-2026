// ======================================================
// MEMUAT DAFTAR BUKU
// ======================================================

async function muatDaftarBuku() {

    const tbody =
        document.querySelector(
            ".table-responsive table tbody"
        );

    const loading =
        document.getElementById(
            "loading-indicator"
        );

    if (!tbody) return;


    await muatDataJSON(

        "../data/buku.json",

        [
            "no",
            "judul",
            "pengarang",
            "tahun",
            "stok",
            "kategori"
        ],

        tbody,

        loading,

        function (tr, buku) {

            tr.innerHTML =

                "<td>" +
                    buku.no +
                "</td>" +

                "<td>" +
                    buku.judul +
                "</td>" +

                "<td>" +
                    buku.pengarang +
                "</td>" +

                "<td>" +
                    buku.tahun +
                "</td>" +

                "<td>" +
                    buku.stok +
                "</td>" +

                "<td>" +
                    buku.kategori +
                "</td>" +

                "<td>" +

                    "<button " +
                        "type=\"button\" " +
                        "class=\"btn-detail\">" +
                        "Detail" +
                    "</button> " +

                    "<button " +
                        "type=\"button\">" +
                        "Edit" +
                    "</button> " +

                    "<button " +
                        "type=\"button\" " +
                        "class=\"btn-hapus\">" +
                        "Hapus" +
                    "</button>" +

                "</td>";

        }

    );

}


// ======================================================
// TOMBOL MUAT ULANG
// ======================================================

function initReloadBuku() {

    const btnReload =
        document.getElementById(
            "btn-reload"
        );

    if (!btnReload) return;

    btnReload.addEventListener(
        "click",
        function () {

            muatDaftarBuku();

        }
    );
}


// ======================================================
// JALANKAN SAAT HALAMAN SELESAI DIMUAT
// ======================================================

document.addEventListener(
    "DOMContentLoaded",
    function () {

        muatDaftarBuku();

        initReloadBuku();

    }
);