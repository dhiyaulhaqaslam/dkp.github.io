<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- TES --}}
    <title>{{ 'Web DKP | ' . ($attributes->get('title') ?? 'Default Title') }}</title>
    <link rel="shortcut icon" href="{{ asset('ASSETS/dkp_mks.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js" defer></script>
    @if (app()->environment('production'))
        <link rel="stylesheet" href="{{ asset(path: 'build/assets/app-CZeGmhTr.css') }}">
        <script src="{{ asset('build/assets/app-CUW5_qJq.js') }}" defer></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    {{-- ASING --}}
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 border-r hidden lg:block border-gray-200 dark:border-gray-700">
            <div class="px-4 py-6">
                <div class="flex flex-col items-center justify-center">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Image"
                            class="h-32 w-32 rounded-full border-2 border-gray-300 shadow-md">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image"
                            class="h-32 w-32 rounded-full border-2 border-gray-300 shadow-md">
                    @endif
                </div>
                <div class="justify-items-center pb-1 pt-2 border-b border-gray-300 dark:border-gray-600">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <nav class="mt-6">
                    <ul class="space-y-2">
                        <li>
                            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('General') }}
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('preference.index')" :active="request()->routeIs('preference.index')">
                                {{ __('Preference') }}
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.index')">
                                {{ __('Attendance') }}
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <x-responsive-nav-link :href="route('informasi.index')" :active="request()->routeIs('informasi.*')">
                                {{ __('Information') }}
                            </x-responsive-nav-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- OFFCANVAS SIDEBAR -->
        <div id="sidebar" x-show="sidebarOpen" x-transition
            class="hidden fixed inset-0 bg-black bg-opacity-50 z-[9001]">
            <div
                class="w-64 h-full absolute top-0 left-0 p-4 bg-gray-100 dark:bg-gray-900 text-gray-500 dark:text-gray-400 overflow-y-auto">
                <!-- Close button for sidebar -->
                <button id="closeSidebarBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex flex-col items-center justify-center dark:border-gray-600">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Profile Image"
                            class="h-32 w-32 rounded-full border-2 border-gray-300 shadow-md">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image"
                            class="h-32 w-32 rounded-full border-2 border-gray-300 shadow-md">
                    @endif
                </div>
                <div class="border-b border-gray-300 dark:border-gray-600 justify-items-center pb-1 pt-2">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <!-- Sidebar Navigation Links -->
                <div class="space-y-4 mt-4">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard.*')">
                        {{ __('General') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('preference.index')" :active="request()->routeIs('preference.*')">
                        {{ __('Preference') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('attendance.index')" :active="request()->routeIs('attendance.*')">
                        {{ __('Attendance') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('informasi.index')" :active="request()->routeIs('informasi.*')">
                        {{ __('Informasi') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Navbar -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-100 dark:bg-gray-900 text-gray-500 dark:text-gray-400">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
