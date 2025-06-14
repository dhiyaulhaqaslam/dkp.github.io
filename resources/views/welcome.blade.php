<x-home-layout>
    <div class="">
        {{-- Announcement --}}
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <div class="bg-indigo-600 dark:bg-gray-800 px-4 py-3" data-aos="fade-left">
            <div class="mx-auto flex max-w-3xl items-center justify-center">
                <button
                    class="swiper-prev-button hidden hover:text-gray-500 sm:block sm:rounded sm:text-gray-700 sm:transition"
                    aria-label="Previous slide">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 rtl:rotate-180" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <p class="text-center text-sm font-medium text-gray-100">
                                <i class="fa-solid fa-envelope me-1"></i>
                                dinasketahananpangan.mks@gmail.com
                            </p>
                        </div>

                        <div class="swiper-slide">
                            <p class="text-center text-sm font-medium text-gray-100">
                                <i class="fa-solid fa-phone me-1"></i>
                                +62 812 3456 7890
                            </p>
                        </div>

                        <div class="swiper-slide">
                            <p class="text-center text-sm font-medium text-gray-100">
                                <i class="fa-solid fa-location-dot me-1"></i>
                                Graha Tata Cemerlang Mall, Jalan Metro Tj. Bunga
                            </p>
                        </div>
                    </div>
                </div>

                <button
                    class="swiper-next-button hidden hover:text-gray-500 sm:block sm:rounded sm:text-gray-700 sm:transition"
                    aria-label="Next slide">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 rtl:rotate-180" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        <script>
            new Swiper('.swiper', {
                effect: 'fade',
                loop: true,
                autoplay: {
                    delay: 5000,
                },
                fadeEffect: {
                    crossFade: true,
                },
                navigation: {
                    prevEl: '.swiper-prev-button',
                    nextEl: '.swiper-next-button',
                },
            })
        </script>
        {{-- PRIORITY --}}
        <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

        <script type="module">
            import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

            const keenSliderActive = document.getElementById('keen-slider-active')
            const keenSliderCount = document.getElementById('keen-slider-count')

            const keenSlider = new KeenSlider(
                '#keen-slider', {
                    loop: true,
                    defaultAnimation: {
                        duration: 750,
                    },
                    slides: {
                        origin: 'center',
                        perView: 1,
                        spacing: 16,
                    },
                    breakpoints: {
                        '(min-width: 640px)': {
                            slides: {
                                origin: 'center',
                                perView: 1.5,
                                spacing: 16,
                            },
                        },
                        '(min-width: 768px)': {
                            slides: {
                                origin: 'center',
                                perView: 1.75,
                                spacing: 16,
                            },
                        },
                        '(min-width: 1024px)': {
                            slides: {
                                origin: 'center',
                                perView: 3,
                                spacing: 16,
                            },
                        },
                    },
                    created(slider) {
                        slider.slides[slider.track.details.rel].classList.remove('opacity-40')

                        keenSliderActive.innerText = slider.track.details.rel + 1
                        keenSliderCount.innerText = slider.slides.length
                    },
                    slideChanged(slider) {
                        slider.slides.forEach((slide) => slide.classList.add('opacity-40'))

                        slider.slides[slider.track.details.rel].classList.remove('opacity-40')

                        keenSliderActive.innerText = slider.track.details.rel + 1
                    },
                },
                []
            )

            const keenSliderPrevious = document.getElementById('keen-slider-previous')
            const keenSliderNext = document.getElementById('keen-slider-next')

            keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
            keenSliderNext.addEventListener('click', () => keenSlider.next())
        </script>

        {{-- DUA --}}
        <section class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white" data-aos="fade-down">
            <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
                <h2
                    class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl dark:text-gray-400 py-4 mb-2">
                    Bidang Konsumsi Priority Programs
                </h2>
                <div class="mt-8">
                    <div id="keen-slider" class="keen-slider">
                        @foreach ($priorities as $index => $priority)
                            <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
                                <blockquote class="rounded-lg bg-gray-50 dark:bg-gray-800 p-6 shadow-sm sm:p-8">
                                    <div class="flex items-center gap-4">
                                        <img alt=""
                                            src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                                            class="size-14 rounded-full object-cover" />
                                    </div>

                                    <p id="priority-{{ $index }}" class="mt-4 text-gray-800 dark:text-gray-300">
                                        {{ Str::limit($priority->deskripsi, 180) }}
                                        <span onclick="toggleDetails({{ $index }})"
                                            class="text-blue-500 cursor-pointer">... details</span>
                                    </p>

                                    <p id="priority-full-{{ $index }}"
                                        class="hidden mt-4 text-gray-800 dark:text-gray-300">
                                        {{ $priority->deskripsi }}
                                    </p>
                                </blockquote>
                            </div>
                        @endforeach
                    </div>
                </div>

                <script>
                    // State untuk melacak teks yang sedang terbuka
                    let openIndex = null;

                    // Fungsi toggle teks
                    function toggleDetails(index, showFull = true) {
                        // Tutup teks sebelumnya jika ada
                        if (openIndex !== null) {
                            document.getElementById(`priority-${openIndex}`).classList.remove("hidden");
                            document.getElementById(`priority-full-${openIndex}`).classList.add("hidden");
                        }

                        // Jika membuka teks yang sama, maka langsung tutup
                        if (openIndex === index && !showFull) {
                            openIndex = null;
                            return;
                        }

                        // Buka teks yang dipilih
                        document.getElementById(`priority-${index}`).classList.add("hidden");
                        document.getElementById(`priority-full-${index}`).classList.remove("hidden");
                        openIndex = index;
                    }

                    // Tutup teks saat slider digeser
                    const keenSlider = document.getElementById("keen-slider");
                    keenSlider.addEventListener("scroll", () => {
                        if (openIndex !== null) {
                            document.getElementById(`priority-${openIndex}`).classList.remove("hidden");
                            document.getElementById(`priority-full-${openIndex}`).classList.add("hidden");
                            openIndex = null;
                        }
                    });
                </script>

                <div class="mt-6 flex items-center justify-center gap-4">
                    <button aria-label="Previous slide" id="keen-slider-previous"
                        class="text-gray-600 transition-colors hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <p class="w-16 text-center text-sm text-gray-700">
                        <span id="keen-slider-active"></span>
                        /
                        <span id="keen-slider-count"></span>
                    </p>

                    <button aria-label="Next slide" id="keen-slider-next"
                        class="text-gray-600 transition-colors hover:text-gray-900">
                        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- BERITA ARTIKEL --}}
        <section class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white py-8" data-aos="fade-up">
            <div class="">
                <h2
                    class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl dark:text-gray-400 py-4 mb-2">
                    Berita Terkini
                </h2>
            </div>
            <div class="justify-items-center container mx-auto">
                <div class="w-fit grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2 justify-items-center">
                    @foreach ($articles as $article)
                        <article
                            class="relative w-full overflow-hidden rounded-lg border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-md 2xl:max-w-xl transition hover:shadow-lg dark:shadow-gray-800 dark:hover:shadow-gray-800">
                            <span
                                class="absolute -right-px -top-px rounded-bl-3xl rounded-tr-3xl bg-indigo-600 dark:bg-gray-800 py-4 px-4 m-1 font-semibold uppercase text-white">
                                {{ $article->tanggal }}
                            </span>
                            <a href="{{ route('article.show', $article->slug) }}" class="w-full object-cover">
                                <img class="w-full h-80 object-cover object-center" alt=""
                                    src="{{ asset('storage/' . $article->image) }}">
                            </a>
                            <div class="p-4 sm:p-6">
                                <a href="{{ route('article.show', $article->slug) }}">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ $article->title }}</h3>
                                </a>
                                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-400">
                                    {{ Str::limit($article->content, 100) }}
                                </p>
                                <a href="{{ route('article.show', $article->slug) }}"
                                    class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-indigo-500 dark:text-gray-400">
                                    Find out more
                                    <span aria-hidden="true"
                                        class="block transition-all group-hover:ms-0.5 rtl:rotate-180">&rarr;</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-home-layout>
