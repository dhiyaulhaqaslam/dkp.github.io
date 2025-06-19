<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    {{-- SECTION: INFORMASI UMUM --}}
    <div class="w-full max-w-7xl mx-auto px-4 py-8">
        <h3 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-6 border-b pb-2">Informasi Umum</h3>

        @auth
            <div class="mb-4 flex justify-end">
                <a href="{{ route('informasi.create') }}"
                    class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-4 rounded-lg transition">
                    + Tambah Informasi
                </a>
            </div>
        @endauth

        @if (session('success'))
            <div id="alert-message"
                class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm border border-green-300 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 md:grid-cols-2">
            @foreach ($informasi as $info)
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $info->judul }}</h4>
                    </div>

                    @php
                        $deskripsi_full = strip_tags($info->deskripsi);
                        $deskripsi_limit = \Illuminate\Support\Str::limit($deskripsi_full, 150, '');
                        $deskripsi_remaining = substr($deskripsi_full, strlen($deskripsi_limit));
                    @endphp

                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
                        {{ $deskripsi_limit }}
                        <span id="dots-{{ $info->id }}">...</span>
                        <span id="more-{{ $info->id }}" class="hidden">{{ $deskripsi_remaining }}</span>
                        @if (strlen($deskripsi_remaining) > 0)
                            <button onclick="toggleReadMore({{ $info->id }})"
                                class="text-indigo-500 hover:underline text-sm ml-1" id="btn-{{ $info->id }}">
                                Selengkapnya
                            </button>
                        @endif
                    </p>

                    @if ($info->gambar)
                        <img src="{{ asset('storage/' . $info->gambar) }}"
                            class="mt-3 w-full h-40 object-cover rounded-lg border" alt="Gambar">
                    @endif

                    @if ($info->video_link)
                        <a href="{{ $info->video_link }}" target="_blank"
                            class="mt-3 inline-block text-blue-600 hover:underline text-sm">Tonton Video</a>
                    @endif

                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('informasi.edit', $info->id) }}"
                            class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-md transition">
                            Edit
                        </a>
                        <form action="{{ route('informasi.destroy', $info->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus informasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-sm bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded-md transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- JS READ MORE --}}
    <script>
        function toggleReadMore(id) {
            const dots = document.getElementById("dots-" + id);
            const moreText = document.getElementById("more-" + id);
            const btnText = document.getElementById("btn-" + id);

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                moreText.classList.add("hidden");
                btnText.innerHTML = "Selengkapnya";
            } else {
                dots.style.display = "none";
                moreText.classList.remove("hidden");
                btnText.innerHTML = "Tutup";
            }
        }
    </script>

    {{-- SECTION: INFO PRIORITY --}}
    {{-- SECTION: INFO PRIORITY --}}
    <div class="w-full max-w-7xl mx-auto px-4 py-8">
        <h3 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-6 border-b pb-2">Info Priority</h3>

        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-xl shadow-md">
            <div class="mb-5 flex justify-end">
                <a href="{{ route('priority.create') }}"
                    class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-4 rounded-lg transition">
                    + Tambah Priority
                </a>
            </div>

            <ul class="space-y-6">
                @foreach ($priorities as $priority)
                    <li
                        class="p-6 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
                        <div class="flex justify-between items-start">
                            <strong class="text-xl text-gray-900 dark:text-white">{{ $priority->judul }}</strong>

                            <div class="flex space-x-2">
                                <a href="{{ route('priority.edit', $priority->id) }}"
                                    class="text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-md transition">Edit</a>
                                <form action="{{ route('priority.destroy', $priority->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded-md transition">Delete</button>
                                </form>
                            </div>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $priority->deskripsi }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-app-layout>
