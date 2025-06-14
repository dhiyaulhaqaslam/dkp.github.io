@extends('layouts.main2')

@section('content')
    <div class="container w-full md:w-1/2 mx-auto py-4">
        <h1 class="mb-4 py-4 text-4xl text-center font-semibold">{{ $title }}</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="bg-gray-100 dark:bg-gray-800 p-6 mb-6 rounded-md" action="{{ route('longwis.store') }}" method="POST" class="">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block font-bold mb-2">Nama:</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block font-bold mb-2">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block font-bold mb-2">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="4"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">{{ old('alamat') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="penduduk" class="block font-bold mb-2">Penduduk:</label>
                <input type="number" name="penduduk" id="penduduk" value="{{ old('penduduk') }}"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="rumah" class="block font-bold mb-2">Rumah:</label>
                <input type="number" name="rumah" id="rumah" value="{{ old('rumah') }}"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <!-- Kolom baru -->
            <div class="mb-4">
                <label for="panjang_lorong" class="block font-bold mb-2">Panjang Lorong (m):</label>
                <input type="number" step="0.01" name="panjang_lorong" id="panjang_lorong"
                    value="{{ old('panjang_lorong') }}" class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="lebar_depan" class="block font-bold mb-2">Lebar Depan (m):</label>
                <input type="number" step="0.01" name="lebar_depan" id="lebar_depan" value="{{ old('lebar_depan') }}"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="lebar_tengah" class="block font-bold mb-2">Lebar Tengah (m):</label>
                <input type="number" step="0.01" name="lebar_tengah" id="lebar_tengah"
                    value="{{ old('lebar_tengah') }}" class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="lebar_belakang" class="block font-bold mb-2">Lebar Belakang (m):</label>
                <input type="number" step="0.01" name="lebar_belakang" id="lebar_belakang"
                    value="{{ old('lebar_belakang') }}"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="koordinat_lorong" class="block font-bold mb-2">Koordinat Lorong:</label>
                <input type="text" name="koordinat_lorong" id="koordinat_lorong" value="{{ old('koordinat_lorong') }}"
                    class="border rounded w-full py-2 px-3 leading-tight bg-transparent text-gray-800 dark:border-gray-600 dark:text-white">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save
                </button>
                <a href="{{ route('longwis.index') }}" class="text-gray-500 hover:underline">Batal</a>
            </div>
        </form>
    </div>
@endsection
