@extends('layouts.main2')

@section('content')
    <div class="container w-full sm:w-1/2 mx-auto py-6 bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
        <h1 class="mb-6 text-4xl font-bold text-center">{{ $title }}</h1>

        <form action="{{ route('projects.update', $project) }}" method="POST"
            class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 mb-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium">Nama Proyek</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $project->nama) }}" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-transparent @error('nama') @enderror">
                @error('nama')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $project->tanggal) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-transparent @error('tanggal') @enderror">
                @error('tanggal')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-transparent @error('description') @enderror">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select id="status" name="status" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-transparent @error('status') @enderror">
                    <option value="rencana" {{ old('status', $project->status) === 'rencana' ? 'selected' : '' }}>Rencana
                    </option>
                    <option value="progres" {{ old('status', $project->status) === 'progres' ? 'selected' : '' }}>Progres
                    </option>
                    <option value="arsip" {{ old('status', $project->status) === 'arsip' ? 'selected' : '' }}>Arsip
                    </option>
                </select>
                @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Update
            </button>
        </form>
    </div>
@endsection
