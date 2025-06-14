document.addEventListener("DOMContentLoaded", () => {
    const openSidebarBtn = document.getElementById("openSidebarBtn");
    const closeSidebarBtn = document.getElementById("closeSidebarBtn");
    const sidebar = document.getElementById("sidebar");

    // Fungsi untuk membuka sidebar
    const openSidebar = () => {
        sidebar.classList.remove("hidden");
    };

    // Fungsi untuk menutup sidebar
    const closeSidebar = () => {
        sidebar.classList.add("hidden");
    };

    // Fungsi untuk mengecek lebar layar
    const isScreenSmall = () => window.innerWidth < 1024;

    // Perbarui tombol sesuai kondisi layar
    const updateButtonState = () => {
        if (openSidebarBtn) {
            if (isScreenSmall()) {
                openSidebarBtn.disabled = false;
                openSidebarBtn.classList.remove(
                    "cursor-not-allowed",
                    "opacity-50"
                );
            } else {
                openSidebarBtn.disabled = true;
                openSidebarBtn.classList.add(
                    "cursor-not-allowed",
                    "opacity-50"
                );
            }
        }
    };

    // Tambahkan event listener untuk resize
    window.addEventListener("resize", updateButtonState);

    // Inisialisasi tombol pada saat pertama kali halaman dimuat
    updateButtonState();

    // Event listener untuk tombol buka sidebar
    if (openSidebarBtn) {
        openSidebarBtn.addEventListener("click", () => {
            if (isScreenSmall()) {
                openSidebar();
            }
        });
    }

    // Event listener untuk tombol tutup sidebar
    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener("click", closeSidebar);
    }
});
