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

        <form action="{{ route('program.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block mb-1">Nama</label>
                <input type="text" name="nama" id="nama" class="border p-2 w-full" required>
                @error('nama')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="umur" class="block mb-1">Umur</label>
                <input type="number" name="umur" id="umur" class="border p-2 w-full" required>
                @error('umur')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save</button>
            <a href="{{ route('program.index') }}" class="text-gray-500 hover:underline ml-4">Batal</a>
        </form>
    </div>
</body>
</html>
