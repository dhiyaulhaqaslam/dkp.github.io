@extends('layouts.main2')

@section('content')
    <div class="w-full sm:w-1/2 mx-auto py-4 bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
        <h1 class="mb-4 py-4 text-4xl text-center font-semibold">Create Artikel Baru</h1>
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="bg-gray-100 dark:bg-gray-800 p-6 mb-6" action="{{ route('article.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Judul Artikel</label>
                <input type="text"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-transparent text-gray-800 dark:text-white"
                    id="title" name="title" required>
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium">Tanggal</label>
                <input type="date"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-transparent text-gray-800 dark:text-white"
                    id="tanggal" name="tanggal" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium">Unggah Gambar</label>
                <input type="file"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-transparent text-gray-800 dark:text-white"
                    id="image" name="image" accept="image/*">
            </div>

            <div class="mb-4">
                <label for="excerpt" class="block text-sm font-medium">Excerpt</label>
                <input type="text"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-transparent text-gray-800 dark:text-white"
                    id="excerpt" name="excerpt" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium">Konten Artikel</label>
                <textarea
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-transparent text-gray-800 dark:text-white"
                    id="content" name="content" rows="5" required></textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select id="status" name="status"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-transparent text-gray-800 dark:text-white"
                    required>
                    <option value="">-- Pilih Status --</option>
                    <option value="rencana">Rencana</option>
                    <option value="progres">Progres</option>
                    <option value="arsip">Arsip</option>
                </select>
            </div>

            <button type="submit"
                class="py-2 px-4 bg-blue-500 font-semibold rounded-md shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Save
            </button>
        </form>
    </div>
@endsection
