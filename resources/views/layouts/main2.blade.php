<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Web DKP | {{ $title }} </title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/19579c18fe.js" crossorigin="anonymous"></script> <!--FONT AWESOME-->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Styles -->
    @if (app()->environment('production'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-CZeGmhTr.css') }}">
        <script src="{{ asset('build/assets/app-CUW5_qJq.js') }}" defer></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link rel="shortcut icon" href="{{ asset('ASSETS/dkp_mks.png') }}" type="image/x-icon">
    <script src="{{ asset('js/animasi-loading.js') }}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sofadi+One&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
    </style>
    {{-- ASING --}}
</head>
<!-- MAIN2 -->
<div id="loading-spinner" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">
    <div class="w-16 h-16 border-t-4 border-blue-500 border-solid rounded-full animate-spin"></div>
</div>
<style>
    nav {
        position: static;
        /* default: tidak fixed di mobile */
        width: 100%;
        z-index: 50;
        background-color: rgba(31, 41, 55, 0.3);
        /* mirip bg-gray-800/30 */
        backdrop-filter: blur(6px);
    }

    @media (min-width: 768px) {
        nav {
            position: fixed;
            /* aktif hanya di layar md ke atas */
            top: 0;
            left: 0;
            z-index: 50;
            width: 100%;
            background-color: rgba(17, 24, 39, 0.75);
            /* mirip dark:bg-gray-900/75 */
        }

        main,
        .page-content {
            /* beri padding agar konten tidak tertutup navbar */
            padding-top: 4rem;
            /* kira-kira tinggi navbar (64px) */
        }
    }
</style>
@stack('scripts')

<body
    class="antialiased font-poppins bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 flex flex-col min-h-screen">
    <nav x-data="{ open: false }"
        class="z-50 w-fullstroke-slate-950 bg-blend-color-dodge bg-gray-800/30 dark:bg-gray-900/75">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a id="openSidebarBtn">
                            <img src="{{ asset('ASSETS/dkp_mks.png') }}"
                                class="block h-8 w-8 fill-current text-gray-200 dark:text-gray-200 rounded-full" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 md:-my-px md:ms-10 md:flex">
                        <x-nav-link :href="url($backUrl)">
                            <span
                                class="rounded border border-gray-300 dark:border-gray-600 dark:hover:border-indigo-600 px-1 md:px-3 py-2 text-gray-100/100 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500 text-xs md:text-md">
                                <svg class="w-6 md:w-4 h-4 rotate-180 inline-block" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                                <span class="hidden md:inline">Back</span>
                            </span>
                        </x-nav-link>
                        @auth
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard') ||
                                request()->routeIs('preference.*') ||
                                request()->routeIs('attendance.*') ||
                                request()->routeIs('informasi.*')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        @endauth
                        <x-nav-link class="text-white hover:text-zinc-300" :href="route('welcome')" :active="request()->is('welcome')">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link class="text-white hover:text-zinc-300" :href="route('about.index')" :active="request()->routeIs('about.index')">
                            {{ __('About') }}
                        </x-nav-link>
                        <x-nav-link class="text-white hover:text-zinc-300" :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                            {{ __('Contact') }}
                        </x-nav-link>
                        <!-- Teks Features -->
                        <button id="dropdownButton"
                            class="relative inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white dark:text-gray-400 hover:text-zinc-300 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-200 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                            {{ __('Features') }}
                            <!-- Icon panah bawah -->
                            <svg class="w-4 h-4 ms-1 text-gray-500 group-hover:text-gray-800 dark:text-gray-400 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                            <!-- Dropdown Content -->
                            <div id="dropdownMenu"
                                class="absolute left-0 hidden group-hover:block w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-10 dark:bg-gray-800"
                                style="top: calc(100% + 0.5rem);">
                                <a href="{{ route('article.index') }}"
                                    class="block px-4 py-2 text-start text-gray-800 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    {{ __('Article') }}
                                </a>
                                <a href="{{ route('longwis.index') }}"
                                    class="block px-4 py-2 text-start text-gray-800 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    {{ __('Longwis') }}
                                </a>
                                <a href="{{ route('projects.index') }}"
                                    class="block px-4 py-2 text-start text-gray-800 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    {{ __('Project') }}
                                </a>
                                <a href="{{ route('chatbot.ask') }}"
                                    class="block px-4 py-2 text-start text-gray-800 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    {{ __('Chatbot') }}
                                </a>
                                <a href="{{ route('feedbacks.index') }}"
                                    class="block px-4 py-2 text-start text-gray-800 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    {{ __('Feedbacks') }}
                                </a>
                            </div>
                        </button>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const dropdownButton = document.getElementById('dropdownButton');
                        const dropdownMenu = document.getElementById('dropdownMenu');

                        // Createkan event listener untuk tombol dropdown
                        dropdownButton.addEventListener('click', function() {
                            dropdownMenu.classList.toggle('hidden');
                        });

                        // Tutup dropdown jika klik di luar area dropdown
                        document.addEventListener('click', function(e) {
                            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                                dropdownMenu.classList.add('hidden');
                            }
                        });
                    });
                </script>

                <!-- Settings Dropdown -->
                <div class="hidden md:flex md:items-center md:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @auth
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            @else
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>Guest</div>
                                </button>
                            @endauth
                        </x-slot>

                        <x-slot name="content">
                            @auth
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @else
                                <x-dropdown-link :href="route('login')">
                                    {{ __('Login') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('register')">
                                    {{ __('Register') }}
                                </x-dropdown-link>
                            @endauth
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center md:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
            <!-- Dashboard Link -->
            <div class="pt-2 space-y-1">
                <x-responsive-nav-link class="" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="" :href="route('welcome')" :active="request()->is('welcome')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="" :href="route('about.index')" :active="request()->routeIs('about.index')">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link class="" :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
            </div>
            <!-- Features Dropdown -->
            <div x-data="{ openFeatures: false }" class="space-y-1">
                <x-responsive-nav-link class="" href="#" @click.prevent="openFeatures = !openFeatures">
                    Features
                    <svg :class="{ 'rotate-180': openFeatures, 'rotate-0': !openFeatures }"
                        class="w-4 h-4 ml-2 inline transform transition-transform duration-200"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </x-responsive-nav-link>
                <div x-show="openFeatures" x-transition class="space-y-1 pl-4">
                    <x-responsive-nav-link class="" :href="route('article.index')" :active="request()->routeIs('article.index')">
                        {{ __('Article') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="" :href="route('longwis.index')" :active="request()->routeIs('longwis.index')">
                        {{ __('Longwis') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="" :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                        {{ __('Projects') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="" :href="route('chatbot.ask')" :active="request()->routeIs('chatbot.ask')">
                        {{ __('Chatbot') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="" :href="route('feedbacks.index')" :active="request()->routeIs('feedbacks.index')">
                        {{ __('Feedbacks') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-400 dark:border-gray-600">
                <div class="px-4">
                    @auth
                        <div class="font-medium text-base">{{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm">{{ Auth::user()->email }}</div>
                    @else
                        <div class="font-medium text-base text-gray-600 dark:text-red-400">Guest</div>
                    @endauth
                </div>

                <div class="mt-3 space-y-1">
                    @auth
                        <x-responsive-nav-link class="" :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link class="" :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    @else
                        <x-responsive-nav-link class="" :href="route('login')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                    @endauth
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </nav>

    <div class="flex-grow pt-16 bg-gray-100 dark:bg-gray-900 text-gray-500 dark:text-gray-400">
        @yield('content')
    </div>
    <script>
        // Fungsi untuk menghapus kelas warna latar belakang dan teks
        function resetColors() {
            document.querySelectorAll('*').forEach(function(element) {
                element.classList.remove('bg-gray-100', 'bg-gray-800', 'text-gray-800', 'text-gray-100');
            });
        }

        // Mengecek preferensi tema dan mengatur warna
        function applyTheme() {
            resetColors();

            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        // Menerapkan tema saat pertama kali dimuat
        applyTheme();

        // Menangani perubahan preferensi tema
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
            applyTheme();
        });
    </script>
    <footer class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class=" border-t border-gray-100 py-4 dark:border-gray-600">
            <p class="text-center text-xs/relaxed">
                © Dinas Ketahanan Pangan 2024. All rights reserved.
                <br />
                Created with
                <a href="#"
                    class="underline transition hover:text-indigo-800/100 dark:hover:text-gray-100/75">Laravel</a>
            </p>
        </div>
    </footer>
</body>

</html>
