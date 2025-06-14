<x-app-layout title="{{ $title }}">
    <!-- STATS -->
    <div class="max-w-7xl mx-auto bg-gradient-to-r from-fuchsia-500 to-purple-600 dark:from-purple-500 dark:to-indigo-500 h-96 rounded-lg shadow-md flex items-center justify-center lg:px-2">
        <dl class="mt-6 grid grid-cols-2 gap-4 sm:mt-8 lg:grid-cols-4 ">
            <div class="flex flex-col rounded-lg sm:max-h-full border border-white px-2 py-8 text-center" data-aos="fade-down">
                <dt class="order-last text-xs sm:text-lg font-medium text-white">Kritik & Saran</dt>
                <dd class="text-lg sm:text-4xl font-extrabold text-white lg:text-5xl">{{ $feedbackCount }}</dd>
            </div>

            <div class="flex flex-col rounded-lg sm:max-h-full border border-white px-2 py-8 text-center" data-aos="fade-up">
                <dt class="order-last text-xs sm:text-lg font-medium text-white">Article</dt>
                <dd class="text-lg sm:text-4xl fontT-extrabold text-white lg:text-5xl">{{ $articleCount }}</dd>
            </div>

            <div class="flex flex-col rounded-lg sm:max-h-full border border-white px-2 py-8 text-center" data-aos="fade-down">
                <dt class="order-last text-xs sm:text-lg font-medium text-white">Longwis</dt>
                <dd class="text-lg sm:text-4xl font-extrabold text-white lg:text-5xl">{{ $longwisCount }}</dd>
            </div>

            <div class="flex flex-col rounded-lg sm:max-h-full border border-white px-2 py-8 text-center" data-aos="fade-up">
                <dt class="order-last text-xs sm:text-lg font-medium text-white">Project</dt>
                <dd class="text-lg sm:text-4xl font-extrabold text-white lg:text-5xl">{{ $projectCount }}</dd>
            </div>
        </dl>
    </div>

    <div class="overflow-hidden">
        <div class="w-full max-w-7xl justify-center mx-auto">
            <div class="mt-6 grid grid-cols-3 gap-6">
                <article class="" data-aos="fade-right">
                    <div class="col-span-3 py-2 rounded-md">
                        @forelse ($articles as $article)
                            <div
                                class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white relative overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg p-4 mb-2 ">
                                <a href="{{ route('article.index') }}">
                                    <h3 class="text-xl font-semibold">{{ $article->title }}</h3>
                                    <p>{{ Str::limit($article->content, 100) }}</p>
                                    <a href="{{ route('article.show', $article->slug) }}" class="text-blue-500 hover:underline">Detail
                                        Article</a>
                                </a>
                            </div>
                        @empty
                            <a href="{{ route('article.index') }}" class="col-span-3 text-center text-gray-500">Tidak
                                ada <span class="hover:text-blue-500 hover:font-semibold">artikel</span> tersedia.</a>
                        @endforelse
                    </div>
                </article>

                <!-- Longwis Section -->
                <article class="" data-aos="fade-up">
                    <div class="col-span-3 py-2 rounded-md">
                        @forelse ($longwis->take(3) as $lw)
                            <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white relative overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg p-4 mb-2">
                                <a href="{{ route('longwis.index') }}">
                                    <h3 class="text-xl font-semibold">{{ $lw->nama }}</h3>
                                    <p class="mt-2">Tanggal: {{ $lw->tanggal }}</p>
                                    <p class="mt-2">Alamat: {{ $lw->alamat }}</p>
                                    <p class="mt-2">Penduduk: {{ $lw->penduduk }}</p>
                                    <p class="mt-2">Rumah: {{ $lw->rumah }}</p>
                                    <a href="{{ route('longwis.show', $lw->id) }}" class="text-blue-500 hover:underline mt-4 block">Detail Longwis</a>
                                </a>
                            </div>
                        @empty
                            <a href="{{ route('longwis.index') }}" class="col-span-3 text-center text-gray-500">Tidak ada <span class="hover:text-blue-500 hover:font-semibold">longwis</span> tersedia.</a>
                        @endforelse
                    </div>
                </article>

                <!-- Project Section -->
                <article class="" data-aos="fade-left">
                    <div class="col-span-3 py-2 rounded-md">
                        @forelse ($projects as $project)
                            <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white relative overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg p-4">
                                <h3 class="text-xl font-semibold">{{ $project->nama }}</h3>
                                <p class="mt-2">{{ Str::limit($project->description, 100) }}</p>
                                <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500 hover:underline mt-4 block">Detail Project</a>
                            </div>
                        @empty
                            <a href="{{ route('projects.index') }}" class="col-span-3 text-center text-gray-500">Tidak ada <span class="hover:text-blue-500 hover:font-semibold">project</span> tersedia.</a>
                        @endforelse
                    </div>
                </article>
            </div>
        </div>
    </div>

</x-app-layout>
