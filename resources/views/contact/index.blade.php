@extends('layouts.main2')

@section('content')
    <div class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-white py-16">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <!-- HEADER -->
            <div class="text-center mb-12" data-aos="fade-down">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Kami senang mendengar pendapat Anda. Silakan hubungi kami melalui kontak di bawah atau kirimkan kritik
                    dan saran Anda melalui formulir.
                </p>
            </div>

            <!-- INFORMASI KONTAK -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- Email -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center" data-aos="fade-right">
                    <div class="text-blue-500 text-4xl mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Email</h3>
                    <p class="text-sm">dinasketahananpangan.mks@gmail.com</p>
                </div>

                <!-- Telepon -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center" data-aos="fade-up">
                    <div class="text-blue-500 text-4xl mb-4">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Telepon</h3>
                    <p class="text-sm">+62 812 3456 7890</p>
                </div>

                <!-- Alamat -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center" data-aos="fade-left">
                    <div class="text-blue-500 text-4xl mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Alamat</h3>
                    <p class="text-sm leading-relaxed">
                        Graha Tata Cemerlang Mall, Jalan Metro Tj. Bunga, Tj. Merdeka, Kec. Tamalate,<br>Kota Makassar,
                        90224
                    </p>
                </div>
            </div>

            <!-- FORM KRITIK DAN SARAN -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-center mb-6">Kritik dan Saran</h2>

                @if (session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium mb-1">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-900"
                            required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan Email Anda"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-900"
                            required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium mb-1">Pesan</label>
                        <textarea id="message" name="message" rows="4" placeholder="Masukkan Kritik dan Saran Anda"
                            class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-900"
                            required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-md transition duration-300">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
