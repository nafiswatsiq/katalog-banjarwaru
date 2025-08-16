<header class="sticky top-0 z-50 bg-white shadow-md">
    <nav class="container mx-auto lg:px-10 px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center">
                <h1 class="text-2xl font-bold text-green-800">{{ config('app.name') }}</h1>
            </a>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#beranda" class="text-gray-700 hover:text-green-800 transition duration-300">Beranda</a>
                <a href="#koleksi" class="text-gray-700 hover:text-green-800 transition duration-300">Koleksi Produk</a>
                <a href="#tentang" class="text-gray-700 hover:text-green-800 transition duration-300">Tentang Kami</a>
                <a href="#kontak" class="text-gray-700 hover:text-green-800 transition duration-300">Kontak</a>
            </div>
            
            <!-- CTA Button -->
            <div class="hidden md:block">
                <a href="{{ route('products.index') }}">
                    <button class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-900 transition duration-300">
                        Lihat Semua Produk
                    </button>
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-green-800">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 py-4 border-t border-gray-200">
            <div class="flex flex-col space-y-3">
                <a href="#beranda" class="text-gray-700 hover:text-green-800 transition duration-300">Beranda</a>
                <a href="#koleksi" class="text-gray-700 hover:text-green-800 transition duration-300">Koleksi Produk</a>
                <a href="#tentang" class="text-gray-700 hover:text-green-800 transition duration-300">Tentang Kami</a>
                <a href="#kontak" class="text-gray-700 hover:text-green-800 transition duration-300">Kontak</a>
                <a href="{{ route('products.index') }}">
                    <button class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-900 transition duration-300 w-full mt-3">
                        Lihat Semua Produk
                    </button>
                </a>
            </div>
        </div>
    </nav>
</header>