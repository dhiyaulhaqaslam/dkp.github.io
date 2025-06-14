<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <div class="mx-auto p-6 shadow-md rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Edit -->
        <form action="{{ route('informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-medium">Judul</label>
                <input type="text" name="judul" id="judul" class="mt-1 block w-full p-2 border rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white"
                    value="{{ old('judul', $informasi->judul) }}" required>
                @error('judul')
                    <p class="text-red-500 text-sm ">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="mt-1 block w-full p-2 border rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white">{{ old('deskripsi', $informasi->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Video Link -->
            <div>
                <label for="video_link" class="block text-sm font-medium">Link Video YouTube</label>
                <input type="url" name="video_link" id="video_link" class="mt-1 block w-full p-2 border rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white"
                    value="{{ old('video_link', $informasi->video_link) }}">
                @error('video_link')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div>
                <label for="gambar" class="block text-sm font-medium">Gambar</label>
                @if ($informasi->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $informasi->gambar) }}" alt="Gambar" class="h-20 w-20 mb-2">
                        <p class="text-sm">Gambar saat ini.</p>
                    </div>
                @endif
                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full p-2 border rounded-md">
                <p class="text-sm">Kosongkan jika tidak ingin mengganti gambar.</p>
                @error('gambar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Save
                    Perubahan</button>
                <a href="{{ route('informasi.index') }}"
                    class="py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
