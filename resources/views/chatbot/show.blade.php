@extends('layouts.main2')

@section('content')
    <div class="container mx-auto py-4">
        <h1 class="text-2xl font-bold text-center mb-4">Chatbot</h1>
        <form action="{{ route('chatbot.ask') }}" method="GET">
            <div class="mb-4">
                <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Masukkan Pertanyaan:</label>
                <input type="text" name="pertanyaan" id="pertanyaan"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    placeholder="Tanyakan sesuatu...">
            </div>
            <button type="submit" class="btn btn-primary">Tanyakan</button>
        </form>
    </div>
@endsection
