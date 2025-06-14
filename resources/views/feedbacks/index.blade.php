@extends('layouts.main2')

@section('content')
    <div class="p-6 bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white min-h-screen">
        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-10">
            Kritik & Saran
        </h2>

        @if (session('success'))
            <div
                class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-md mb-6 max-w-xl mx-auto text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Kritik dan Saran -->
        <form action="{{ route('contact.store') }}" method="POST"
            class="max-w-xl mx-auto p-6 rounded-xl shadow-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 transition">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold mb-1">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 transition"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 transition"
                    required>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-sm font-semibold mb-1">Pesan</label>
                <textarea id="message" name="message" rows="4" placeholder="Masukkan Kritik dan Saran Anda"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 transition"
                    required></textarea>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md transition">
                Kirim
            </button>
        </form>

        <!-- Tombol Toggle -->
        <div class="text-center mt-10">
            <button id="toggle1"
                class="px-4 py-2 text-white bg-gray-700 hover:bg-gray-800 rounded-md focus:outline-none transition inline-flex items-center gap-2">
                Tampilkan Feedback
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        <!-- Feedback List -->
        <div id="dropdown"
            class="hidden max-w-3xl mx-auto mt-8 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-md transition">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6">Daftar Feedback</h2>

                @forelse ($feedbacks as $feedback)
                    <div
                        class="mb-4 p-4 bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg hover:shadow-lg transition">
                        <div class="flex justify-between items-center mb-1">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $feedback->name }}</h3>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $feedback->email }}</span>
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">{{ $feedback->message }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-600 dark:text-gray-400">Belum ada kritik dan saran.</p>
                @endforelse

                <div class="mt-6">
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        const toggleButton = document.getElementById('toggle1');
        const dropdownMenu = document.getElementById('dropdown');

        toggleButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Tambahan: jika ada ?page di URL, buka dropdown otomatis
        if (window.location.search.includes('page=')) {
            dropdownMenu.classList.remove('hidden');
        }
    </script>
@endsection
