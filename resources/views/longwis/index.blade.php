@extends('layouts.main2')

@section('content')
    <div class="container mx-auto py-4 bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
        <h1 class="text-4xl font-bold text-center my-12">{{ $title }}</h1>
        <div class="flex justify-between items-center gap-2 mb-2">
            @auth
                <div class="text-center my-5">  
                    <a href="{{ route('longwis.create') }}"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Create
                    </a>
                </div>
            @endauth
            {{-- FITUR SEARCH --}}
            <form method="GET" action="{{ route('longwis.index') }}" class="flex justify-end">
                <div class="flex items-center gap-3 shadow-md p-3 rounded-lg w-full max-w-md">
                    <!-- Input Field -->
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400"
                        placeholder="Cari Data Longwis" />
                    <!-- Submit Button -->
                    <button type="submit"
                        class="flex-shrink-0 px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition-all duration-150">
                        Cari
                    </button>
                </div>
            </form>

        </div>
        {{-- OVERFLOW (SCROLL BAR) --}}
        <style>
            /* Kustomisasi Scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
                /* Lebar scrollbar vertikal */
                height: 10px;
                /* Tinggi scrollbar horizontal */
            }

            ::-webkit-scrollbar-thumb {
                background-color: #a0aec0;
                /* Warna scrollbar */
                border-radius: 6px;
                /* Membuat sudut bulat */
            }

            ::-webkit-scrollbar-track {
                background-color: #f7fafc;
                /* Warna latar belakang track */
            }
        </style>
        {{-- UTAMA --}}
        {{-- Data Table --}}
        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 dark:bg-gray-700 sticky top-0 z-10">
                    <tr>
                        @php $arrows = ['asc' => '↑', 'desc' => '↓']; @endphp
                        @foreach (['nama', 'tanggal', 'alamat', 'penduduk', 'rumah'] as $field)
                            <th class="px-4 py-3 font-semibold text-gray-600 dark:text-gray-300">
                                <a
                                    href="{{ route('longwis.index', ['sort_by' => $field, 'sort_order' => $sortBy === $field && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                    {{ ucfirst($field) }}
                                    @if ($sortBy === $field)
                                        {{ $arrows[$sortOrder] }}
                                    @endif
                                </a>
                            </th>
                        @endforeach
                        <th class="px-4 py-3"></th>
                        @auth
                            <th class="px-4 py-3"></th>
                        @endauth
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($longwis as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item->nama }}</td>
                            <td class="px-4 py-2">{{ $item->tanggal }}</td>
                            <td class="px-4 py-2">{{ $item->alamat }}</td>
                            <td class="px-4 py-2">{{ $item->penduduk }}</td>
                            <td class="px-4 py-2">{{ $item->rumah }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('longwis.show', $item->id) }}"
                                    class="text-blue-600 hover:underline">Detail</a>
                            </td>
                            @auth
                                <td class="px-4 py-2">
                                    <form action="{{ route('longwis.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $longwis->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
