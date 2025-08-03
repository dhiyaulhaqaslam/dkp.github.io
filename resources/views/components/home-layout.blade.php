<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web DKP | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js" defer></script>
    <script src="https://kit.fontawesome.com/19579c18fe.js" crossorigin="anonymous"></script> <!--FONT AWESOME-->
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('ASSETS/dkp_mks.png') }}" type="image/x-icon">
    <script src="{{ asset('js/animasi-loading.js') }}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sofadi+One&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
    </style>
    {{-- ASING --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <style>
        .bidang {
            max-height: 1080px;
        }

        body {
            overflow-x: hidden;
        }
    </style>
</head>
<div id="loading-spinner" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">
    <div class="w-16 h-16 border-t-4 border-blue-500 border-solid rounded-full animate-spin"></div>
</div>

<body class="antialiased font-poppins bg-white dark:bg-gray-900 flex flex-col min-h-screen">
    <div class="bg-cover items-center lg:max-h-full bg-no-repeat bg-blend-color-dodge bg-gray-700/70 dark:bg-gray-900/75"
        style="background-image: url('{{ asset('ASSETS/banner1-pangan.jpg') }}');">
        <nav x-data="{ open: false }"
            class="text-gray-200 dark:text-red-400 border-b border-gray-400 dark:border-gray-700 stroke-slate-950 bg-blend-color-dodge bg-gray-700/70 dark:bg-gray-900/75">
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
                    <x-responsive-nav-link class="text-white/100" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="text-white/100" :href="route('welcome')" :active="request()->is('welcome')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="text-white/100" :href="route('about.index')" :active="request()->routeIs('about.index')">
                        {{ __('About') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="text-white/100" :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                        {{ __('Contact') }}
                    </x-responsive-nav-link>
                </div>
                <!-- Features Dropdown -->
                <div x-data="{ openFeatures: false }" class="space-y-1">
                    <x-responsive-nav-link class="text-white/100" href="#"
                        @click.prevent="openFeatures = !openFeatures">
                        Features
                        <svg :class="{ 'rotate-180': openFeatures, 'rotate-0': !openFeatures }"
                            class="w-4 h-4 ml-2 inline transform transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </x-responsive-nav-link>
                    <div x-show="openFeatures" x-transition class="space-y-1 pl-4">
                        <x-responsive-nav-link class="text-white/100" :href="route('article.index')" :active="request()->routeIs('article.index')">
                            {{ __('Article') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="text-white/100" :href="route('longwis.index')" :active="request()->routeIs('longwis.index')">
                            {{ __('Longwis') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="text-white/100" :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                            {{ __('Projects') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="text-white/100" :href="route('chatbot.ask')" :active="request()->routeIs('chatbot.ask')">
                            {{ __('Chatbot') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="text-white/100" :href="route('feedbacks.index')" :active="request()->routeIs('feedbacks.index')">
                            {{ __('Feedbacks') }}
                        </x-responsive-nav-link>
                    </div>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-400 dark:border-gray-600">
                    <div class="px-4">
                        @auth
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        @else
                            <div class="font-medium text-base text-gray-200">Guest</div>
                        @endauth
                    </div>

                    <div class="mt-3 space-y-1">
                        @auth
                            <x-responsive-nav-link class="text-white/100" :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link class="text-white/100" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        @else
                            <x-responsive-nav-link class="text-white/100" :href="route('login')">
                                {{ __('Login') }}
                            </x-responsive-nav-link>
                        @endauth
                    </div>
                </div>
            </div>

            <script src="{{ asset('js/app.js') }}" defer></script>
        </nav>
        <!-- Page Content -->
        <section
            class="bidang text-white stroke-slate-950 lg:h-screen w-full px-4 py-32 mx-auto bg-blend-color-dodge bg-gray-700/70 dark:bg-gray-900/75 content-center">
            <div class="mx-auto text-center max-w-screen-xl translate-y-10 transition-all duration-700 ease-in-out animate-fade-in"
                data-aos="fade-up">
                <h1 class="bg-clip-text text-3xl font-extrabold sm:text-5xl">
                    Bidang Konsumsi dan

                    <span class="mt-2 pb-2 sm:block "> Penganekaragaman Pangan </span>
                </h1>

                <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed">
                    Selamat Datang di Website Dinas Ketahanan Pangan Kota Makassar Bidang Konsumsi dan Penganekaragaman Pangan
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded border-indigo-500 bg-indigo-600 px-12 py-3 ring-indigo-500 text-sm text-white font-medium hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
                        href="{{ route('login') }}">
                        Get Started
                    </a>

                    <a class="block w-full rounded border-indigo-500 px-12 py-3 text-sm font-medium  ring-indigo-500 hover:bg-indigo-600 focus:outline-none hover:text-white focus:ring sm:w-auto"
                        href="{{ route('about.index') }}">
                        Learn More
                    </a>
                </div>
            </div>
        </section>
    </div>
    <main class="flex-1">
        {{ $slot }}
    </main>
    <!-- SPONSOR -->
    <div class="">
        <div class="py-16 sm:py-20 bg-white dark:bg-gray-900 text-gray-800 dark:text-white" data-aos="fade-right">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div
                    class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="{{ asset('ASSETS/logolongwis.png') }}" alt="Transistor" width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="{{ asset('ASSETS/LogoBulogpng.png') }}" alt="Reform" width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="{{ asset('ASSETS/BPOM.png') }}" alt="Tuple" width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full objxect-contain sm:col-start-2 lg:col-span-1"
                        src="{{ asset('ASSETS/Badan Pangan Nasional.png') }}" alt="SavvyCal" width="158"
                        height="48">
                    <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                        src="{{ asset('ASSETS/DISDAG.png') }}" alt="Statamic" width="158" height="48">
                </div>
            </div>
        </div>
        <footer class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white pb-4" data-aos="fade-up">
            <div class="mx-auto max-w-screen-xl px-4 pb-8 pt-16 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-md">
                    <strong
                        class="block text-center text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl dark:text-gray-400 py-4 mb-2">
                        Want us to email you with the latest news?
                    </strong>

                    <form class="mt-6">
                        <div class="relative max-w-lg">
                            <label class="sr-only" for="email"> Email </label>

                            <input
                                class="w-full rounded-full border-gray-200 bg-gray-100 text-gray-800 p-4 pe-32 text-sm font-medium"
                                id="email" type="email" placeholder="john@doe.com" />

                            <button
                                class="absolute end-1 top-1/2 -translate-y-1/2 rounded-full bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-blue-700">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-32">
                    <div class="mx-auto max-w-sm lg:max-w-none">
                        <p class="mt-4 text-center lg:text-left lg:text-lg text-gray-800 dark:text-gray-500">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium natus quod eveniet
                            aut perferendis distinctio iusto repudiandae, provident velit earum?
                        </p>

                        <div class="mt-6 flex justify-center gap-4 lg:justify-start">
                            <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                href="{{ Auth::user()->socialMedia->facebook_url ?? 'https://www.facebook.com/profile.php?id=100075803721060&mibextid=LQQJ4d' }}"
                                target="_blank" rel="noreferrer">
                                <span class="sr-only"> Facebook </span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                href="{{ Auth::user()->socialMedia->instagram_url ?? 'https://www.instagram.com/dinasketahananpangan_makassar' }}"
                                target="_blank" rel="noreferrer">
                                <span class="sr-only"> Instagram </span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                href="{{ Auth::user()->socialMedia->twitter_url ?? 'https://x.com/dkp_makassar' }}"
                                target="_blank" rel="noreferrer">
                                <span class="sr-only"> Twitter </span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>

                            <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75" href="#"
                                target="_blank" rel="noreferrer">
                                <span class="sr-only"> GitHub </span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75" href="#"
                                target="_blank" rel="noreferrer">
                                <span class="sr-only"> Dribbble </span>

                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-1 gap-8 lg:gap-2 text-center lg:grid-cols-3 lg:text-left text-gray-800 dark:text-gray-500 justify-items-center">
                        <div>
                            <strong class="font-medium text-gray-800 dark:text-white "> Services </strong>

                            <ul class="mt-6 space-y-1">
                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="#"> Marketing
                                    </a>
                                </li>

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="#">
                                        Graphic Design
                                    </a>
                                </li>

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="#">
                                        App Development
                                    </a>
                                </li>

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="#">
                                        Web Development
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <strong class="font-medium text-gray-800 dark:text-white"> About </strong>

                            <ul class="mt-6 space-y-1">

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="{{ route('about.index') }}"> Careers
                                    </a>
                                </li>

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="{{ route('about.index') }}"> History
                                    </a>
                                </li>

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="{{ route('about.index') }}"> Our Team
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <strong class="font-medium text-gray-800 dark:text-white"> Support </strong>

                            <ul class="mt-6 space-y-1">
                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="{{ route('contact.index') }}"> FAQs </a>
                                </li>

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="{{ route('contact.index') }}"> Contact
                                    </a>
                                </li>

                                <li>
                                    <a class="transition hover:text-indigo-800/100 dark:hover:text-gray-100/75"
                                        href="{{ route('contact.index') }}"> Live Chat
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div
            class="border-t border-gray-200 dark:border-gray-600 py-4 bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
            <p class="text-center text-xs/relaxed">
                © Dinas Ketahanan Pangan 2024. All rights reserved.

                <br />

                Created with
                <a href="#"
                    class="underline transition hover:text-indigo-800/100 dark:hover:text-gray-100/75">Laravel</a>
            </p>
        </div>
    </div>
    {{-- ANIMASI MUNCUL --}}
    <script>
        AOS.init({
            duration: 700, // Durasi animasi (dalam ms)
            easing: 'ease-in-out', // Efek animasi
            once: true // Animasi hanya berjalan sekali
        });
    </script>
</body>

</html>
