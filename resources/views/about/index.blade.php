@extends('layouts.main2')

@section('content')
    <div class="pt-10 bg-gray-100 font-poppins">
        <div class="container mx-auto">
            <section
                class="overflow-hidden bg-[url(https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?q=80&w=2670&auto=format&fit=crop)] bg-cover bg-top bg-no-repeat"
                data-aos="fade-right">
                <div class="bg-black/50 p-8 md:p-12 lg:px-16 lg:py-24 text-center">
                    <div class="text-center ltr:sm:text-left rtl:sm:text-right">
                        <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">Tentang kami</h2>

                        <p class="hidden max-w-2xl mx-auto text-white/90 md:mt-6 md:block md:text-lg md:leading-relaxed">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore officia corporis quasi
                            doloribus iure architecto quae voluptatum beatae excepturi dolores.
                        </p>

                        <div class="mt-4 sm:mt-8">
                            <a href="{{ route('article.index') }}"
                                class="inline-block rounded-full bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-yellow-400">
                                More
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <style>
                .keen-slider {
                    display: flex;
                    overflow: hidden;
                    /* Sesuaikan jarak antar kotak */
                }

                .keen-slider__slide {
                    flex: 0 0 auto;
                    /* Agar item tidak mengecil */
                    scroll-snap-align: start;
                    width: calc(100% / 3);
                    /* Sesuaikan jumlah item per tampilan */
                }

                @media (min-width: 1024px) {
                    .keen-slider__slide {
                        width: calc(100% / 3);
                        /* Ganti dengan jumlah slide yang sesuai */
                    }
                }
            </style>

            <script type="module">
                import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

                const keenSlider = new KeenSlider(
                    '#keen-slider', {
                        loop: true,
                        slides: {
                            origin: 'center',
                            perView: 1.25,
                            spacing: 16,
                        },
                        breakpoints: {
                            '(min-width: 1024px)': {
                                slides: {
                                    origin: 'auto',
                                    perView: 1.5,
                                    spacing: 32,
                                },
                            },
                        },
                    },
                    []
                )

                const keenSliderPrevious = document.getElementById('keen-slider-previous')
                const keenSliderNext = document.getElementById('keen-slider-next')

                const keenSliderPreviousDesktop = document.getElementById('keen-slider-previous-desktop')
                const keenSliderNextDesktop = document.getElementById('keen-slider-next-desktop')

                keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
                keenSliderNext.addEventListener('click', () => keenSlider.next())

                keenSliderPreviousDesktop.addEventListener('click', () => keenSlider.prev())
                keenSliderNextDesktop.addEventListener('click', () => keenSlider.next())
            </script>

            <section class="w-full bg-white dark:bg-gray-900 text-gray-800 dark:text-white" data-aos="fade-up">
                <div class="mx-auto max-w-[1530px] py-12 px-6 lg:py-16 lg:pe-0 lg:ps-0 xl:py-24">
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 lg:items-center lg:gap-16">
                        <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-start">
                                Profil Dinas Ketahanan Pangan Kota Makassar
                            </h2>

                            <p class="mt-4 text-start">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas veritatis illo
                                placeat
                                harum porro optio fugit a culpa sunt id!
                            </p>

                            <div class="hidden lg:mt-8 lg:flex lg:gap-4 justify-start">
                                <button aria-label="Previous slide" id="keen-slider-previous-desktop"
                                    class="rounded-full border border-indigo-600 p-3 text-indigo-600 transition hover:bg-indigo-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5 rtl:rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 19.5L8.25 12l7.5-7.5" />
                                    </svg>
                                </button>

                                <button aria-label="Next slide" id="keen-slider-next-desktop"
                                    class="rounded-full border border-indigo-600 p-3 text-indigo-600 transition hover:bg-indigo-600 hover:text-white">
                                    <svg class="size-5 rtl:rotate-180" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="-mx-6 lg:col-span-2 lg:mx-0">
                            <div id="keen-slider" class="keen-slider">
                                @foreach ($informasi->take(3) as $info)
                                    <div class="keen-slider__slide">
                                        <blockquote id="blockquote-{{ $info->id }}"
                                            class="relative flex h-full flex-col justify-between p-6 shadow-sm sm:p-8 lg:p-12 bg-gray-200/25 dark:bg-gray-800 text-gray-800 dark:text-white transition-all duration-300 overflow-hidden"
                                            style="max-height: 300px;"> <!-- Tinggi default -->
                                            <div>
                                                <!-- Loop untuk menampilkan 5 bintang -->
                                                <div class="flex gap-0.5 text-green-500">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <svg class="size-5" fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                        </svg>
                                                    @endfor
                                                </div>

                                                <div class="mt-4">
                                                    <!-- Judul Informasi -->
                                                    <p class="text-2xl font-bold text-indigo-600 sm:text-3xl">
                                                        {{ $info->judul }}
                                                    </p>

                                                    <!-- Deskripsi Informasi -->
                                                    <p class="mt-4 leading-relaxed" id="deskripsi-{{ $info->id }}">
                                                        {{ Str::limit($info->deskripsi, 180) }}
                                                        @if (Str::length($info->deskripsi) > 180)
                                                            <button class="text-indigo-500 hover:underline"
                                                                onclick="toggleFullText({{ $info->id }})">
                                                                Details
                                                            </button>
                                                        @endif
                                                    </p>

                                                    <!-- Data tersembunyi untuk teks penuh -->
                                                    <span id="limited-text-{{ $info->id }}" style="display: none;">
                                                        {{ Str::limit($info->deskripsi, 180) }}
                                                    </span>
                                                    <span id="full-text-{{ $info->id }}" style="display: none;">
                                                        {{ $info->deskripsi }}
                                                    </span>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                @endforeach

                                <!-- Script untuk toggle teks lengkap -->
                                <script>
                                    function toggleFullText(id) {
                                        const blockquote = document.getElementById(`blockquote-${id}`);
                                        const deskripsiElement = document.getElementById(`deskripsi-${id}`);
                                        const limitedText = document.getElementById(`limited-text-${id}`).innerText;
                                        const fullText = document.getElementById(`full-text-${id}`).innerText;

                                        // Tutup semua blockquote lainnya
                                        document.querySelectorAll("blockquote").forEach((el) => {
                                            if (el !== blockquote) {
                                                el.style.maxHeight = "300px"; // Reset ke tinggi default
                                                const otherId = el.id.split("-")[1];
                                                const otherDeskripsi = document.getElementById(`deskripsi-${otherId}`);
                                                if (otherDeskripsi) {
                                                    const otherLimitedText = document.getElementById(`limited-text-${otherId}`).innerText;
                                                    otherDeskripsi.innerHTML = `${otherLimitedText}
                                                        <button class="text-indigo-500 hover:underline" onclick="toggleFullText(${otherId})">
                                                            Details
                                                        </button>`;
                                                }
                                            }
                                        });

                                        const isFullText = blockquote.style.maxHeight === "none";

                                        if (isFullText) {
                                            // Kembali ke teks yang terpotong
                                            blockquote.style.maxHeight = "300px"; // Reset tinggi
                                            deskripsiElement.innerHTML = `${limitedText}
                                            <button class="text-indigo-500 hover:underline" onclick="toggleFullText(${id})">
                                                Details
                                            </button>`;
                                        } else {
                                            // Tampilkan teks penuh
                                            blockquote.style.maxHeight = "none"; // Bebaskan tinggi
                                            deskripsiElement.innerHTML = `${fullText}
                                            <button class="text-indigo-500 hover:underline" onclick="toggleFullText(${id})">
                                                Less
                                            </button>`;
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-center gap-4 lg:hidden">
                        <button aria-label="Previous slide" id="keen-slider-previous"
                            class="rounded-full border border-indigo-600 p-4 text-indigo-600 transition hover:bg-indigo-600 hover:text-white">
                            <svg class="size-5 -rotate-180 transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </button>

                        <button aria-label="Next slide" id="keen-slider-next"
                            class="rounded-full border border-indigo-600 p-4 text-indigo-600 transition hover:bg-indigo-600 hover:text-white">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container py-12 mx-auto space-y-8">
        <section class="px-4" data-aos="fade-right">
            <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <!-- Deskripsi -->
                <div class="bg-gray-100 dark:bg-gray-800 text-black dark:text-white rounded-xl p-8 shadow-md">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-4">Deskripsi</h2>

                    @foreach ($informasi as $index => $info)
                        <div x-data="{ open: false }" class="mb-6">
                            <p class="text-gray-600 dark:text-gray-400">
                                <span x-show="!open">
                                    {{ Str::limit($info->deskripsi, 180) }}
                                </span>
                                <span x-show="open">
                                    {{ $info->deskripsi }}
                                </span>
                            </p>
                            @if (Str::length($info->deskripsi) > 180)
                                <button
                                    class="mt-2 text-indigo-600 dark:text-indigo-400 hover:underline text-sm font-medium"
                                    @click="open = !open"
                                    x-text="open ? 'Tampilkan lebih sedikit' : 'Tampilkan lebih banyak'">
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Video Thumbnail -->
                <div class="grid grid-cols-1 gap-6">
                    @for ($i = 0; $i < 2; $i++)
                        @php
                            $info = $informasi[$i] ?? null;
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
                            class="block overflow-hidden rounded-xl shadow-md hover:shadow-lg transition duration-300">
                            <img src="{{ $thumbnail }}" alt="Thumbnail Video"
                                class="w-full object-cover aspect-video">
                        </a>
                    @endfor
                </div>
            </div>
        </section>
    </div>
@endsection
