// ======================================================
// MEMUAT DAFTAR ANGGOTA
// ======================================================

async function muatDaftarAnggota() {

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

        "../data/anggota.json",

        [
            "no_anggota",
            "nama",
            "alamat",
            "no_hp"
        ],

        tbody,

        loading,

        function (tr, anggota) {

            tr.innerHTML =

                "<td>" +
                    anggota.no_anggota +
                "</td>" +

                "<td>" +
                    anggota.nama +
                "</td>" +

                "<td>" +
                    anggota.alamat +
                "</td>" +

                "<td>" +
                    anggota.no_hp +
                "</td>" +

                "<td>" +

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
// JALANKAN SAAT HALAMAN SELESAI DIMUAT
// ======================================================

document.addEventListener(
    "DOMContentLoaded",
    function () {

        muatDaftarAnggota();

    }
);