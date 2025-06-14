@extends('layouts.main2')

@section('content')
    <div class="py-8 mx-auto ">
        <div
            class="max-w-3xl xl:max-w-4xl mx-auto bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-white p-10 rounded-md">
            <!-- Judul Artikel -->
            <p class="text-sm mb-4">Diterbitkan pada: {{ $article->tanggal }}</p>
            <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-4">
                <span
                    class="px-2 py-1 rounded-md
                    @if ($article->status === 'rencana') bg-yellow-200 text-yellow-800
                    @elseif($article->status === 'progres') bg-blue-200 text-blue-800
                    @elseif($article->status === 'arsip') bg-gray-300 text-gray-700 @endif">
                    {{ ucfirst($article->status) }}
                </span>
            </p>
            <h1 class="text-3xl sm:text-4xl font-bold  mb-6">{{ $article->title }}</h1>


            <!-- Gambar Artikel -->
            @if ($article->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="Image"
                        class="rounded-lg w-full h-auto shadow-md">
                </div>
            @endif

            <!-- Konten Artikel -->
            <div class="text-lg leading-relaxed text-justify space-y-6">
                @php
                    $sentences = preg_split('/(?<=[.?!])\s+/', trim($article->content));
                    $paragraphs = [];
                    $temp = '';

                    foreach ($sentences as $sentence) {
                        $temp .= $sentence . ' ';
                        if (str_word_count($temp) > 30) {
                            $paragraphs[] = trim($temp);
                            $temp = '';
                        }
                    }

                    if (!empty(trim($temp))) {
                        $paragraphs[] = trim($temp);
                    }
                @endphp

                <!-- Render paragraf -->
                @foreach ($paragraphs as $paragraph)
                    <p>{{ trim($paragraph) }}</p>
                @endforeach
            </div>
        </div>

        <!-- Tombol Create Proyek (jika user terautentikasi) -->
        @auth
            <div class="text-center mt-8">
                <a href="{{ route('article.create') }}"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Create
                </a>
            </div>
        @endauth
    </div>
@endsection
