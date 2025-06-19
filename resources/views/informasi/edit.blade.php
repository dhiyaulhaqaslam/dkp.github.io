<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold mb-6">{{ $title }}</h1>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mb-4 p-4 rounded-md bg-green-100 text-green-700 text-sm border border-green-300">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Edit --}}
            <form action="{{ route('informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div>
                    <label for="judul" class="block text-sm font-medium mb-1">Judul</label>
                    <input type="text" name="judul" id="judul"
                        class="w-full p-3 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('judul', $informasi->judul) }}" required>
                    @error('judul')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5"
                        class="w-full p-3 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('deskripsi', $informasi->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Video Link --}}
                <div>
                    <label for="video_link" class="block text-sm font-medium mb-1">Link Video YouTube</label>
                    <input type="url" name="video_link" id="video_link"
                        class="w-full p-3 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('video_link', $informasi->video_link) }}">
                    @error('video_link')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gambar --}}
                <div>
                    <label for="gambar" class="block text-sm font-medium mb-1">Gambar</label>
                    @if ($informasi->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $informasi->gambar) }}" alt="Gambar"
                                class="h-20 w-20 mb-2 rounded border">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="gambar" id="gambar"
                        class="w-full p-3 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:outline-none">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti
                        gambar.</p>
                    @error('gambar')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="pt-4 flex justify-end space-x-2">
                    <a href="{{ route('informasi.index') }}"
                        class="px-4 py-2 rounded-md text-sm bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 rounded-md text-sm bg-indigo-600 text-white hover:bg-indigo-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
