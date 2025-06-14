<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('program.create') }}" class="bg-blue-500 text-white p-2 rounded mb-4 inline-block">Tambah Program</a>

        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Nama</th>
                    <th class="border border-gray-300 p-2">Umur</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $program->nama }}</td>
                        <td class="border border-gray-300 p-2">{{ $program->umur }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="{{ route('program.show', $program) }}" class="text-blue-500">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $programs->links() }} <!-- Pagination -->
    </div>
</body>
</html>
