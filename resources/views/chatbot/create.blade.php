@extends('layouts.main2')

@section('content')
    <div class="container mx-auto p-4 my-6 bg-white dark:bg-gray-800 text-black dark:text-gray-100">
        <h1 class="text-2xl font-bold mb-4">Buat Chatbot Baru</h1>

        <form action="{{ route('chatbot.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="pertanyaan" class="block text-sm font-medium mb-2">Pertanyaan</label>
                <input type="text" name="pertanyaan" id="pertanyaan" value="{{ old('pertanyaan') }}"
                    class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring focus:ring-blue-500 dark:text-gray-300 dark:bg-gray-800"
                    required>
                @error('pertanyaan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="jawaban" class="block text-sm font-medium mb-2">Jawaban</label>
                <textarea name="jawaban" id="jawaban" rows="4"
                    class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring focus:ring-blue-500 dark:text-gray-300 dark:bg-gray-800"
                    required>{{ old('jawaban') }}</textarea>
                @error('jawaban')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('chatbot.index') }}"
                    class="px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700">Kembali</a>
                <button type="submit"
                    class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">Save</button>
            </div>
        </form>
    </div>
@endsection
