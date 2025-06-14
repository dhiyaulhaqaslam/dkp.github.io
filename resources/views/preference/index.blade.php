<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="shadow-md rounded-md p-6 bg-white dark:bg-gray-800 text-gray-800 dark:text-white max-w-7xl mx-auto">
        <div class="flex items-center justify-center space-x-6">
            <!-- Tema Terang -->
            <div id="light-status"
                class="items-center text-lg font-medium text-gray-700 dark:text-gray-300 relative p-3 rounded-lg border border-gray-300 hidden">
                <span class="text-yellow-400 text-2xl">🌞</span>
                <span class="ml-2 text-blue-500 font-bold">Tema Terang</span>
            </div>

            <!-- Tema Gelap -->
            <div id="dark-status"
                class="items-center text-lg font-medium text-gray-700 dark:text-gray-300 relative p-3 rounded-lg border border-gray-300 hidden">
                <span class="text-gray-600 text-2xl">🌙</span>
                <span class="ml-2 text-blue-500 font-bold">Tema Gelap</span>
            </div>
        </div>

        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Update Social Media Links') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Update the social media links that appear in the footer of your site.') }}
                </p>
            </header>

            <form method="POST" action="{{ route('preference.update-social-media') }}" class="mt-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="facebook_url" :value="__('Facebook URL')" />
                    <x-text-input id="facebook_url" name="facebook_url" type="url" class="mt-1 block w-full"
                        :value="old('facebook_url', $socialMedia->facebook_url ?? '')" autocomplete="off" />
                    <x-input-error :messages="$errors->get('facebook_url')" class="mt-2" />

                    @if (!empty($socialMedia->facebook_url))
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            {{ __('Current:') }} <a href="{{ $socialMedia->facebook_url }}" target="_blank"
                                class="text-indigo-600 underline">{{ $socialMedia->facebook_url }}</a>
                        </p>
                    @endif
                </div>

                <div>
                    <x-input-label for="instagram_url" :value="__('Instagram URL')" />
                    <x-text-input id="instagram_url" name="instagram_url" type="url" class="mt-1 block w-full"
                        :value="old('instagram_url', $socialMedia->instagram_url ?? '')" autocomplete="off" />
                    <x-input-error :messages="$errors->get('instagram_url')" class="mt-2" />

                    @if (!empty($socialMedia->instagram_url))
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            {{ __('Current:') }} <a href="{{ $socialMedia->instagram_url }}" target="_blank"
                                class="text-indigo-600 underline">{{ $socialMedia->instagram_url }}</a>
                        </p>
                    @endif
                </div>

                <div>
                    <x-input-label for="twitter_url" :value="__('Twitter URL')" />
                    <x-text-input id="twitter_url" name="twitter_url" type="url" class="mt-1 block w-full"
                        :value="old('twitter_url', $socialMedia->twitter_url ?? '')" autocomplete="off" />
                    <x-input-error :messages="$errors->get('twitter_url')" class="mt-2" />

                    @if (!empty($socialMedia->twitter_url))
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            {{ __('Current:') }} <a href="{{ $socialMedia->twitter_url }}" target="_blank"
                                class="text-indigo-600 underline">{{ $socialMedia->twitter_url }}</a>
                        </p>
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'social-media-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const lightStatus = document.getElementById('light-status');
                const darkStatus = document.getElementById('dark-status');

                const updateThemeStatus = () => {
                    const isDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (isDarkMode) {
                        lightStatus.classList.add('hidden');
                        lightStatus.classList.remove('flex');
                        darkStatus.classList.remove('hidden');
                        darkStatus.classList.add('flex');
                    } else {
                        darkStatus.classList.add('hidden');
                        darkStatus.classList.remove('flex');
                        lightStatus.classList.remove('hidden');
                        lightStatus.classList.add('flex');
                    }
                };

                updateThemeStatus();
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', updateThemeStatus);
            });
        </script>
</x-app-layout>
