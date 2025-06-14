<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-10">
        <div class="shadow-md rounded-lg p-6 bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
            <h1 class="text-2xl font-bold mb-4">Create Informasi</h1>

            <!-- Flash Message -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <!-- Judul -->
                <div>
                    <label for="judul" class="block text-sm font-medium">Judul</label>
                    <input type="text" name="judul" id="judul" class="mt-1 block w-full p-2 border rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white"
                        value="{{ old('judul') }}" required>
                    @error('judul')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full p-2 border rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar -->
                <div>
                    <label for="gambar" class="block text-sm font-medium">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="mt-1 block w-full p-2 border rounded-md">
                    @error('gambar')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="video_link" class="block text-sm font-medium">Link Video YouTube</label>
                    <input type="url" name="video_link" id="video_link" class="mt-1 block w-full p-2 border rounded-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white"
                        value="{{ old('video_link') }}" placeholder="https://www.youtube.com/watch?v=..." />
                    @error('video_link')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit"
                        class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
