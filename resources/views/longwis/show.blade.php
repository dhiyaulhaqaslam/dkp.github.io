@extends('layouts.main2')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Detail Longwis</h1>
                <p class="text-lg text-indigo-600 dark:text-indigo-400 mt-1">~ {{ $longwis->nama }} ~</p>
                <a href="#"
                    class="inline-block mt-4 px-4 py-1 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold text-sm rounded-full shadow">
                    Rencana
                </a>
            </div>

            <!-- Informasi -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-gray-700 dark:text-gray-200 text-sm">
                <div><span class="font-semibold">Nama:</span> {{ $longwis->nama }}</div>
                <div><span class="font-semibold">Panjang Lorong:</span> {{ $longwis->panjang_lorong }} m</div>

                <div><span class="font-semibold">Tanggal:</span> {{ $longwis->tanggal }}</div>
                <div><span class="font-semibold">Lebar Depan:</span> {{ $longwis->lebar_depan }} m</div>

                <div><span class="font-semibold">Alamat:</span> {{ $longwis->alamat }}</div>
                <div><span class="font-semibold">Lebar Tengah:</span> {{ $longwis->lebar_tengah }} m</div>

                <div><span class="font-semibold">Penduduk:</span> {{ $longwis->penduduk }} Warga</div>
                <div><span class="font-semibold">Lebar Belakang:</span> {{ $longwis->lebar_belakang }} m</div>

                <div><span class="font-semibold">Rumah:</span> {{ $longwis->rumah }} unit</div>
                <div><span class="font-semibold">Koordinat Lorong:</span> {{ $longwis->koordinat_lorong }}</div>
            </div>

            <!-- Aksi -->
            <div class="mt-10 flex justify-end space-x-3">
                @auth
                    <a href="{{ route('longwis.edit', $longwis->id) }}"
                        class="px-5 py-2 bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-semibold rounded-lg shadow">
                        Edit
                    </a>
                @endauth
                <a href="{{ route('longwis.index') }}"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-md shadow hover:bg-indigo-700 transition duration-200">
                    Kembali
                </a>
                <a href="{{ route('longwis.download.pdf', $longwis->id) }}"
                    class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow">
                    Unduh PDF
                </a>
            </div>
        </div>
    </div>
@endsection
