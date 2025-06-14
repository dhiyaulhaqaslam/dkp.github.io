@extends('layouts.main2')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold text-center text-gray-800 dark:text-white mb-10">{{ $title }}</h1>

        <div
            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg shadow px-6 py-8 text-gray-800 dark:text-white">
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-1">Nama Proyek:</h2>
                <p>{{ $project->nama }}</p>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-1">Tanggal:</h2>
                <p>{{ $project->tanggal ? $project->tanggal->format('d M Y') : '-' }}</p>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-1">Deskripsi:</h2>
                <p>{{ $project->description ?: '-' }}</p>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-1">Status:</h2>
                <span
                    class="inline-block px-3 py-1 text-sm font-medium rounded-full
                    @if ($project->status === 'rencana') bg-yellow-200 text-yellow-800
                    @elseif($project->status === 'progres') bg-blue-200 text-blue-800
                    @elseif($project->status === 'arsip') bg-gray-300 text-gray-700 @endif">
                    {{ ucfirst($project->status) }}
                </span>
            </div>

            <div class="flex flex-wrap gap-3 mt-6">
                @auth
                    <a href="{{ route('projects.edit', $project) }}"
                        class="bg-yellow-400 text-white px-5 py-2 rounded-md shadow hover:bg-yellow-500 transition duration-200">
                        Edit
                    </a>
                @endauth
                <a href="{{ route('projects.index') }}"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-md shadow hover:bg-indigo-700 transition duration-200">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
