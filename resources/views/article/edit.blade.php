@extends('layouts.main2')

@section('content')
    <h1 class="mt-12 text-4xl text-center font-semibold text-gray-800 dark:text-white">{{ $title }}</h1>
    <section class="container mx-auto my-10 max-w-3xl flex justify-center bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data"
            class="w-full p-6 rounded-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-bold mb-2">Judul Artikel</label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block font-bold mb-2">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $article->tanggal) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800" required>
                @error('tanggal')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="excerpt" class="block font-bold mb-2">Ringkasan</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800" required>{{ old('excerpt', $article->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block font-bold mb-2">Isi Artikel</label>
                <textarea name="content" id="content" rows="5"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800" required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select id="status" name="status" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-transparent @error('status') @enderror">
                    <option class="dark:bg-gray-600/100" value="rencana" {{ old('status', $article->status ?? '') === 'rencana' ? 'selected' : '' }}>Rencana</option>
                    <option class="dark:bg-gray-600/100" value="progres" {{ old('status', $article->status ?? '') === 'progres' ? 'selected' : '' }}>Progres</option>
                    <option class="dark:bg-gray-600/100" value="arsip" {{ old('status', $article->status ?? '') === 'arsip' ? 'selected' : '' }}>Arsip</option>
                </select>
                @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block font-bold mb-2">Gambar</label>
                <input type="file" name="image" id="image"
                    class="w-full px-4 py-2 border dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="Current Image" class="w-32 mt-2">
                @endif
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Save
                    Perubahan</button>
            </div>
        </form>
    </section>
@endsection
