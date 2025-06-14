import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Createkan kode untuk toggle dark mode
document.addEventListener("DOMContentLoaded", () => {
    const toggleThemeBtn = document.getElementById("toggleThemeBtn");
    const htmlElement = document.documentElement;

    // Periksa tema yang disimpan di localStorage
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        htmlElement.classList.add(savedTheme);
    }

    toggleThemeBtn?.addEventListener("click", () => {
        if (htmlElement.classList.contains("dark")) {
            htmlElement.classList.remove("dark");
            localStorage.setItem("theme", ""); // Delete tema dari localStorage
        } else {
            htmlElement.classList.add("dark");
            localStorage.setItem("theme", "dark"); // Simpan tema ke localStorage
        }
    });
});
