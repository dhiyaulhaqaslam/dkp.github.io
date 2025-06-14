<x-app-layout>
    <div class="container mx-auto p-6 text">
        <h1 class="text-3xl font-semibold text-center mb-6">Edit Social Media Preferences</h1>

        @if (session('success'))
            <div class="alert alert-success text-green-600 mb-4 p-4 border border-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('social_media.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="facebook_url" class="block text-lg font-medium text-gray-700">Facebook URL:</label>
                <input type="url" id="facebook_url" name="facebook_url"
                    value="{{ old('facebook_url', $socialMedia->facebook_url ?? '') }}"
                    class="text-gray-800 dark:text-white bg-transparent mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="instagram_url" class="block text-lg font-medium text-gray-700">Instagram URL:</label>
                <input type="url" id="instagram_url" name="instagram_url"
                    value="{{ old('instagram_url', $socialMedia->instagram_url ?? '') }}"
                    class="text-gray-800 dark:text-white bg-transparent mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="twitter_url" class="block text-lg font-medium text-gray-700">Twitter URL:</label>
                <input type="url" id="twitter_url" name="twitter_url"
                    value="{{ old('twitter_url', $socialMedia->twitter_url ?? '') }}"
                    class="text-gray-800 dark:text-white bg-transparent mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="mt-4 px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
