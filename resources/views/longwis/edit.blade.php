@extends('layouts.main2')

@section('content')
    <div class="container w-2/3 max-w-3xl mx-auto py-6 rounded-lg shadow-md bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

        <form class="bg-gray-100 dark:bg-gray-800 p-6 mb-6 rounded-md" action="{{ route('longwis.update', $longwis->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block font-semibold">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $longwis->nama) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500  bg-transparent text-gray-800 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block font-semibold">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $longwis->tanggal) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500  bg-transparent text-gray-800 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block font-semibold">Alamat:</label>
                <textarea id="alamat" name="alamat" class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500  bg-transparent text-gray-800 dark:text-white" required>{{ old('alamat', $longwis->alamat) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="penduduk" class="block font-semibold">Penduduk:</label>
                <input type="number" id="penduduk" name="penduduk" value="{{ old('penduduk', $longwis->penduduk) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500 bg-transparent text-gray-800 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label for="rumah" class="block font-semibold">Rumah:</label>
                <input type="number" id="rumah" name="rumah" value="{{ old('rumah', $longwis->rumah) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500 bg-transparent text-gray-800 dark:text-white" required>
            </div>

            <!-- Kolom baru -->
            <div class="mb-4">
                <label for="panjang_lorong" class="block font-semibold">Panjang Lorong (m):</label>
                <input type="number" step="0.01" id="panjang_lorong" name="panjang_lorong"
                    value="{{ old('panjang_lorong', $longwis->panjang_lorong) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500 bg-transparent text-gray-800 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="lebar_depan" class="block font-semibold">Lebar Depan (m):</label>
                <input type="number" step="0.01" id="lebar_depan" name="lebar_depan"
                    value="{{ old('lebar_depan', $longwis->lebar_depan) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500 bg-transparent text-gray-800 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="lebar_tengah" class="block font-semibold">Lebar Tengah (m):</label>
                <input type="number" step="0.01" id="lebar_tengah" name="lebar_tengah"
                    value="{{ old('lebar_tengah', $longwis->lebar_tengah) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500 bg-transparent text-gray-800 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="lebar_belakang" class="block font-semibold">Lebar Belakang (m):</label>
                <input type="number" step="0.01" id="lebar_belakang" name="lebar_belakang"
                    value="{{ old('lebar_belakang', $longwis->lebar_belakang) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500 bg-transparent text-gray-800 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="koordinat_lorong" class="block font-semibold">Koordinat Lorong:</label>
                <input type="text" id="koordinat_lorong" name="koordinat_lorong"
                    value="{{ old('koordinat_lorong', $longwis->koordinat_lorong) }}"
                    class="w-full px-4 py-2 border border-gray-100 dark:border-gray-700 rounded-lg focus:ring-indigo-500 bg-transparent text-gray-800 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select id="status" name="status" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-transparent @error('status') @enderror">
                    <option class="dark:bg-gray-600/100" value="rencana" {{ old('status', $article->status ?? '') === 'rencana' ? 'selected' : '' }}>Rencana</option>
                    <option class="dark:bg-gray-600/100" value="progres" {{ old('status', $article->status ?? '') === 'progres' ? 'selected' : '' }}>Progres</option>
                    <option class="dark:bg-gray-600/100" value="arsip" {{ old('status', $article->status ?? '') === 'arsip' ? 'selected' : '' }}>Arsip</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:ring">Save
                    Perubahan</button>
            </div>
        </form>
    </div>
@endsection
