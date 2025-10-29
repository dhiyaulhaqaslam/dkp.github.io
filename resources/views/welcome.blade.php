<x-home-layout>
    {{-- IMPORTANT: If your main layout already includes Swiper/Keen CSS & JS, remove the duplicates below.
         These links are included inline so this view works standalone for testing. Move them to your layout
         (e.g. resources/views/layouts/app.blade.php or the <x-home-layout> component) for production. --}}

    <!-- Swiper & KeenSlider CSS (can be moved to main layout) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.5/keen-slider.min.css" />

    <style>
        /* Small helpers to keep slides centered and prevent multiple showing when Swiper script didn't init */
        .announcement-swiper .swiper {
            width: 100%;
        }

        .announcement-swiper .swiper-wrapper {
            display: flex;
            align-items: center;
        }

        .announcement-swiper .swiper-slide {
            display: flex !important;
            align-items: center;
            justify-content: flex-start;
            width: 100% !important;
            /* ensure each slide takes full width */
            padding: 0.25rem 0;
        }

        /* Optional: make keen slides visually similar size and center their content */
        .keen-slider__slide .card-shadow {
            height: 100%;
        }

        .keen-slider {
            /* make container take natural height (avoid clipped content) */
            padding-bottom: 1rem;
        }
    </style>

    <div class="overflow-hidden">

        {{-- Announcement (centered single info with navigation) --}}
        <div class="bg-indigo-600 text-white py-3">
            <div class="max-w-7xl mx-auto flex items-center justify-between px-4">
                <!-- Tombol Previous -->
                <button id="announcement-prev" class="p-2 rounded hover:bg-white/10 transition" aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Teks yang berubah di tengah -->
                <div id="announcement-text" class="text-sm font-medium text-center">
                    <i class="fa-solid fa-envelope me-2"></i>dinasketahananpangan.mks@gmail.com
                </div>

                <!-- Tombol Next -->
                <button id="announcement-next" class="p-2 rounded hover:bg-white/10 transition" aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- PRIORITY PROGRAM (KeenSlider kept) --}}
        <section class="bg-gray-50 dark:bg-gray-900 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-gray-100 text-center">Bidang Konsumsi
                    Priority Programs</h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">Program prioritas kami dalam
                    mendukung ketahanan pangan.</p>

                <div class="mt-8">
                    <div id="keen-slider" class="keen-slider">
                        @foreach ($priorities as $index => $priority)
                            <div class="keen-slider__slide">
                                <div class="rounded-xl bg-white dark:bg-gray-800 p-6 card-shadow">
                                    <div class="flex items-start gap-4">
                                        <img src="{{ $priority->image ? asset('storage/' . $priority->image) : 'https://images.unsplash.com/photo-1595152772835-219674b2a8a6?auto=format&fit=crop&w=600&q=60' }}"
                                            alt="" class="size-14 rounded-full object-cover">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 dark:text-gray-100">
                                                {{ Str::limit($priority->judul ?? 'Program Prioritas', 60) }}</h3>
                                            <p id="priority-{{ $index }}"
                                                class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                                                {{ Str::limit($priority->deskripsi, 180) }}
                                                <span onclick="toggleDetails({{ $index }})"
                                                    class="text-blue-600 dark:text-indigo-400 cursor-pointer">...
                                                    details</span>
                                            </p>

                                            <p id="priority-full-{{ $index }}"
                                                class="hidden mt-2 text-sm text-gray-600 dark:text-gray-300">
                                                {{ $priority->deskripsi }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 flex items-center justify-center gap-4">
                        <button id="keen-slider-previous" aria-label="Previous" class="p-2 rounded-md">
                            <svg class="w-5 h-5" fill="#fff" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M15.75 19.5L8.25 12l7.5-7.5" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" />
                            </svg>
                        </button>

                        <p class="text-sm text-gray-700 dark:text-gray-400"><span id="keen-slider-active">1</span> /
                            <span id="keen-slider-count">{{ count($priorities) }}</span>
                        </p>

                        <button id="keen-slider-next" aria-label="Next" class="p-2 rounded-md">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#fff" stroke="currentColor">
                                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        {{-- BERITA TERKINI --}}
        <section class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 dark:text-gray-100">Berita Terkini
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">Informasi dan artikel terbaru dari
                    Bidang Konsumsi.</p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($articles as $article)
                        <article
                            class="rounded-lg overflow-hidden bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 card-shadow transition hover:shadow-xl">
                            <div class="relative">
                                <a href="{{ route('article.show', $article->slug) }}">
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                        class="w-full h-48 object-cover" />
                                </a>
                                <span
                                    class="absolute left-4 top-4 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full">{{ \Carbon\Carbon::parse($article->tanggal)->format('d M Y') }}</span>
                            </div>

                            <div class="p-5">
                                <a href="{{ route('article.show', $article->slug) }}"
                                    class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $article->title }}</a>
                                <p class="mt-3 text-sm text-gray-600 dark:text-gray-300 line-clamp-3">
                                    {{ Str::limit(strip_tags($article->content), 120) }}</p>

                                <div class="mt-4 flex items-center justify-between">
                                    <a href="{{ route('article.show', $article->slug) }}"
                                        class="text-indigo-600 hover:underline font-medium">Find out more →</a>
                                    <div class="text-xs text-gray-500">{{ $article->author?->name ?? 'DKP' }}</div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- paginasi (jika ada) --}}
                <div class="mt-8">
                    {{ $articles->links() ?? '' }}
                </div>
            </div>
        </section>

        {{-- DATA LONGWIS --}}
        <section class="bg-gray-50 dark:bg-gray-900 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 dark:text-gray-100">
                    Data Longwis Terbaru
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                    Beberapa data Lorong Wisata terkini dari DKP Makassar.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($longwis as $lw)
                        <div class="rounded-lg bg-white dark:bg-gray-800 shadow hover:shadow-lg transition p-5">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">
                                {{ $lw->nama }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                📍 {{ $lw->alamat }}
                            </p>
                            <p class="text-xs text-gray-500 mb-3">
                                Tanggal: {{ \Carbon\Carbon::parse($lw->tanggal)->format('d M Y') }}
                            </p>
                            <p class="text-sm text-gray-700 dark:text-gray-400 mb-4">
                                Penduduk: {{ $lw->penduduk }} | Rumah: {{ $lw->rumah }}
                            </p>
                            <a href="{{ route('longwis.show', $lw->id) }}"
                                class="text-indigo-600 hover:underline font-medium text-sm">
                                Lihat Detail →
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('longwis.index') }}"
                        class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Lihat Semua Data Longwis
                    </a>
                </div>
            </div>
        </section>

        {{-- DATA PROJECTS --}}
        <section class="bg-white dark:bg-gray-900 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 dark:text-gray-100">
                    Project DKP Makassar
                </h2>

                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                    Daftar proyek kegiatan terbaru dari DKP Makassar.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($projects as $project)
                        <div class="rounded-lg bg-gray-50 dark:bg-gray-800 shadow hover:shadow-lg transition p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                {{ $project->nama }}
                            </h3>

                            <p class="text-sm text-gray-500 mb-2">
                                📅
                                {{ $project->tanggal ? \Carbon\Carbon::parse($project->tanggal)->format('d M Y') : 'Belum dijadwalkan' }}
                            </p>
                            <p class="text-sm mb-3 text-gray-700 dark:text-gray-300">
                                {!! Str::limit(strip_tags($project->description), 120) !!}
                            </p>
                            <p class="text-xs text-gray-600 mb-4">
                                Status:
                                <span
                                    class="font-medium
                            @if ($project->status === 'rencana') text-yellow-600
                            @elseif($project->status === 'progres') text-blue-600
                            @elseif($project->status === 'arsip') text-gray-500 @endif">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </p>
                            <a href="{{ route('projects.show', $project->id) }}"
                                class="text-indigo-600 hover:underline font-medium text-sm">
                                Lihat Detail →
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('projects.index') }}"
                        class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Lihat Semua Project
                    </a>
                </div>
            </div>
        </section>
    </div>

    {{-- Inline scripts for interactions (toggle details + keen slider init) --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.8.5/keen-slider.min.js"></script>

    <script>
        // Toggle details for priority items
        let openIndex = null;

        function toggleDetails(index) {
            // close previous
            if (openIndex !== null && openIndex !== index) {
                document.getElementById(`priority-${openIndex}`)?.classList.remove('hidden');
                document.getElementById(`priority-full-${openIndex}`)?.classList.add('hidden');
            }

            const shortEl = document.getElementById(`priority-${index}`);
            const fullEl = document.getElementById(`priority-full-${index}`);

            if (!shortEl || !fullEl) return;

            const isHidden = shortEl.classList.contains('hidden');
            if (isHidden) {
                shortEl.classList.remove('hidden');
                fullEl.classList.add('hidden');
                openIndex = null;
            } else {
                shortEl.classList.add('hidden');
                fullEl.classList.remove('hidden');
                openIndex = index;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // --- Swiper init ---
            try {
                if (typeof Swiper !== 'undefined') {
                    new Swiper('.mySwiper', {
                        slidesPerView: 1,
                        loop: true,
                        autoplay: {
                            delay: 4000,
                            disableOnInteraction: false
                        },
                        navigation: {
                            prevEl: '.swiper-prev-button',
                            nextEl: '.swiper-next-button',
                        }
                    });
                } else {
                    console.warn('Swiper library not loaded');
                }
            } catch (e) {
                console.warn('Swiper init failed', e);
            }

            // --- KeenSlider init ---
            try {
                const el = document.getElementById('keen-slider');
                if (!el) return;
                if (typeof KeenSlider === 'undefined') {
                    console.warn('KeenSlider library not loaded');
                    return;
                }

                const slider = new KeenSlider(el, {
                    loop: true,
                    mode: 'snap',
                    slides: {
                        perView: 1,
                        spacing: 24
                    },
                    breakpoints: {
                        '(min-width: 768px)': {
                            slides: {
                                perView: 1,
                                spacing: 24
                            }
                        },
                        '(min-width: 1024px)': {
                            slides: {
                                perView: 1,
                                spacing: 24
                            }
                        }
                    },
                    created(s) {
                        const idx = s.track.details.rel;
                        document.getElementById('keen-slider-active').innerText = idx + 1;
                        document.getElementById('keen-slider-count').innerText = s.slides.length;

                        // set opacity for visual hint
                        s.slides.forEach((sl, i) => sl.classList.toggle('opacity-60', i !== idx));
                    },
                    slideChanged(s) {
                        const idx = s.track.details.rel;
                        document.getElementById('keen-slider-active').innerText = idx + 1;
                        s.slides.forEach((sl, i) => sl.classList.toggle('opacity-60', i !== idx));
                    }
                });

                document.getElementById('keen-slider-previous')?.addEventListener('click', () => slider.prev());
                document.getElementById('keen-slider-next')?.addEventListener('click', () => slider.next());

            } catch (e) {
                console.warn('KeenSlider init failed', e);
            }
        });

        // Simple announcement switcher
        document.addEventListener('DOMContentLoaded', function() {
            const announcements = [
                '<i class="fa-solid fa-envelope me-2"></i>dinasketahananpangan.mks@gmail.com',
                '<i class="fa-solid fa-phone me-2"></i>+62 812 3456 7890',
                '<i class="fa-solid fa-location-dot me-2"></i>Graha Tata Cemerlang Mall, Jalan Metro Tj. Bunga'
            ];

            let currentIndex = 0;
            const textEl = document.getElementById('announcement-text');
            const prevBtn = document.getElementById('announcement-prev');
            const nextBtn = document.getElementById('announcement-next');

            function updateAnnouncement() {
                textEl.innerHTML = announcements[currentIndex];
            }

            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + announcements.length) % announcements.length;
                updateAnnouncement();
            });

            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % announcements.length;
                updateAnnouncement();
            });

            // Auto-slide every 5 seconds
            setInterval(() => {
                currentIndex = (currentIndex + 1) % announcements.length;
                updateAnnouncement();
            }, 5000);
        });
    </script>
</x-home-layout>
