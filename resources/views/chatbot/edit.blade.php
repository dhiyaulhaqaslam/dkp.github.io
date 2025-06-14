@extends('layouts.main2')

@section('content')
    <div class="container mx-auto bg-gray-200/35 dark:bg-gray-800 text-black dark:text-gray-200 my-6 p-6 rounded-md">
        <h1 class="text-2xl font-bold mb-4">Edit Data Chatbot</h1>
        <form action="{{ route('chatbot.update', $chatbot->id) }}" method="POST" class="space-y-4 dark:bg-gray-800 text-black dark:text-gray-200">
            @csrf
            @method('PUT')
            <div>
                <label for="pertanyaan" class="block text-sm font-medium">Pertanyaan</label>
                <input type="text" name="pertanyaan" id="pertanyaan" value="{{ $chatbot->pertanyaan }}"
                    class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-white dark:bg-gray-800 text-black dark:text-gray-200"
                    required>
            </div>
            <div>
                <label for="jawaban" class="block text-sm font-medium">Jawaban</label>
                <textarea name="jawaban" id="jawaban" rows="4"
                    class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-white dark:bg-gray-800 text-black dark:text-gray-200"
                    required>{{ $chatbot->jawaban }}</textarea>
            </div>
            <div>
                <button type="submit"
                    class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Save</button>
                <a href="{{ route('chatbot.index') }}"
                    class="px-4 py-2 ml-2 bg-red-500 rounded-md hover:bg-red-600 text-white">Batal</a>
            </div>
        </form>
    </div>
@endsection
