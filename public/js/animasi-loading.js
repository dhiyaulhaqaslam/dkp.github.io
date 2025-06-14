document.addEventListener("DOMContentLoaded", () => {
    const loadingSpinner = document.getElementById("loading-spinner");
    const content = document.getElementById("content");

    // Tampilkan spinner
    loadingSpinner.classList.remove("hidden");
    loadingSpinner.classList.add("flex"); // Menambahkan flex untuk menampilkan spinner

    // Simulasi proses loading
    setTimeout(() => {
        loadingSpinner.classList.add("hidden"); // Sembunyikan spinner
        content.classList.remove("hidden"); // Tampilkan konten
        content.classList.add("flex"); // Menambahkan flex ke konten
    }, 500); // 0,5 detik
});
