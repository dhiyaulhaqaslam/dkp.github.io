@extends('layouts.main2')

@section('content')
    <div class="py-12 bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="shadow-lg rounded-lg bg-white dark:bg-gray-800">
                <!-- Informasi Kontak -->
                <div class="flex flex-col lg:flex-row justify-between items-center gap-8 p-8">
                    <!-- Email -->
                    <div class="text-center lg:text-left" data-aos="fade-right">
                        <h3 class="text-lg font-semibold">
                            <i class="fas fa-envelope text-blue-500 mx-auto lg:mx-0 lg:mb-2"></i>
                            Email
                        </h3>
                        <p class="text-sm">dinasketahananpangan.mks@gmail.com</p>
                    </div>
                    <!-- Telepon -->
                    <div class="text-center lg:text-left" data-aos="fade">
                        <h3 class="text-lg font-semibold">
                            <i class="fas fa-phone text-blue-500 mx-auto lg:mx-0 lg:mb-2"></i>
                            Telepon
                        </h3>
                        <p class="text-sm">+62 812 3456 7890</p>
                    </div>
                    <!-- Alamat -->
                    <div class="text-center lg:text-left" data-aos="fade-left">
                        <h3 class="text-lg font-semibold">
                            <i class="fas fa-map-marker-alt text-blue-500 mx-auto lg:mx-0 lg:mb-2"></i>
                            Alamat</h3>
                        <p class="text-sm">Graha Tata Cemerlang Mall, Jalan Metro Tj. Bunga, Tj. Merdeka, Kec. Tamalate,
                            Kota Makassar, 90224</p>
                    </div>
                </div>
            </div>
            <!-- Form Kritik dan Saran -->
            <div class="p-6 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white mt-10 rounded-md" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-center mb-6">Kritik dan Saran</h2>

                @if (session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white"
                    action="{{ route('contact.store') }}" method="POST" class="max-w-3xl mx-auto p-6 rounded-lg shadow-md">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan Email Anda"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium">Pesan</label>
                        <textarea id="message" name="message" rows="4" placeholder="Masukkan Kritik dan Saran Anda"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800"
                            required></textarea>
                    </div>

                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                        Send Feedbacks
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
