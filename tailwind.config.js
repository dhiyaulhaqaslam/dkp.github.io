import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.{html,js,php,vue}", // Tambahkan ekstensi yang sesuai dengan proyekmu
        "./resources/js/**/*.js", // Tambahkan JS di sini jika ada
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                aurora: "linear-gradient(to right, #22c55e, #3b82f6, #a855f7, #ec4899)",
            },

            colors: {
                custom: {
                    100: "rgba(158, 104, 158, 0.46)",
                },
            },

            minWidth: {
                sm: "500px",
                md: "600px",
                lg: "700px",
                xl: "800px",
            },
            textUnderlineOffset: {
                10: "10px",
                12: "12px",
                16: "16px",
                20: "20px",
                24: "24px",
                25: "25px",
                32: "32px",
            },
            animation: {
                "fade-in": "fadeIn 0.5s ease-in-out forwards",
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0", transform: "translateY(10px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
            },
        },
    },

    plugins: [forms],
};
