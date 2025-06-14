@extends('layouts.main2')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold text-center text-gray-800 dark:text-white mb-10">{{ $title }}</h1>

        @auth
            <div class="flex justify-center mb-6">
                <a href="{{ route('projects.create') }}"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition duration-200">
                    Create
                </a>
            </div>
        @endauth

        <div class="flex justify-center mb-8">
            <form action="{{ route('projects.index') }}" method="GET" class="w-full max-w-xl flex">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari proyek..."
                    class="flex-grow p-2 rounded-l-lg border dark:border-gray-600 dark:bg-gray-800 text-gray-800 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-r-lg hover:bg-indigo-700 transition duration-200">
                    Cari
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table
                class="w-full text-sm text-center border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                    <tr>
                        <th class="px-4 py-3 border dark:border-gray-600">#</th>

                        @php
                            $columns = [
                                'nama' => 'Nama',
                                'status' => 'Status',
                                'tanggal' => 'Tanggal',
                            ];
                        @endphp

                        @foreach ($columns as $col => $label)
                            @php
                                $isCurrent = $sortBy === $col;
                                $newOrder = $isCurrent && $sortOrder === 'asc' ? 'desc' : 'asc';
                                $icon = $isCurrent ? ($sortOrder === 'asc' ? '▲' : '▼') : '';
                            @endphp
                            <th class="px-4 py-3 border dark:border-gray-600">
                                <a href="{{ route('projects.index', [
                                    'search' => request('search'),
                                    'sort_by' => $col,
                                    'sort_order' => $newOrder,
                                ]) }}"
                                    class="hover:underline">
                                    {{ $label }} {!! $icon !!}
                                </a>
                            </th>
                        @endforeach
                        <th class="px-4 py-3 border dark:border-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200">
                    @foreach ($projects as $project)
                        <tr>
                            <td class="px-4 py-2 border dark:border-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border dark:border-gray-700">{{ $project->nama }}</td>
                            <td class="px-4 py-2 border dark:border-gray-700">
                                <span
                                    class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                    @if ($project->status === 'rencana') bg-yellow-200 text-yellow-800
                                    @elseif($project->status === 'progres') bg-blue-200 text-blue-800
                                    @elseif($project->status === 'arsip') bg-gray-300 text-gray-700 @endif">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 border dark:border-gray-700">
                                {{ $project->tanggal ? $project->tanggal->format('d M Y') : '-' }}
                            </td>
                            <td class="px-4 py-2 border dark:border-gray-700 space-x-1">
                                <a href="{{ route('projects.show', $project) }}"
                                    class="inline-block bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 shadow transition">
                                    Detail
                                </a>
                                @auth
                                    <a href="{{ route('projects.edit', $project) }}"
                                        class="inline-block bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500 shadow transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 shadow transition">
                                            Delete
                                        </button>
                                    </form>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $projects->appends(['search' => request('search'), 'sort_by' => $sortBy, 'sort_order' => $sortOrder])->links() }}
        </div>
    </div>
@endsection
