document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('[data-mobile-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (menuToggle && mobileMenu) {
        const closeMenu = () => {
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Buka menu navigasi');
            menuToggle.setAttribute('title', 'Buka menu navigasi');
            mobileMenu.classList.remove('is-open');
        };

        menuToggle.addEventListener('click', function () {
            const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', String(!isOpen));
            menuToggle.setAttribute('aria-label', isOpen ? 'Buka menu navigasi' : 'Tutup menu navigasi');
            menuToggle.setAttribute('title', isOpen ? 'Buka menu navigasi' : 'Tutup menu navigasi');
            mobileMenu.classList.toggle('is-open', !isOpen);
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });
    }

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