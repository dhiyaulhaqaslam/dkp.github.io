@extends('layouts.main2')

@section('content')
    <!-- MAIN -->
    <div class="py-4 bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
        <h1 class="text-4xl font-bold text-center my-12">{{ $title }}</h1>
        @auth
            <div class="text-center my-5">
                <a href="{{ route('article.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Create Proyek
                </a>
            </div>
        @endauth

        <div class="container mx-auto px-4">
            @if (session()->has('success'))
                <div id="alert-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const alertMessage = document.getElementById('alert-message');
                        if (alertMessage) {
                            setTimeout(() => {
                                alertMessage.style.transition = "opacity 0.5s ease"; // Animasi transisi
                                alertMessage.style.opacity = 0; // Mengurangi opacity hingga 0
                                setTimeout(() => alertMessage.remove(),
                                    500); // Menghapus elemen setelah animasi selesai
                            }, 3000); // Durasi tampilan sebelum mulai menghilang (3 detik)
                        }
                    });
                </script>
            @endif
            {{-- SEARCHBAR --}}
            <form action="{{ route('article.index') }}" method="GET" class="mt-12 flex justify-center w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..."
                    class="p-2 w-1/2 border rounded-lg text-gray-900 dark:text-white dark:bg-gray-800 dark:border-gray-600">
                <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Cari
                </button>
            </form>
            <!-- Grid Container -->
            <div class="grid grid-cols-1 2xl:grid-cols-2 gap-6 my-6 max-w-xl 2xl:max-w-3xl mx-auto">
                @foreach ($articles as $article)
                    <article
                        class="flex flex-col h-full overflow-hidden rounded-lg border border-gray-100 dark:border-gray-600 shadow-md hover:shadow-lg transition duration-300 dark:bg-gray-800">
                        <!-- Bagian Gambar -->
                        <div class="relative">
                            <a href="{{ route('article.show', $article->slug) }}">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel"
                                    class="w-full h-48 object-cover">
                            </a>
                            <!-- Bagian Edit/Delete Dropdown -->
                            @auth
                                <div class="absolute top-2 right-2">
                                    <div class="relative dropdown-container">
                                        <a href="#"
                                            class="dropdown-button text-md transition hover:scale-110 border border-gray-300 dark:border-gray-600 rounded-md bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100 py-1">
                                            <i class="fa-solid fa-file-pen p-2"></i>
                                        </a>
                                        <div id="dropdown-menu"
                                            class="absolute hidden top-8 right-1 z-10 w-auto rounded-md bg-gray-800/100 shadow-lg"
                                            role="menu">
                                            <div class="flex flex-col">
                                                <!-- Edit Link -->
                                                <a href="{{ route('article.edit', $article) }}"
                                                    class="flex items-center justify-between text-xs text-white hover:bg-gray-700 rounded-md p-2">
                                                    <i class="fas fa-edit max-w-2"></i>
                                                    <div class="w-10">
                                                        <span class="ps-3">Edit</span>
                                                    </div>
                                                </a>

                                                <!-- Delete Form -->
                                                <form action="{{ route('article.destroy', $article) }}" method="POST"
                                                    class="flex items-center justify-between text-xs text-white hover:bg-gray-700 rounded-md p-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                                        class="flex items-center justify-between w-full">
                                                        <i class="fas fa-trash max-w-2"></i>
                                                        <div class="w-10">
                                                            <span class="ps-3">Delete</span>
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endauth
                        </div>

                        <!-- Bagian Konten -->
                        <div class="flex flex-col flex-grow p-4 sm:p-6">
                            <h3 class="text-lg font-medium">
                                {{ $article->title }}
                            </h3>
                            <p class="mt-2 line-clamp-3 text-sm text-gray-600 dark:text-gray-400">
                                {{ $article->excerpt }}
                            </p>

                            <!-- Spacer untuk mendorong konten ke bawah -->
                            <div class="flex-grow"></div>

                            <!-- Bagian Tanggal dan Find Out More -->
                            <div class="flex justify-between items-center mt-4">
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $article->tanggal }}
                                </p>
                                <a href="{{ route('article.show', $article->slug) }}"
                                    class="inline-flex items-center gap-1 text-xs font-medium text-blue-600 hover:underline">
                                    Find out more
                                    <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                                        &rarr;
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
    {{-- DROPDOWN EDIT ARTICLE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButtons = document.querySelectorAll('.dropdown-button'); // Pilih semua tombol dropdown

            dropdownButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Cegah navigasi default

                    const dropdownMenu = this.nextElementSibling; // Ambil menu dropdown terkait
                    if (!dropdownMenu) return;

                    const isVisible = dropdownMenu.style.display === 'block';

                    // Tutup semua dropdown lain
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });

                    // Tampilkan atau sembunyikan menu dropdown yang dipilih
                    dropdownMenu.style.display = isVisible ? 'none' : 'block';
                });
            });

            // Tutup dropdown jika klik di luar
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.dropdown-container')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });
                }
            });
        });
    </script>
@endsection
