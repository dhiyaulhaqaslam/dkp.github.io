@extends('layouts.main2')

@section('content')
    <div class="container mx-auto p-6 my-6 bg-white dark:bg-gray-800 text-black dark:text-gray-100 rounded-md">
        <h1 class="text-2xl font-bold mb-4">Daftar Chatbot</h1>

        <div class="flex justify-between mb-4">
            <a href="{{ route('chatbot.create') }}"
                class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">Create Data</a>
            <a href="{{ route('chatbot.ask') }}" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Chat
                with Chatbot</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-800 border border-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form id="bulkDeleteForm" action="{{ route('chatbot.bulk-delete') }}" method="POST">
            @csrf

            <div class="flex space-x-2 mb-2">
                <button type="button" id="selectAllBtn" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Pilih Semua
                </button>
                <button type="button" id="bulkDeleteBtn" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Hapus yang Dipilih
                </button>
            </div>

            <table
                class="table-auto w-full border-collapse border border-gray-800 dark:border-gray-600 my-6 bg-white dark:bg-gray-800 text-black dark:text-gray-100">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-800 dark:border-gray-600 px-4 py-2">Pilih</th>
                        <th class="border border-gray-800 dark:border-gray-600 px-4 py-2">Pertanyaan</th>
                        <th class="border border-gray-800 dark:border-gray-600 px-4 py-2">Jawaban</th>
                        <th class="border border-gray-800 dark:border-gray-600 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chatbot as $item)
                        <tr>
                            <td class="border border-gray-800 dark:border-gray-600 px-4 py-2 text-center">
                                <input type="checkbox" name="ids[]" value="{{ $item->id }}" class="rowCheckbox">
                            </td>
                            <td class="border border-gray-800 dark:border-gray-600 px-4 py-2">{{ $item->pertanyaan }}</td>
                            <td class="border border-gray-800 dark:border-gray-600 px-4 py-2">{{ $item->jawaban }}</td>
                            <td class="border border-gray-800 dark:border-gray-600 px-4 py-2">
                                <a href="{{ route('chatbot.edit', $item->id) }}"
                                    class="text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $chatbot->links() }}
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectAllBtn = document.getElementById('selectAllBtn');
                const deleteBtn = document.getElementById('bulkDeleteBtn');
                const checkboxes = document.querySelectorAll('.rowCheckbox');
                const form = document.getElementById('bulkDeleteForm');
                let semuaDipilih = false;

                // Toggle semua checkbox & teks tombol
                selectAllBtn.addEventListener('click', function() {
                    semuaDipilih = !semuaDipilih;
                    checkboxes.forEach(cb => cb.checked = semuaDipilih);
                    selectAllBtn.textContent = semuaDipilih ? 'Batal Pilih Semua' : 'Pilih Semua';
                });

                // Aksi hapus
                deleteBtn.addEventListener('click', function() {
                    const selectedIds = Array.from(checkboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);

                    if (selectedIds.length === 0) {
                        alert('Tidak ada data yang dipilih.');
                        return;
                    }

                    if (!confirm('Hapus semua yang dipilih?')) return;

                    const formData = new FormData();
                    selectedIds.forEach(id => formData.append('ids[]', id));
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('_method', 'POST');

                    fetch(form.action, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Gagal menghapus data');
                            return response.json();
                        })
                        .then(data => {
                            alert(data.message || 'Berhasil dihapus');
                            window.location.reload();
                        })
                        .catch(error => {
                            alert('Terjadi kesalahan: ' + error.message);
                        });
                });
            });
        </script>
    @endpush
@endsection
