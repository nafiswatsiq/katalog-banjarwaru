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
            </nav>
        </div>
    </section>

    <!-- Page Header -->
    <section class="h-52 overflow-hidden relative">
        <div class="absolute inset-0 bg-gradient-to-r from-green-800 to-green-900 opacity-85 z-10"></div>
        <div class="flex justify-center items-center h-full">
            <img src="{{ asset('assets/images/kerajinan-bambu.jpg') }}" 
                alt="Toko Kerajinan Bambu"
                class="w-full object-cover"
            >
        </div>
        <div class="container mx-auto lg:px-10 px-4 absolute inset-0 flex items-center justify-center z-20">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Toko Partner Kami</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-2xl mx-auto">
                    Temukan berbagai toko kerajinan bambu terpercaya di wilayah Banjarwaru
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
                            placeholder="Cari toko berdasarkan nama, deskripsi, atau alamat..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        @if($search)
                            <button 
                                wire:click="clearSearch"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Sort Filter -->
                <div class="flex gap-4 w-full lg:w-auto">
                    <select 
                        wire:model.live="sortBy"
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-800 focus:border-transparent transition duration-300"
                    >
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="name">Nama A-Z</option>
                    </select>
                </div>
            </div>

            <!-- Active Search Display -->
            @if($search)
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="text-gray-600 font-medium">Pencarian aktif:</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                        "{{ $search }}"
                        <button wire:click="clearSearch" class="ml-2 text-green-600 hover:text-green-800">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </span>
                </div>
            @endif
        </div>
    </section>

    <!-- Stores Grid Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto lg:px-10 px-4">
            <!-- Results Info -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <p class="text-gray-600">
                        Menampilkan <span class="font-semibold">{{ $stores->count() }}</span> 
                        dari <span class="font-semibold">{{ $stores->total() }}</span> toko
                    </p>
                    @if($search)
                        <p class="text-sm text-gray-500 mt-1">
                            Hasil pencarian untuk: <span class="font-medium">"{{ $search }}"</span>
                        </p>
                    @endif
                </div>
            </div>

            <!-- Loading State -->
            <div wire:loading.delay class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-green-800"></div>
                <p class="mt-4 text-gray-600">Memuat toko...</p>
            </div>

            <!-- Stores Grid -->
            <div wire:loading.remove class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($stores as $store)
                    <livewire:components.store-card 
                        :store="$store"
                        wire:key="store-card-{{ $store->id }}-{{ $stores->currentPage() }}-{{ $sortBy }}-{{ $search }}"
                    />
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full text-center py-20">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-store text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Tidak ada toko ditemukan</h3>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">
                            @if($search)
                                Coba ubah kata kunci pencarian untuk melihat lebih banyak toko.
                            @else
                                Maaf, saat ini belum ada toko yang terdaftar.
                            @endif
                        </p>
                        @if($search)
                            <button 
                                wire:click="clearSearch"
                                class="bg-green-800 text-white px-6 py-3 rounded-lg hover:bg-green-900 transition duration-300"
                            >
                                <i class="fas fa-undo mr-2"></i>
                                Hapus Pencarian
                            </button>
                        @endif
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($stores->hasPages())
                <div class="mt-12">
                    {{ $stores->links() }}
                </div>
            @endif
        </div>
    </section>
</div>