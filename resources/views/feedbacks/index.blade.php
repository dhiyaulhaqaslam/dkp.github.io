@extends('layouts.main2')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-white py-12">

        {{-- Hero Section --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-blue-600 mb-3">Kritik & Saran</h1>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Suara Anda sangat berarti bagi kami. Silakan berikan saran atau kritik untuk membantu kami menjadi lebih
                baik.
            </p>
        </div>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div
                class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-md mb-6 max-w-xl mx-auto text-center shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulir Feedback --}}
        <div
            class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 transition transform hover:scale-[1.01]">
            <h2 class="text-2xl font-bold text-center mb-6 text-blue-600">Kirim Masukan Anda</h2>

            <form action="{{ route('contact.store') }}" method="POST">
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

                <div class="mb-6">
                    <label for="message" class="block text-sm font-semibold mb-1">Pesan</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tulis kritik atau saran Anda..."
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 transition"
                        required></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md shadow transition-all duration-300">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim
                </button>
            </form>
        </div>

        {{-- Tombol Tampilkan Feedback --}}
        <div class="text-center mt-12">
            <button id="toggle1"
                class="px-6 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-md shadow inline-flex items-center gap-2 transition">
                <span>Lihat Semua Feedback</span>
                <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        {{-- Daftar Feedback --}}
        <div id="dropdown"
            class="hidden opacity-0 translate-y-6 max-w-5xl mx-auto mt-10 grid md:grid-cols-2 gap-6 transition-all duration-500 ease-in-out">
            @forelse ($feedbacks as $feedback)
                <div
                    class="p-5 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-lg transition relative overflow-hidden">
                    <div class="flex items-center mb-3">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 font-bold">
                            {{ strtoupper(substr($feedback->name, 0, 1)) }}
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $feedback->name }}</h3>
                            @auth
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $feedback->email }}</p>
                            @endauth
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 mb-3 italic">“{{ $feedback->message }}”</p>
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        <i class="far fa-clock mr-1"></i>{{ $feedback->created_at->diffForHumans() }}
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600 dark:text-gray-400 col-span-full">Belum ada kritik dan saran.</p>
            @endforelse

            <div class="col-span-full mt-6">
                {{ $feedbacks->links() }}
            </div>
        </div>

    </div>

    <script>
        const toggleButton = document.getElementById('toggle1');
        const dropdownMenu = document.getElementById('dropdown');
        const arrowIcon = toggleButton.querySelector('svg');

        toggleButton.addEventListener('click', () => {
            const isHidden = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden');
            setTimeout(() => {
                dropdownMenu.classList.toggle('opacity-0');
                dropdownMenu.classList.toggle('translate-y-6');
            }, 10);
            arrowIcon.classList.toggle('rotate-180');
        });

        if (window.location.search.includes('page=')) {
            dropdownMenu.classList.remove('hidden', 'opacity-0', 'translate-y-6');
            arrowIcon.classList.add('rotate-180');
        }
    </script>
@endsection
