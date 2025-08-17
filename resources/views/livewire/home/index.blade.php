<div>
    <!-- Hero Section -->
    <section id="beranda" class="relative lg:px-10 px-0 lg:h-[90vh]">
        <div class="swiper hero-swiper lg:rounded-3xl">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
                    <img src="{{ asset('assets/images/slide-1.jpg') }}" alt="Kerajinan Bambu" class="w-full lg:h-[90vh] h-[60vh] object-cover">
                    <div class="absolute inset-0 z-20 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                                Keindahan Alam dalam<br>Setiap Anyaman
                            </h2>
                            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                                Rasakan kemewahan produk bambu berkualitas tinggi yang dibuat dengan cinta oleh pengrajin lokal
                            </p>
                            <a href="{{ route('products.index') }}">
                                <button class="bg-amber-600 text-white px-8 py-4 rounded-lg text-lg hover:bg-amber-700 transition duration-300 transform hover:scale-105 cursor-pointer">
                                    Jelajahi Koleksi
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
                    <img src="{{ asset('assets/images/slide-2.jpg') }}" alt="Kerajinan Bambu" class="w-full lg:h-[90vh] h-[60vh] object-cover">
                    <div class="absolute inset-0 z-20 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                                Tradisi Berkualitas<br>Warisan Nusantara
                            </h2>
                            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                                Setiap produk adalah hasil dari teknik tradisional yang diwariskan turun temurun
                            </p>
                            <a href="{{ route('products.index') }}">
                                <button class="bg-amber-600 text-white px-8 py-4 rounded-lg text-lg hover:bg-amber-700 transition duration-300 transform hover:scale-105 cursor-pointer">
                                    Jelajahi Koleksi
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
                    <img src="{{ asset('assets/images/slide-3.jpg') }}" alt="Kerajinan Bambu" class="w-full lg:h-[90vh] h-[60vh] object-cover">
                    <div class="absolute inset-0 z-20 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                                Ramah Lingkungan<br>Masa Depan Berkelanjutan
                            </h2>
                            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                                Pilihan cerdas untuk rumah modern yang peduli lingkungan
                            </p>
                            <a href="{{ route('products.index') }}">
                                <button class="bg-amber-600 text-white px-8 py-4 rounded-lg text-lg hover:bg-amber-700 transition duration-300 transform hover:scale-105 cursor-pointer">
                                    Jelajahi Koleksi
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="koleksi" class="py-20 bg-white">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Koleksi Unggulan Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Produk-produk pilihan yang menggabungkan keindahan, fungsi, dan kualitas terbaik
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <livewire:components.product-card 
                        :product="$product" 
                        :buttonLabel="'Lihat'"
                        wire:key="product-card-{{ $product->id }}"
                    />
                @endforeach
            </div>

            <div class="mt-12 flex items-center justify-center">
                {{-- button Lihat semua produk --}}
                <a href="{{ route('products.index') }}" class="inline-block bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300 hover:scale-105">
                    Lihat Semua Produk
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="tentang" class="py-20 bg-stone-50">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Mengapa Memilih {{ config('app.name') }}?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Komitmen kami terhadap kualitas, keberlanjutan, dan kepuasan pelanggan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="text-center">
                    <div class="bg-green-800 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-leaf text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Bahan Ramah Lingkungan</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Dibuat dari bambu pilihan yang berkelanjutan, mendukung pelestarian lingkungan untuk generasi mendatang
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center">
                    <div class="bg-amber-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-hand-holding-heart text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">100% Buatan Tangan</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Setiap produk adalah karya seni unik dari pengrajin lokal berpengalaman dengan teknik tradisional
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center">
                    <div class="bg-blue-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Kualitas Terjamin</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Melalui proses finishing yang teliti untuk daya tahan maksimal dan kepuasan pelanggan yang terjamin
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- testimonial --}}
    <section class="flex items-center justify-center py-20 bg-white">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="flex flex-col items-start mx-auto lg:items-center">
                <p class="relative flex items-start justify-start w-full text-xl font-bold tracking-wider text-green-800 uppercase lg:justify-center lg:items-center mb-3" data-primary="purple-500">Jangan hanya percaya pada kata-kata kami</p>


                <h2 class="relative flex items-start justify-start w-full max-w-3xl text-4xl font-bold lg:justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="absolute right-0 hidden w-12 h-12 -mt-2 -mr-16 text-gray-200 lg:inline-block"
                        viewBox="0 0 975.036 975.036">
                        <path
                            d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                        </path>
                    </svg>
                    Lihat Yang Mereka Katakan
                </h2>
                <div class="block w-full h-0.5 max-w-lg mt-6 bg-purple-100 rounded-full" data-primary="purple-600"></div>

                <div class="items-center justify-center w-full mt-12 mb-4 lg:flex">
                    <div class="flex flex-col items-start justify-start w-full h-auto mb-12 lg:w-1/3 lg:mb-0">
                        <div class="flex items-center justify-center">
                            <div class="w-16 h-16 mr-4 overflow-hidden bg-gray-200 rounded-full">
                                <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1700&q=80"
                                    class="object-cover w-full h-full">
                            </div>
                            <div class="flex flex-col items-start justify-center">
                                <h4 class="font-bold text-gray-800">Tuminem</h4>
                                <p class="text-gray-600"></p>
                            </div>
                        </div>
                        <blockquote class="mt-8 text-lg text-gray-500">
                            "Saya sangat merekomendasikan produk ini. Kualitasnya luar biasa dan sangat memuaskan."
                        </blockquote>
                    </div>
                    <div
                        class="flex flex-col items-start justify-start w-full h-auto px-0 mx-0 mb-12 border-l border-r border-transparent lg:w-1/3 lg:mb-0 lg:px-8 lg:mx-8 lg:border-gray-200">
                        <div class="flex items-center justify-center">
                            <div class="w-16 h-16 mr-4 overflow-hidden bg-gray-200 rounded-full">
                                <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2547&q=80"
                                    class="object-cover w-full h-full">
                            </div>
                            <div class="flex flex-col items-start justify-center">
                                <h4 class="font-bold text-gray-800">Mad Hasan</h4>
                                <p class="text-gray-600"></p>
                            </div>
                        </div>
                        <blockquote class="mt-8 text-lg text-gray-500">
                            "Saya sangat merekomendasikan produk ini. Kualitasnya luar biasa dan sangat memuaskan."
                        </blockquote>
                    </div>
                    <div class="flex flex-col items-start justify-start w-full h-auto lg:w-1/3">
                        <div class="flex items-center justify-center">
                            <div class="w-16 h-16 mr-4 overflow-hidden bg-gray-200 rounded-full">
                                <img src="https://images.unsplash.com/photo-1545167622-3a6ac756afa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1256&q=80"
                                    class="object-cover w-full h-full">
                            </div>
                            <div class="flex flex-col items-start justify-center">
                                <h4 class="font-bold text-gray-800">Yu Darsih</h4>
                                <p class="text-gray-600"></p>
                            </div>
                        </div>
                        <blockquote class="mt-8 text-lg text-gray-500">
                            "Saya sangat merekomendasikan produk ini. Kualitasnya luar biasa dan sangat memuaskan."
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>