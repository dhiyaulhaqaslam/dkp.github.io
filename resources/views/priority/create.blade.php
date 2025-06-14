<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Program Prioritas') }}
        </h2>
    </x-slot>

    <div class="w-full max-w-7xl mx-auto flex flex-col justify-center items-center px-4">
        <div class="rounded-lg w-full overflow-x-auto bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white p-6">
            <form action="{{ route('priority.store') }}" method="POST" class="shadow-md rounded-lg p-6 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium">Judul</label>
                    <input type="text" name="judul" id="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100" required>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-gray-100 text-gray-800 dark:bg-gray-800  dark:text-gray-100" required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-light rounded-md hover:bg-indigo-600 transition duration-300">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
