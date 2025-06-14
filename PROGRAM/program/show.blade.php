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

        <div class="bg-white border p-4 rounded shadow">
            <p><strong>Nama:</strong> {{ $program->nama }}</p>
            <p><strong>Umur:</strong> {{ $program->umur }}</p>
        </div>

        <a href="{{ route('program.index') }}" class="text-blue-500 hover:underline mt-4">Kembali</a>
    </div>
</body>
</html>
