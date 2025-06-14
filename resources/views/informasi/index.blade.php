<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <div class="w-full max-w-7xl mx-auto flex flex-col justify-center items-center px-4">
        <h3 class="text-4xl font-semibold mb-4">Info About</h3>
        <div class="rounded-md w-full overflow-x-auto  bg-white dark:bg-gray-800 text-black dark:text-white p-6">
            @auth
                <div class="my-5 flex justify-end">
                    <a class="px-4 py-2 bg-indigo-600 text-white font-light rounded-md hover:bg-indigo-700 transition duration-500"
                        href="{{ route('informasi.create') }}">Create</a>
                </div>
            @endauth

            @if (session('success'))
                <div id="alert-message" class="alert alert-success mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const alertMessage = document.getElementById('alert-message');
                        if (alertMessage) {
                            setTimeout(() => {
                                alertMessage.style.transition = "opacity 0.5s ease"; // Animasi transisi
                                alertMessage.style.opacity = 0; // Mengurangi opacity hingga 0
                                setTimeout(() => alertMessage.remove(),
                                    500); // Menghapus elemen setelah animasi selesai
                            }, 3000); // Durasi tampilan sebelum mulai menghilang (3 detik)
                        }
                    });
                </script>
            @endif

            <ul class="space-y-4">
                @foreach ($informasi as $info)
                    @php
                        // Potong teks menjadi dua bagian: awal dan lanjutannya
                        $deskripsi_full = strip_tags($info->deskripsi);
                        $deskripsi_limit = \Illuminate\Support\Str::limit($deskripsi_full, 150, '');
                        $deskripsi_remaining = substr($deskripsi_full, strlen($deskripsi_limit));
                    @endphp

                    <div
                        class="mb-6 border border-gray-300 p-6 bg-white dark:bg-gray-800 rounded text-gray-600 dark:text-gray-300">
                        <strong class="text-black dark:text-white block mb-2">{{ $info->judul }}</strong>

                        {{-- Paragraf cuplikan awal --}}
                        <p class="text-sm mb-2">
                            {{ $deskripsi_limit }}
                            <span id="dots-{{ $info->id }}">...</span>
                            <span id="more-{{ $info->id }}" class="hidden">{{ $deskripsi_remaining }}</span>
                            @if (strlen($deskripsi_remaining) > 0)
                                <button onclick="toggleReadMore({{ $info->id }})"
                                    class="text-indigo-600 text-sm ml-1" id="btn-{{ $info->id }}">
                                    Selengkapnya
                                </button>
                            @endif
                        </p>

                        {{-- Tambahan konten jika ada --}}
                        @if ($info->gambar)
                            <img src="{{ asset('storage/' . $info->gambar) }}"
                                class="h-24 w-24 object-cover rounded mb-2" alt="Gambar">
                        @endif
                        @if ($info->video_link)
                            <a href="{{ $info->video_link }}" target="_blank" class="text-blue-500 block mt-2">Tonton
                                Video</a>
                        @endif

                        {{-- Aksi Edit & Hapus --}}
                        <div class="flex mt-4 space-x-2">
                            <a href="{{ route('informasi.edit', $info->id) }}"
                                class="bg-indigo-600 hover:bg-indigo-700 rounded-md px-3 py-1 text-white">Edit</a>
                            <form action="{{ route('informasi.destroy', $info->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 rounded-md px-3 py-1 text-white">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

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

    {{-- ISI PRIORITY --}}
    <h3 class="text-4xl  font-semibold mb-4 text-center mt-5">Info Priority</h3>
    <div
        class="my-5 w-full max-w-7xl mx-auto flex flex-col justify-center items-center px-4 bg-gray-100 dark:bg-gray-800 rounded-md">
        <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white p-6">
            <div class="my-5 flex justify-end">
                <a href="{{ route('priority.create') }}"
                    class="px-4 py-2 bg-indigo-600 text-white font-light rounded-md hover:bg-indigo-700 transition duration-500">
                    Create
                </a>
            </div>
            <ul>
                @foreach ($priorities as $priority)
                    <li class="mb-6 border border-gray-300 p-6 text-gray-600 dark:text-gray-300">
                        <strong class="text-black dark:text-white">{{ $priority->judul }}</strong>:
                        {{ $priority->deskripsi }}
                        <div class="flex mt-4 space-x-2">
                            <a href="{{ route('priority.edit', $priority->id) }}"
                                class="bg-indigo-600 hover:bg-indigo-700 rounded-md px-3 py-1 text-white">Edit</a>
                            <form action="{{ route('priority.destroy', $priority->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 rounded-md px-3 py-1 text-white">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

</x-app-layout>
