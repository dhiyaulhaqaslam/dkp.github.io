<x-app-layout title="{{ $title }}">
    <!-- STATS SECTION -->
    <div
        class="max-w-7xl mx-auto bg-gradient-to-r from-fuchsia-500 to-purple-600 dark:from-purple-500 dark:to-indigo-500 h-96 rounded-3xl shadow-xl flex items-center justify-center px-6">
        <dl class="grid grid-cols-2 sm:grid-cols-4 gap-6 w-full">
            @php
                $stats = [
                    ['label' => 'Kritik & Saran', 'count' => $feedbackCount, 'icon' => '💬'],
                    ['label' => 'Article', 'count' => $articleCount, 'icon' => '📝'],
                    ['label' => 'Longwis', 'count' => $longwisCount, 'icon' => '📍'],
                    ['label' => 'Project', 'count' => $projectCount, 'icon' => '📁'],
                ];
            @endphp
            @foreach ($stats as $stat)
                <div class="bg-white/20 backdrop-blur-md rounded-xl p-6 text-center shadow-lg transform transition hover:scale-105"
                    data-aos="fade-up">
                    <div class="text-3xl">{{ $stat['icon'] }}</div>
                    <dd class="text-4xl font-bold text-white">{{ $stat['count'] }}</dd>
                    <dt class="mt-2 text-sm text-white tracking-wide">{{ $stat['label'] }}</dt>
                </div>
            @endforeach
        </dl>
    </div>

    <!-- CONTENT SECTION -->
    <div class="overflow-hidden py-10 space-y-16 max-w-7xl mx-auto">

        <!-- Artikel -->
        <section>
            <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse ($articles as $article)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 flex flex-col justify-between h-full"
                        data-aos="fade-right">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($article->content, 90) }}
                            </p>
                        </div>
                        <a href="{{ route('article.show', $article->slug) }}"
                            class="mt-4 inline-flex items-center text-indigo-600 hover:underline">
                            Detail Article
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">Tidak ada artikel tersedia.</div>
                @endforelse
            </div>
        </section>

        <!-- Longwis -->
        <section>
            <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Data Longwis</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse ($longwis->take(3) as $lw)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 flex flex-col justify-between h-full"
                        data-aos="fade-up">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">{{ $lw->nama }}</h3>
                            <p class="text-sm">Tanggal: {{ $lw->tanggal }}</p>
                            <p class="text-sm">Alamat: {{ $lw->alamat }}</p>
                            <p class="text-sm">Penduduk: {{ $lw->penduduk }}</p>
                            <p class="text-sm">Rumah: {{ $lw->rumah }}</p>
                        </div>
                        <a href="{{ route('longwis.show', $lw->id) }}"
                            class="mt-4 inline-flex items-center text-indigo-600 hover:underline">
                            Detail Longwis
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">Tidak ada longwis tersedia.</div>
                @endforelse
            </div>
        </section>

        <!-- Projects -->
        <section>
            <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Daftar Project</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse ($projects as $project)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 flex flex-col justify-between h-full"
                        data-aos="fade-left">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">{{ $project->nama }}</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                {{ Str::limit($project->description, 90) }}</p>
                        </div>
                        <a href="{{ route('projects.show', $project->id) }}"
                            class="mt-4 inline-flex items-center text-indigo-600 hover:underline">
                            Detail Project
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">Tidak ada project tersedia.</div>
                @endforelse
            </div>
        </section>

    </div>
</x-app-layout>
