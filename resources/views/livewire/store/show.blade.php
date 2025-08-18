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
                <a href="{{ route('store.index') }}" class="hover:text-green-800 transition duration-300">
                    Toko
                </a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <span class="text-gray-800 font-medium">{{ $store->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Store Header Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Store Image -->
                <div class="lg:col-span-1">
                    <div class="rounded-xl overflow-hidden shadow-lg">
                        <img 
                            src="{{ $store->getFirstMediaUrl('store_images') ?: asset('assets/images/store-placeholder.jpg') }}" 
                            alt="{{ $store->name }}" 
                            class="w-full h-64 lg:h-80 object-cover"
                        >
                    </div>
                </div>

                <!-- Store Information -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">{{ $store->name }}</h1>
                        <p class="text-lg text-gray-600 leading-relaxed">{{ $store->description }}</p>
                    </div>

                    <!-- Store Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Contact Info -->
                        <div class="space-y-3">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">
                                <i class="fas fa-info-circle mr-2 text-green-800"></i>
                                Informasi Kontak
                            </h3>
                            
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt text-gray-400 mt-1"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Alamat</p>
                                    <p class="text-gray-700">{{ $store->address }}</p>
                                </div>
                            </div>

                            @if($store->whatsapp)
                                <div class="flex items-center space-x-3">
                                    <i class="fab fa-whatsapp text-green-500"></i>
                                    <div>
                                        <p class="text-sm text-gray-500">WhatsApp</p>
                                        <a href="https://wa.me/62{{ $store->whatsapp }}" 
                                           target="_blank"
                                           class="text-green-800 hover:text-green-900 font-medium">
                                            {{ $store->whatsapp }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($store->email)
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                    <div>
                                        <p class="text-sm text-gray-500">Email</p>
                                        <a href="mailto:{{ $store->email }}" 
                                           class="text-green-800 hover:text-green-900 font-medium">
                                            {{ $store->email }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Store Stats -->
                        <div class="space-y-3">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="grid grid-cols-1 gap-4 text-center">
                                    <div>
                                        <p class="text-2xl font-bold text-green-800">{{ $store->products->count() }}</p>
                                        <p class="text-sm text-gray-600">Produk</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3 mt-6">
                                @if($store->whatsapp)
                                    <a href="https://wa.me/62{{ $store->whatsapp }}" 
                                       target="_blank"
                                       class="flex-1 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 flex items-center justify-center space-x-2">
                                        <i class="fab fa-whatsapp"></i>
                                        <span>Hubungi via WhatsApp</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto lg:px-10 px-4">
            <!-- Section Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Produk {{ $store->name }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Jelajahi koleksi produk kerajinan bambu berkualitas dari {{ $store->name }}
                </p>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                    <!-- Search Bar -->
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <input 
                                type="text" 
                                wire:model.live.debounce.300ms="search"
                                placeholder="Cari produk..."
                                class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                            >
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="flex gap-4 w-full lg:w-auto">
                        <!-- Category Filter -->
                        <select 
                            wire:model.live="selectedCategory"
                            class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                        >
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <!-- Sort Filter -->
                        <select 
                            wire:model.live="sortBy"
                            class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                        >
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="name">Nama A-Z</option>
                            <option value="price_low">Harga Terendah</option>
                            <option value="price_high">Harga Tertinggi</option>
                        </select>
                    </div>
                </div>

                <!-- Active Filters -->
                @if($search || $selectedCategory)
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="text-gray-600 font-medium">Filter aktif:</span>
                        @if($search)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                                "{{ $search }}"
                                <button wire:click="$set('search', '')" class="ml-2 text-green-600 hover:text-green-800">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                            </span>
                        @endif
                        @if($selectedCategory)
                            @php
                                $categoryName = $categories->where('slug', $selectedCategory)->first()->name ?? $selectedCategory;
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                                {{ $categoryName }}
                                <button wire:click="$set('selectedCategory', '')" class="ml-2 text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                            </span>
                        @endif
                        <button 
                            wire:click="clearFilters"
                            class="text-sm text-gray-500 hover:text-gray-700 underline"
                        >
                            Hapus semua filter
                        </button>
                    </div>
                @endif
            </div>

            <!-- Results Info -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <p class="text-gray-600">
                        Menampilkan <span class="font-semibold">{{ $products->count() }}</span> 
                        dari <span class="font-semibold">{{ $products->total() }}</span> produk
                    </p>
                </div>
            </div>

            <!-- Loading State -->
            <div wire:loading.delay class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-green-800"></div>
                <p class="mt-4 text-gray-600">Memuat produk...</p>
            </div>

            <!-- Products Grid -->
            <div wire:loading.remove class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($products as $product)
                    <livewire:components.product-card 
                        :product="$product"
                        buttonLabel="Lihat Detail"
                        wire:key="store-product-{{ $product->id }}-{{ $products->currentPage() }}-{{ $sortBy }}-{{ $search }}-{{ $selectedCategory }}"
                    />
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full text-center py-20">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-box-open text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Tidak ada produk ditemukan</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">
                            @if($search || $selectedCategory)
                                Coba ubah filter untuk melihat lebih banyak produk.
                            @else
                                Toko ini belum memiliki produk yang tersedia.
                            @endif
                        </p>
                        @if($search || $selectedCategory)
                            <button 
                                wire:click="clearFilters"
                                class="bg-green-800 text-white px-6 py-3 rounded-lg hover:bg-green-900 transition duration-300"
                            >
                                <i class="fas fa-undo mr-2"></i>
                                Hapus Filter
                            </button>
                        @endif
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>
</div>