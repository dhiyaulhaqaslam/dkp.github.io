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
    </div>

    <div
        class="max-w-7xl mx-auto mt-4 p-6 shadow-md rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <h2 class="text-xl font-semibold mb-4">Rekap Absensi Seluruh Pengguna</h2>

        <div class="overflow-x-auto">
            <div class="overflow-x-auto rounded-lg border border-gray-600">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border border-gray-600 text-left rounded-tl-lg">Tanggal</th>
                            <th class="px-4 py-2 border border-gray-600 text-left">Waktu</th>
                            <th class="px-4 py-2 border border-gray-600 text-left">Nama</th>
                            <th class="px-4 py-2 border border-gray-600 text-left">Email</th>
                            <th class="px-4 py-2 border border-gray-600 text-left rounded-tr-lg">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $loopIndex => $attendance)
                            <tr>
                                <td class="px-4 py-2 border border-gray-600 rounded-bl-lg">{{ $attendance->date }}</td>
                                <td class="px-4 py-2 border border-gray-600">{{ \Carbon\Carbon::parse($attendance->time)->format('H:i:s') }}
                                </td>
                                <td class="px-4 py-2 border border-gray-600">{{ $attendance->user->name ?? '-' }}</td>
                                <td class="px-4 py-2 border border-gray-600">{{ $attendance->user->email ?? '-' }}</td>
                                <td class="px-4 py-2 border border-gray-600 rounded-br-lg">{{ $attendance->type }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center">Tidak ada data absensi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>
