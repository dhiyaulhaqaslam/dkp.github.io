<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-6 shadow-md rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        @if ($user)
            <div class="mb-4">Welcome, <span class="font-semibold">{{ $user->name }}</span></div>
        @else
            <div class="mb-4">Welcome, Guest</div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('attendance.store') }}" method="POST" class="mb-6"
            onsubmit="return confirm('Apakah Anda yakin ingin melakukan absensi?')">
            @csrf
            <div class="mb-4">
                <label for="type" class="block font-medium text-gray-800 dark:text-white">Jenis Absensi</label>
                <select id="type" name="type" required
                    class="mt-1 block w-full rounded-md border-gray-800 dark:border-gray-700 p-2 shadow-sm focus:border-indigo-600 focus:ring-indigo-500  bg-white dark:bg-gray-800">
                    <option value="" disabled selected>Pilih Jenis Absensi</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white font-light rounded-md hover:bg-indigo-600 transition duration-300">
                Absen
            </button>
        </form>

        <h2 class="text-xl font-semibold mb-3">Riwayat Absensi</h2>
        <ul class="list-disc pl-5">
            @foreach ($attendances as $attendance)
                <li class="flex items-center justify-between mb-1">
                    <div>
                        <strong>{{ $attendance->date }}</strong> - {{ $attendance->type }}
                        <span class="text-sm text-gray-500">({{ $attendance->time->format('H:i:s') }})</span>
                    </div>
                    <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus absensi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="ml-4 px-3 py-1 bg-red-500 text-white font-light rounded-md hover:bg-red-600 transition duration-300">
                            Delete
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="max-w-7xl mx-auto mt-4 p-6 shadow-md rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <h2 class="text-xl font-semibold mb-4">Rekap Absensi Seluruh Pengguna</h2>

        <table class="min-w-full table-auto border border-gray-300 dark:border-gray-600 text-sm">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Waktu</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendances as $attendance)
                    <tr>
                        <td class="border px-4 py-2">{{ $attendance->date }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($attendance->time)->format('H:i:s') }}
                        </td>
                        <td class="border px-4 py-2">{{ $attendance->user->name ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $attendance->user->email ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $attendance->type }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center">Tidak ada data absensi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
