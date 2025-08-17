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
            </nav>
        </div>
    </section>
    <!-- Page Header -->
    <section class="h-52 overflow-hidden relative">
        <div class="absolute inset-0 bg-gradient-to-r from-green-800 to-green-900 opacity-85 z-10"></div>
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/images/kerajinan-bambu.jpg') }}" 
                alt="Kerajinan Bambu"
                class="w-full object-cover"
            >
        </div>
        <div class="container mx-auto lg:px-10 px-4 absolute inset-0 flex items-center justify-center z-20">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Koleksi Produk Kami</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-2xl mx-auto">
                    Temukan beragam kerajinan bambu berkualitas tinggi untuk kebutuhan rumah Anda
                </p>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-8 bg-white border-b border-gray-200">
        <div class="container mx-auto lg:px-10 px-4">
            <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                <!-- Search Bar -->
                <div class="w-full lg:w-1/2">
                    <div class="relative">
                        <input 
                            type="text" 
                            wire:model.live.debounce.300ms="search"
                            placeholder="Cari produk kerajinan bambu..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        @if($search)
                            <button 
                                wire:click="$set('search', '')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                    <!-- Category Filter -->
                    <select 
                        wire:model.live="selectedCategory"
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                    >
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <!-- Price Range Filter -->
                    <select 
                        wire:model.live="priceRange"
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                    >
                        <option value="">Semua Harga</option>
                        <option value="0-100000">< Rp 100.000</option>
                        <option value="100000-300000">Rp 100.000 - 300.000</option>
                        <option value="300000-500000">Rp 300.000 - 500.000</option>
                        <option value="500000-999999999">> Rp 500.000</option>
                    </select>

                    <!-- Sort Filter -->
                    <select 
                        wire:model.live="sortBy"
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                    >
                        <option value="newest">Terbaru</option>
                        <option value="discount">Diskon</option>
                        <option value="price_low">Harga Terendah</option>
                        <option value="price_high">Harga Tertinggi</option>
                        <option value="name">Nama A-Z</option>
                        <option value="popular">Terpopuler</option>
                    </select>
                </div>
            </div>

            <!-- Active Filters Display -->
            @if($search || $selectedCategory || $priceRange)
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="text-gray-600 font-medium">Filter aktif:</span>
                    
                    @if($search)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                            Pencarian: "{{ $search }}"
                            <button wire:click="$set('search', '')" class="ml-2 text-green-600 hover:text-green-800">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </span>
                    @endif

                    @if($selectedCategory)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-amber-100 text-amber-800">
                            Kategori: {{ ucfirst($selectedCategory) }}
                            <button wire:click="$set('selectedCategory', '')" class="ml-2 text-amber-600 hover:text-amber-800">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </span>
                    @endif

                    @if($priceRange)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                            @php
                                $ranges = [
                                    '0-100000' => '< Rp 100.000',
                                    '100000-300000' => 'Rp 100.000 - 300.000',
                                    '300000-500000' => 'Rp 300.000 - 500.000',
                                    '500000-999999999' => '> Rp 500.000'
                                ];
                            @endphp
                            Harga: {{ $ranges[$priceRange] ?? $priceRange }}
                            <button wire:click="$set('priceRange', '')" class="ml-2 text-blue-600 hover:text-blue-800">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </span>
                    @endif

                    <button 
                        wire:click="clearAllFilters"
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-gray-100 text-gray-700 hover:bg-gray-200 transition duration-300"
                    >
                        <i class="fas fa-undo mr-1"></i>
                        Reset Semua
                    </button>
                </div>
            @endif
        </div>
    </section>

    <!-- Products Grid Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto lg:px-10 px-4">
            <!-- Results Info -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <div>
                    <p class="text-gray-600">
                        Menampilkan <span class="font-semibold">{{ $products->count() }}</span> 
                        dari <span class="font-semibold">{{ $products->total() }}</span> produk
                    </p>
                    @if($search)
                        <p class="text-sm text-gray-500 mt-1">
                            Hasil pencarian untuk: <span class="font-medium">"{{ $search }}"</span>
                        </p>
                    @endif
                </div>
                
                <!-- View Toggle -->
                <div class="flex items-center space-x-2 mt-4 sm:mt-0">
                    <span class="text-gray-600 text-sm">Tampilan:</span>
                    <button 
                        wire:click="$set('viewType', 'grid')"
                        class="p-2 rounded {{ $viewType === 'grid' ? 'bg-green-800 text-white' : 'bg-white text-gray-600 hover:bg-gray-100' }} transition duration-300"
                    >
                        <i class="fas fa-th"></i>
                    </button>
                    <button 
                        wire:click="$set('viewType', 'list')"
                        class="p-2 rounded {{ $viewType === 'list' ? 'bg-green-800 text-white' : 'bg-white text-gray-600 hover:bg-gray-100' }} transition duration-300"
                    >
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Loading State -->
            <div wire:loading.delay class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-green-800"></div>
                <p class="mt-4 text-gray-600">Memuat produk...</p>
            </div>

            <!-- Products Grid -->
            <div wire:loading.remove class="grid grid-cols-1 {{ $viewType === 'grid' ? 'md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4' : 'md:grid-cols-1' }} gap-8">
                @forelse($products as $product)
                    @if($viewType === 'grid')
                        <!-- Grid View Card -->
                        <livewire:components.product-card 
                            :product="$product" 
                            :buttonLabel="'Lihat'"
                            wire:key="product-card-{{ $product->id }}-{{ $products->currentPage() }}-{{ $sortBy }}-{{ $search }}-{{ $selectedCategory }}-{{ $priceRange }}"
                        />
                    @else
                        <!-- List View Card -->
                        <livewire:components.product-list 
                            :product="$product" 
                            :buttonLabel="'Lihat'"
                            wire:key="product-list-{{ $product->id }}-{{ $products->currentPage() }}-{{ $sortBy }}-{{ $search }}-{{ $selectedCategory }}-{{ $priceRange }}"
                        />
                    @endif
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full text-center py-20">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-search text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Tidak ada produk ditemukan</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">
                            @if($search || $selectedCategory || $priceRange)
                                Coba ubah filter pencarian atau hapus beberapa filter untuk melihat lebih banyak produk.
                            @else
                                Maaf, saat ini belum ada produk yang tersedia.
                            @endif
                        </p>
                        @if($search || $selectedCategory || $priceRange)
                            <button 
                                wire:click="clearAllFilters"
                                class="bg-green-800 text-white px-6 py-3 rounded-lg hover:bg-green-900 transition duration-300"
                            >
                                <i class="fas fa-undo mr-2"></i>
                                Reset Semua Filter
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