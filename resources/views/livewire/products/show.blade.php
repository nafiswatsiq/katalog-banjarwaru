<div>
    <!-- Breadcrumb Navigation -->
    <section class="bg-gray-50 py-4">
        <div class="container mx-auto lg:px-10 px-4">
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-green-800 transition duration-300">
                    <i class="fas fa-home"></i>
                    Beranda
                </a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <a href="{{ route('products.index') }}" class="hover:text-green-800 transition duration-300">
                    Produk
                </a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <span class="text-green-800 font-medium">{{ $product['category'] ?? 'Kategori' }}</span>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <span class="text-gray-800 font-medium">{{ $product['name'] ?? 'Produk' }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Product Images Gallery -->
                <div class="space-y-4">
                    <!-- Main Image Swiper -->
                    <div class="relative">
                        <div class="swiper product-gallery-main rounded-xl overflow-hidden shadow-lg">
                            <div class="swiper-wrapper">
                                @foreach($product['images'] ?? [] as $index => $image)
                                    <div class="swiper-slide">
                                        <img 
                                            src="{{ $image }}" 
                                            alt="{{ $product['name'] }} - Gambar {{ $index + 1 }}" 
                                            class="w-full h-96 lg:h-[500px] object-cover"
                                        >
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Navigation buttons -->
                            <div class="swiper-button-next text-white bg-black bg-opacity-50 rounded-full w-10 h-10 after:text-sm"></div>
                            <div class="swiper-button-prev text-white bg-black bg-opacity-50 rounded-full w-10 h-10 after:text-sm"></div>
                            
                            <!-- Zoom icon -->
                            <button class="absolute top-4 right-4 bg-white bg-opacity-80 text-gray-700 p-2 rounded-full hover:bg-opacity-100 transition duration-300 z-10">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Thumbnail Swiper -->
                    <div class="swiper product-gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($product['images'] ?? [] as $index => $image)
                                <div class="swiper-slide">
                                    <img 
                                        src="{{ $image }}" 
                                        alt="{{ $product['name'] }} - Thumbnail {{ $index + 1 }}" 
                                        class="w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-green-800 transition duration-300"
                                    >
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="space-y-6">
                    <!-- Product Title & Category -->
                    <div>
                        <div class="flex items-center space-x-2 text-green-800 mb-2">
                            <i class="fas fa-tag"></i>
                            <span class="text-sm font-medium uppercase tracking-wide">{{ ucfirst($product['category'] ?? 'Kategori') }}</span>
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">{{ $product['name'] ?? 'Nama Produk' }}</h1>
                        
                        <!-- Rating & Reviews -->
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="flex items-center space-x-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= ($product['rating'] ?? 4.5) ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                                <span class="text-gray-600 ml-2">({{ $product['rating'] ?? 4.5 }})</span>
                            </div>
                            <span class="text-gray-400">|</span>
                            <span class="text-gray-600">{{ $product['reviews_count'] ?? 23 }} ulasan</span>
                            <span class="text-gray-400">|</span>
                            <span class="text-green-600 font-medium">{{ $product['stock'] ?? 15 }} tersedia</span>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="border-t border-b border-gray-200 py-6">
                        <div class="flex items-center space-x-4">
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                <span class="text-3xl lg:text-4xl font-bold text-red-600">
                                    Rp {{ number_format($product['price'] ?? 250000, 0, ',', '.') }}
                                </span>
                                <span class="text-xl text-gray-500 line-through">
                                    Rp {{ number_format($product['original_price'], 0, ',', '.') }}
                                </span>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">
                                    Hemat {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}%
                                </span>
                            @else
                                <span class="text-3xl lg:text-4xl font-bold text-green-800">
                                    Rp {{ number_format($product['price'] ?? 250000, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>
                        <p class="text-gray-600 mt-2">*Harga sudah termasuk PPN</p>
                    </div>

                    <!-- Product Description -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Deskripsi Produk</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            {{ $product['description'] ?? 'Deskripsi produk akan ditampilkan di sini. Produk kerajinan bambu berkualitas tinggi dengan finishing premium.' }}
                        </p>
                        
                        <!-- Product Features -->
                        @if(isset($product['features']))
                            <div class="space-y-2">
                                <h4 class="font-medium text-gray-800">Keunggulan:</h4>
                                <ul class="space-y-1">
                                    @foreach($product['features'] as $feature)
                                        <li class="flex items-center text-gray-600">
                                            <i class="fas fa-check text-green-600 mr-2"></i>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- Quantity Selector -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Jumlah</h3>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button 
                                    wire:click="decreaseQuantity"
                                    class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition duration-300"
                                    {{ $quantity <= 1 ? 'disabled' : '' }}
                                >
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="px-4 py-2 font-medium">{{ $quantity }}</span>
                                <button 
                                    wire:click="increaseQuantity"
                                    class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition duration-300"
                                    {{ $quantity >= ($product['stock'] ?? 15) ? 'disabled' : '' }}
                                >
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <span class="text-gray-600">Stok: {{ $product['stock'] ?? 15 }} tersedia</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        <button 
                            wire:click="addToCart"
                            class="w-full bg-green-800 text-white py-4 rounded-lg text-lg font-semibold hover:bg-green-900 transition duration-300 flex items-center justify-center space-x-2"
                            wire:loading.attr="disabled"
                            wire:target="addToCart"
                        >
                            <div wire:loading.remove wire:target="addToCart">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Tambah ke Keranjang</span>
                            </div>
                            <div wire:loading wire:target="addToCart">
                                <i class="fas fa-spinner fa-spin"></i>
                                <span>Menambahkan...</span>
                            </div>
                        </button>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <button 
                                wire:click="buyNow"
                                class="bg-amber-600 text-white py-3 rounded-lg font-semibold hover:bg-amber-700 transition duration-300 flex items-center justify-center space-x-2"
                                wire:loading.attr="disabled"
                                wire:target="buyNow"
                            >
                                <i class="fas fa-bolt"></i>
                                <span>Beli Sekarang</span>
                            </button>
                            
                            <button 
                                wire:click="toggleWishlist"
                                class="border-2 {{ $isInWishlist ? 'border-red-500 text-red-500 bg-red-50' : 'border-gray-300 text-gray-600' }} py-3 rounded-lg font-semibold hover:border-red-500 hover:text-red-500 transition duration-300 flex items-center justify-center space-x-2"
                            >
                                <i class="fas fa-heart {{ $isInWishlist ? 'fas' : 'far' }}"></i>
                                <span>{{ $isInWishlist ? 'Hapus dari Wishlist' : 'Tambah ke Wishlist' }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Product Specifications -->
                    @if(isset($product['specifications']))
                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Spesifikasi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($product['specifications'] as $key => $value)
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-600">{{ $key }}</span>
                                        <span class="font-medium text-gray-800">{{ $value }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Share Product -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Bagikan Produk</h3>
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </button>
                            <button class="flex items-center space-x-2 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </button>
                            <button class="flex items-center space-x-2 bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                                <i class="fas fa-link"></i>
                                <span>Salin Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Tabs Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto lg:px-10 px-4">
            <!-- Tab Navigation -->
            <div class="border-b border-gray-200 mb-8">
                <nav class="-mb-px flex space-x-8">
                    <button 
                        wire:click="$set('activeTab', 'description')"
                        class="py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'description' ? 'border-green-800 text-green-800' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} transition duration-300"
                    >
                        Deskripsi Detail
                    </button>
                    <button 
                        wire:click="$set('activeTab', 'specifications')"
                        class="py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'specifications' ? 'border-green-800 text-green-800' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} transition duration-300"
                    >
                        Spesifikasi
                    </button>
                    <button 
                        wire:click="$set('activeTab', 'reviews')"
                        class="py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'reviews' ? 'border-green-800 text-green-800' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} transition duration-300"
                    >
                        Ulasan ({{ $product['reviews_count'] ?? 23 }})
                    </button>
                    <button 
                        wire:click="$set('activeTab', 'shipping')"
                        class="py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'shipping' ? 'border-green-800 text-green-800' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} transition duration-300"
                    >
                        Pengiriman
                    </button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="bg-white rounded-lg p-8 shadow-sm">
                @if($activeTab === 'description')
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed mb-6">
                            {{ $product['detailed_description'] ?? 'Produk kerajinan bambu premium ini dibuat dengan keahlian tinggi oleh pengrajin lokal yang berpengalaman. Setiap detail dikerjakan dengan teliti untuk menghasilkan produk berkualitas tinggi yang tahan lama dan indah dipandang.' }}
                        </p>
                        
                        @if(isset($product['care_instructions']))
                            <h4 class="text-lg font-semibold text-gray-800 mb-3">Cara Perawatan:</h4>
                            <ul class="space-y-2 text-gray-700">
                                @foreach($product['care_instructions'] as $instruction)
                                    <li class="flex items-start">
                                        <i class="fas fa-circle text-green-600 text-xs mt-2 mr-3"></i>
                                        {{ $instruction }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @elseif($activeTab === 'specifications')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($product['detailed_specifications'] ?? [] as $category => $specs)
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-3">{{ $category }}</h4>
                                <div class="space-y-2">
                                    @foreach($specs as $key => $value)
                                        <div class="flex justify-between py-2 border-b border-gray-100">
                                            <span class="text-gray-600">{{ $key }}</span>
                                            <span class="font-medium text-gray-800">{{ $value }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif($activeTab === 'reviews')
                    <div class="space-y-6">
                        <!-- Review Summary -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="text-3xl font-bold text-gray-800">{{ $product['rating'] ?? 4.5 }}</span>
                                        <div class="flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= ($product['rating'] ?? 4.5) ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-gray-600">Berdasarkan {{ $product['reviews_count'] ?? 23 }} ulasan</p>
                                </div>
                                <button class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-900 transition duration-300">
                                    Tulis Ulasan
                                </button>
                            </div>
                        </div>

                        <!-- Individual Reviews -->
                        @foreach($product['reviews'] ?? [] as $review)
                            <div class="border-b border-gray-200 pb-6">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-green-800 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ substr($review['name'], 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <h5 class="font-semibold text-gray-800">{{ $review['name'] }}</h5>
                                            <span class="text-gray-500 text-sm">{{ $review['date'] }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1 mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review['rating'] ? 'text-yellow-400' : 'text-gray-300' }} text-sm"></i>
                                            @endfor
                                        </div>
                                        <p class="text-gray-700">{{ $review['comment'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif($activeTab === 'shipping')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pengiriman</h4>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-truck text-green-600 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Pengiriman Standar</h5>
                                        <p class="text-gray-600 text-sm">3-7 hari kerja</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-shipping-fast text-green-600 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Pengiriman Express</h5>
                                        <p class="text-gray-600 text-sm">1-3 hari kerja</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-store text-green-600 mt-1"></i>
                                    <div>
                                        <h5 class="font-medium text-gray-800">Pickup di Toko</h5>
                                        <p class="text-gray-600 text-sm">Tersedia setiap hari</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Kebijakan Pengembalian</h4>
                            <div class="space-y-3 text-gray-700">
                                <p>• Pengembalian gratis dalam 7 hari</p>
                                <p>• Produk harus dalam kondisi asli</p>
                                <p>• Sertakan nota pembelian</p>
                                <p>• Pengembalian uang dalam 3-5 hari kerja</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="py-12 bg-white">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Produk Terkait</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Produk lain yang mungkin Anda sukai
                </p>
            </div>

            <div class="swiper related-products-swiper">
                <div class="swiper-wrapper">
                    @foreach($relatedProducts ?? [] as $relatedProduct)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                                <div class="relative overflow-hidden">
                                    <img 
                                        src="{{ $relatedProduct['image'] }}" 
                                        alt="{{ $relatedProduct['name'] }}" 
                                        class="w-full h-64 object-cover hover:scale-110 transition duration-300"
                                    >
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $relatedProduct['name'] }}</h3>
                                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $relatedProduct['description'] }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xl font-bold text-green-800">Rp {{ number_format($relatedProduct['price'], 0, ',', '.') }}</span>
                                        <a href="{{ route('products.show', $relatedProduct['id']) }}" class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300">
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-8"></div>
            </div>
        </div>
    </section>

    <!-- Toast Notifications -->
    @if (session()->has('message'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition
            x-init="setTimeout(() => show = false, 3000)"
            class="fixed bottom-4 right-4 bg-green-800 text-white px-6 py-4 rounded-lg shadow-lg z-50"
        >
            <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('message') }}</span>
            </div>
        </div>
    @endif
</div>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Product Gallery Thumbnails
            const galleryThumbs = new Swiper('.product-gallery-thumbs', {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
                breakpoints: {
                    640: {
                        slidesPerView: 5,
                    },
                    768: {
                        slidesPerView: 6,
                    },
                },
            });

            // Product Gallery Main
            const galleryMain = new Swiper('.product-gallery-main', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: galleryThumbs,
                },
                keyboard: {
                    enabled: true,
                },
                zoom: {
                    maxRatio: 3,
                },
            });

            // Related Products Slider
            const relatedProducts = new Swiper('.related-products-swiper', {
                spaceBetween: 30,
                slidesPerView: 1,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });
        });
    </script>
@endpush