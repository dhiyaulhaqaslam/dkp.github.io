@extends('layouts.main2')

@section('content')
    <div class="bg-gray-50 dark:bg-gray-900 font-poppins">
        <!-- HERO SECTION -->
        <section class="relative h-[70vh] bg-cover bg-center flex items-center justify-center text-center"
            style="background-image: url('https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?q=80&w=2670&auto=format&fit=crop');"
            data-aos="fade-down">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative z-10 text-white px-4">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Tentang Kami</h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-200">
                    Kami berkomitmen menjaga ketahanan pangan Kota Makassar melalui inovasi dan kolaborasi berkelanjutan.
                </p>
            </div>
        </section>

        <!-- PROFIL SECTION -->
        <section class="py-16 px-6" data-aos="fade-up">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                        Profil Dinas Ketahanan Pangan
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Dinas Ketahanan Pangan Kota Makassar berfokus pada pengembangan dan pengawasan ketahanan pangan
                        masyarakat.
                        Kami terus berinovasi untuk menciptakan sistem pangan yang tangguh, berkelanjutan, dan berkeadilan
                        sosial.
                    </p>
                    <a href="{{ route('article.index') }}"
                        class="mt-6 inline-block px-6 py-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
                        Lihat Artikel
                    </a>
                </div>

                <div class="overflow-hidden rounded-xl shadow-lg">
                    <img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?q=80&w=2670&auto=format&fit=crop"
                        alt="Profil Dinas" class="object-cover w-full h-[350px] hover:scale-105 transition duration-500">
                </div>
            </div>
        </section>

        <!-- INFORMASI SLIDER -->
        <section class="bg-white dark:bg-gray-800 py-16" data-aos="fade-up">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-10">
                    Informasi & Pengumuman
                </h2>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($informasi->take(6) as $info)
                        <div class="bg-gray-100 dark:bg-gray-900 p-6 rounded-xl shadow hover:shadow-lg transition group">
                            <h3 class="text-xl font-semibold text-indigo-600 mb-2">{{ $info->judul }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                {{ Str::limit($info->deskripsi, 140) }}
                            </p>

                            @if (Str::length($info->deskripsi) > 140)
                                <button onclick="showFullText('{{ $info->id }}')"
                                    class="text-indigo-500 hover:underline mt-2 inline-block text-sm">
                                    Baca Selengkapnya
                                </button>
                                <p id="full-text-{{ $info->id }}" class="hidden text-gray-600 dark:text-gray-300 mt-2">
                                    {{ $info->deskripsi }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- VIDEO GALLERY -->
        <section class="py-16 bg-gray-50 dark:bg-gray-900" data-aos="fade-right">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-10 text-center">
                    Video Kegiatan
                </h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($informasi->take(2) as $info)
                        @php
                            $videoLink = $info->video_link ?? null;
                            $videoId = null;
                            if ($videoLink) {
                                preg_match(
                                    '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?\/?|watch\?v=))|youtu\.be\/)([^\&\?\/]+)/',
                                    $videoLink,
                                    $matches,
                                );
                                $videoId = $matches[1] ?? null;
                            }
                            $thumbnail = $videoId
                                ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg"
                                : 'https://images.unsplash.com/photo-1731690415686-e68f78e2b5bd?q=80&w=2670&auto=format&fit=crop';
                        @endphp

                        <a href="{{ $videoLink ?? '#' }}" target="_blank"
                            class="block overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition">
                            <img src="{{ $thumbnail }}" alt="Thumbnail Video" class="w-full aspect-video object-cover">
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <script>
        function showFullText(id) {
            const text = document.getElementById('full-text-' + id);
            if (text.classList.contains('hidden')) {
                text.classList.remove('hidden');
            } else {
                text.classList.add('hidden');
            }
        }
    </script>
@endsection
